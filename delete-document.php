<?php

require './classes/PDFDocumentGenerator.php';
use PDFGenerator\Entity\PDFDocument;

$pdfDocument = new PDFDocumentGenerator();

if(isset($_POST['documentId']))
{
	$document = $pdfDocument->showDocument($_POST['documentId'])[0];

	if(file_exists($document->getPath()))
	{
		unlink($document->getPath());
	}

  	$message = $pdfDocument->deleteDocument($_POST['documentId']);
  	$data = json_encode(array('message'=>$message));
  	echo $data;
}

