<?php
    include ('fpdf181/fpdf.php');
    include ('xml2pdf/Xml2Pdf.php');

    require("config.php");
    $id = $_GET['id'];
    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Arial','B',15);
            $this->Cell(50);
            $this->Cell(90,10,'Facturacion de Venta',1,0,'C');
            $this->Ln(20);
        }
        function Footer(){

        }
        
    }
    

    $pdf = new PDF();
    $pdf->AddPage('Portrait','A4');
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,"$id");

    
    
    $obj = new Xml2Pdf('XMLFactura1.xml');
    $pdf = $obj->render();

    //$pdf->AddPage(10,10);

    $pdf->Output();
?>