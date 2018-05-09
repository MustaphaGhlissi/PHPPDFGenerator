<?php 

require_once 'Database.php';
require_once 'PDFDocument.php';
use PDFGenerator\Config\Database;
use PDFGenerator\Entity\PDFDocument;

class PDFDocumentGenerator{

    private static $pdo;
    public function __construct()
    {
        self::$pdo = Database::getConnection();
    }


    public function getDocuments(): ?array
    {
        //Get all documents
        $query = "SELECT id,name,pageFormat,pageOrientation,pageMargin FROM document";    
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() === 0)
        {
            return null;
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveDocument(PDFDocument $document): ?string
    {
        //Save the document
        $query = "INSERT INTO document (customer, name, pageFormat, pageOrientation, pageMargin, header, body, footer)
        VALUES (:customer, :name, :pageFormat, :pageOrientation, :pageMargin, :header, :body, :footer)";

        $stmt = self::$pdo->prepare($query);
        
        $customer = $document->getCustomer();
        $name = $document->getName();
        $pageFormat = $document->getPageFormat();
        $pageOrientation = $document->getPageOrientation();
        $pageMargin = $document->getPageMargin();
        $header = $document->getHeader();
        $body = $document->getBody();
        $footer = $document->getFooter();
        $stmt->bindParam(':customer', $customer);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':pageFormat', $pageFormat);
        $stmt->bindParam(':pageOrientation', $pageOrientation);
        $stmt->bindParam(':pageMargin', $pageMargin);
        $stmt->bindParam(':header', $header);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':footer', $footer);
        $stmt->execute();

        if($stmt->rowCount() === 0 )
        {
            return "Echec de génération du document";
        }
        
        return "Document généré avec succès";
    }

    public function editDocument(PDFDocument $document, int $id): ?string
    {
        //Edit the document
        $query = "UPDATE document SET name = :name, pageFormat = :pageFormat, pageOrientation = :pageOrientation, pageMargin = :pageMargin, header = :header, body = :body, footer = :footer
            WHERE id = :id";

        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $name = $document->getName();
        $pageFormat = $document->getPageFormat();
        $pageOrientation = $document->getPageOrientation();
        $pageMargin = $document->getPageMargin();
        $header = $document->getHeader();
        $body = $document->getBody();
        $footer = $document->getFooter();
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':pageFormat', $pageFormat);
        $stmt->bindParam(':pageOrientation', $pageOrientation);
        $stmt->bindParam(':pageMargin', $pageMargin);
        $stmt->bindParam(':header', $header);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':footer', $footer);
        $stmt->execute();
        if( $stmt->rowCount() === 0 )
        {
            return "Document introuvable";
        }
        return "Document Mis à jour avec succès";
    }

    public function showDocument(int $id): ?array
    {
        //Show the document
        $query = "SELECT * FROM document WHERE id=:id LIMIT 1";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() === 0)
        {
            return null;
        }
        return $stmt->fetchAll(PDO::FETCH_CLASS, "PDFGenerator\Entity\PDFDocument");
    }

    public function deleteDocument($id): ?string
    {
        //Delete the document
        $query = "DELETE FROM document WHERE id=:id";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if( $stmt->rowCount() === 0 )
        {
            return "Document introuvable";
        }
        return "Document supprimé avec succès";
    }
}






