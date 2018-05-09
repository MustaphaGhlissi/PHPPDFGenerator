<?php
namespace PDF\Generator;
use Spipu\Html2Pdf\Html2Pdf;
class PDFGenerator
{
	public static function generatePDF($fileName, $template, $orientation, $format)
	{
		$html2pdf = new Html2Pdf($orientation, $format, 'fr');
		$html2pdf->writeHTML($template);
		$html2pdf->output($fileName);
	}
}
