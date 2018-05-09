<?php

require './vendor/autoload.php';

require './classes/PDFDocumentGenerator.php';
use PDFGenerator\Entity\PDFDocument;


$pdfDocument = new PDFDocumentGenerator();
$documents = $pdfDocument->getDocuments();

$documents = json_encode($documents);
$documents = strip_tags($documents);

echo $documents;



