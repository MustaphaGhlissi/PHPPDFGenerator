<?php 
require './vendor/autoload.php';
require './classes/PDFDocumentGenerator.php';
require './classes/PDFGenerator.php';
use PDFGenerator\Entity\PDFDocument;
use PDF\Generator\PDFGenerator;


if(isset($_GET['id']))
{
	$pdfDocument = new PDFDocumentGenerator();

  	$document = $pdfDocument->showDocument($_GET['id'])[0];

  	if($document instanceof PDFDocument)
  	{
	 	$orient = $document->getPageOrientation()===1?'P':'L';
		$margins = explode(',',$document->getPageMargin());
  		ob_start();	  
?>
<page backtop="<?php echo $margins[0]; ?>mm" backleft="<?php echo $margins[2]; ?>mm" backright="<?php echo $margins[3]; ?>mm" backbottom="<?php echo $margins[1]; ?>mm" footer="page;">
  <page_header>
    
    <?php echo($document->getHeader()); ?>

    <hr />
  </page_header>
  <page_footer>
    <hr />
    <?php echo($document->getFooter()); ?>
  </page_footer>
  <table style="vertical-align: top;">
    <tr>
      <td style="width: 100%">
          <?php echo($document->getBody()); ?>
      </td>
    </tr>
  </table>
</page> 

<?php 
  $template = ob_get_clean(); 
  $fileName = uniqid().'.pdf';
  PDFGenerator::generatePDF($fileName, $template, $orient, 'A'.$document->getPageFormat());
	}
}

?>