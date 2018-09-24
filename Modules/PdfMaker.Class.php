<?php
require('fpdf/fpdf.php');

class PdfMaker extends FPDF
{
    function __construct($orient,$unit,$size)
    {
        parent::__construct($orient,$unit,$size);
    }
// set Title of the page
    function set_title($title)
    {
        $this->title=$title;
    }
    function logo($logo,$x,$y,$w,$h)
    {
        $this->logo=$logo;
        $this->x=$x;
        $this->y=$y;
        $this->w=$w;
        $this->h=$h;
    }
    function set_subtitle($sub)
    {
        $this->sub=$sub;
    }
// Page header
/*function Header() // automatically get called
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15

    $this->SetFont('Arial','B',10);
    // Move to the right
    // get current page width
    $width=$this->GetPageWidth();
    //get current page height 
    $height=$this->GetPageHeight();
    if(isset($this->logo))
    {
        $this->Image($this->logo,$this->x,$this->y,$this->w,$this->h);
    }
    // Title
    $this->Cell(0,10,$this->title,0,1,'C');
    // Sub title
    if(isset($this->sub)){
    $this->SetFont('Arial','B',4);
    $this->Cell(0,5,$this->sub,0,1,'C');
    }
    // Line Break
    
}*/

// Page footer
/*function Footer() // automatically get called
{
    // Position at 1.5 cm from bottom
    $this->SetY(-2);
    // Arial italic 8
    $this->SetFont('Arial','I',2);
    // Page number
    $this->Cell(0,2,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}*/
}

?>