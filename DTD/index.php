<?php
    include ('xml2pdf/fpdf181/fpdf.php');
    require("config.php");
    class PDF extends FPDF{
        
        function Header(){
            
        }
        function Footer(){

        }
        
    }
    header("Content-type: text / xml");
    $enlace = new mysqli($host,$user,$pass) or die ("Error MySQL");
    mysqli_select_db($enlace,$database) or die ("Error en la Base de Datos");
    $query = "SELECT * FROM productos ORDER BY ID ASC";
    $resultado = $enlace->query($query);
    $salida_xml = "<?xml version=\"1.0\"?>";
    $salida_xml.= "<almacen>\n";
    //mysqli retornara el numero de filas correcto hasta que todas las filas del resultado hayan sido recuperadas.
    for($x=0;$x<mysqli_num_rows($resultado);$x++){
        $fila = $resultado->fetch_assoc();
    $salida_xml.= "\t<Producto>\n";
    $salida_xml.= "\t<Nombre>".$fila['Nombre']."</Nombre>\n";
    $salida_xml.= "\t<Precio>".$fila['Precio']."</Precio>\n";
    $salida_xml.= "\t<Categoria>".$fila['Categoria']."</Categoria>\n";
    $salida_xml.= "\t<Marca>".$fila['Marca']."</Marca>\n";
    $salida_xml.= "\t</Producto>\n";
    }
    $salida_xml.="</almacen>";

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,"$salida_xml");

    /*
    $obj = new Xml2Pdf($salida_xml);
    $pdf = $obj->render();
    $pdf->AddPage(10,10);
*/
    $pdf->Output();
?>
