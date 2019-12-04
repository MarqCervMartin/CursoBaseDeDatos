<?php
    include ('fpdf181/fpdf.php');
    require("config.php");
    $id = $_GET['id'];

    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Arial','B',15);
            $this->Cell(50);
            $this->Cell(90,10,'Facturacion de Venta',1,1,'C');
            $this->Cell(90,10,'',0,1,'C');
            $this->Cell(90,10,'PAPELERIA UAEM SA DE CV',0,0,'C');

            $this->Ln(20);
        }
        function Footer(){

        }
        
    }
    header("Content-type: text / xml");
    $enlace = new mysqli($host,$user,$pass) or die ("Error MySQL");
    mysqli_select_db($enlace,$database) or die ("Error en la Base de Datos");
    $query = "SELECT * FROM factura WHERE idFactura = '$id'";
    $resultado = $enlace->query($query);
    

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    //$pdf->Cell(40,10,"$id");

    /*
    $obj = new Xml2Pdf($salida_xml);
    $pdf = $obj->render();
    $pdf->AddPage(10,10);
*/
    while($row = $resultado->fetch_assoc()){
        $pdf->Cell(60,10,'Id Factura :'.$row['idFactura'],1 ,0,'C',0);
        $pdf->Cell(60,10,'Id Venta :'.$row['idVenta'],1 ,0,'C',0);
        $pdf->Cell(60,10,'Id Cliente :'.$row['idCliente'],1 ,1,'C',0);
        $auxVenta = $row['idVenta'];
    }
    
    $queryVentas= "SELECT * FROM ventas WHERE idVenta = '$auxVenta'";
    $resultadoVentas = $enlace->query($queryVentas);
    //$pdf->Cell(10,10,'Id Venta :'.$row['idVenta'],1 ,0,'L',0);
    while($row = $resultadoVentas->fetch_assoc()){
        $pdf->Cell(80,10,'',0 ,1,'L',0);

        $pdf->Cell(80,10,'Fecha : '.$row['fecha'],1 ,1,'L',0);
        $pdf->Cell(80,10,'Total : '.$row['total'].' MXN',1 ,1,'L',0);
        $auxEmpleado = $row['idEmpleado'];
        $auxCliente = $row['idCliente'];

    }
    //empleado
    $queryEmpleado = "SELECT * FROM empleados WHERE idEmpleado = '$auxEmpleado'";
    $resultadoEmpleado = $enlace->query($queryEmpleado);

    //Cliente
    $queryCliente = "SELECT * FROM clientes WHERE idCliente = '$auxCliente'";
    $resultadoCliente = $enlace->query($queryCliente);
    
    while($row = $resultadoEmpleado->fetch_assoc() AND $rowDos = $resultadoCliente->fetch_assoc() ){
        $pdf->Cell(80,10,'',0 ,1,'L',0);

        $pdf->Cell(80,10,'Id Empleado : '.$row['idEmpleado'],1 ,1,'L',0);
        $pdf->Cell(80,10,'Nombre : '.$row['nombreEmpleado'],1 ,1,'L',0);
        $pdf->Cell(80,10,'Apellido Paterno : '.$row['apellidoPaternoEmpleado'],1 ,1,'L',0);
        $pdf->Cell(80,10,'Apellido Materno : '.$row['apellidoMaternoEmpleado'],1 ,1,'L',0);
        
        $pdf->Cell(80,10,'',0 ,1,'L',0);
        $pdf->Cell(180,10,'Cliente:',1 ,1,'C',0);
        $pdf->Cell(180,10,'Nombre : '.$rowDos['nombreCliente'],1 ,1,'L',0);
        $pdf->Cell(180,10,'Apellido Paterno : '.$rowDos['apellidoPaternoCliente'],1 ,1,'L',0);
        $pdf->Cell(180,10,'Apellido Materno : '.$rowDos['apellidoMaternoCliente'],1 ,1,'L',0);
        $pdf->Cell(180,10,'Direccion : '.$rowDos['direccionCliente'],1 ,1,'L',0);
        $pdf->Cell(180,10,'Telefono : '.$rowDos['telefonoCliente'],1 ,1,'L',0);
        $pdf->Cell(180,10,'Correo : '.$rowDos['correoCliente'],1 ,1,'L',0);
        $pdf->Cell(180,10,'NIF : '.$rowDos['nifCliente'],1 ,1,'L',0);


    
    }
    

    $pdf->Output();
?>