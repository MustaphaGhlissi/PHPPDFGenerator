<?php 
namespace PDFGenerator\Entity;

class PDFDocument
{
	private $path;
	private $customer = 1;
	private $name;
	private $pageFormat;
	private $pageOrientation;
	private $pageMargin;
	private $header;
	private $body;
	private $footer;


	public function getPath(): ?string
	{
		return $this->path;
	}
	public function setPath(string $path): void
	{
		$this->path = $path;
	}

	public function getCustomer(): ?int
	{
		return $this->customer;
	}
	public function setCustomer(int $customer): void
	{
		$this->customer = $customer;
	}

	public function getName(): ?string
	{
		return $this->name;
	}
	public function setName(string $name): void
	{
		$this->name = $name;
	}


	public function getPageFormat(): ?string
	{
		return $this->pageFormat;
	}
	public function setPageFormat(string $pageFormat): void
	{
		$this->pageFormat = $pageFormat;
	}


	public function getPageOrientation(): ?string
	{
		return $this->pageOrientation;
	}
	public function setPageOrientation(string $pageOrientation): void
	{
		$this->pageOrientation = $pageOrientation;
	}


	public function getPageMargin(): ?string
	{
		return $this->pageMargin;
	}
	public function setPageMargin(string $pageMargin): void
	{
		$this->pageMargin = $pageMargin;
	}

	public function getHeader(): ?string
	{
		return $this->header;
	}
	public function setHeader(string $header): void
	{
		$this->header = $header;
	}

	public function getBody(): ?string
	{
		return $this->body;
	}
	public function setBody(string $body): void
	{
		$this->body = $body;
	}

	public function getFooter(): ?string
	{
		return $this->footer;
	}
	public function setFooter(string $footer): void
	{
		$this->footer = $footer;
	}
}






