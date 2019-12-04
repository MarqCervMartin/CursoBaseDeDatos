<?php
    $id = $_GET['id'];
    require("config.php");
    /*
    include ('xml2pdf/Xml2Pdf.php');

    class PDF extends FPDF{
        
        function Header(){
            $this->SetFont('Arial','B',15);
            $this->Cell(50);
            $this->Cell(90,10,'Facturacion de Venta',1,0,'C');
            $this->Ln(20);
        }
        function Footer(){

        }
        
    }*/
    header("Content-type: text / xml");
    $enlace = new mysqli($host,$user,$pass) or die ("Error MySQL");
    mysqli_select_db($enlace,$database) or die ("Error en la Base de Datos");
    $query = "SELECT * FROM factura WHERE idFactura = '$id'";
    $resultado = $enlace->query($query);
    for($x=0;$x<mysqli_num_rows($resultado);$x++){
        $fila = $resultado->fetch_assoc();
        $auxVenta = $fila['idVenta'];
    }
    $queryVentas= "SELECT * FROM ventas WHERE idVenta = '$auxVenta'";
    $resultadoVentas = $enlace->query($queryVentas);
    for($x=0;$x<mysqli_num_rows($resultado);$x++){
        $filaVentas = $resultadoVentas->fetch_assoc();
        $auxEmpleado = $filaVentas['idEmpleado'];
        $auxCliente = $filaVentas['idCliente'];
    }
    //empleado
    $queryEmpleado = "SELECT * FROM empleados WHERE idEmpleado = '$auxEmpleado'";
    $resultadoEmpleado = $enlace->query($queryEmpleado);

    //Cliente
    $queryCliente = "SELECT * FROM clientes WHERE idCliente = '$auxCliente'";
    $resultadoCliente = $enlace->query($queryCliente);

    $salida_xml = "<?xml version=\"1.0\"?>";
    $salida_xml.= "<Factura>\n";
    //mysqli retornara el numero de filas correcto hasta que todas las filas del resultado hayan sido recuperadas.
    for($x=0;$x<mysqli_num_rows($resultado);$x++){
        //$fila = $resultado->fetch_assoc();
        //$filaVentas = $resultadoVentas->fetch_assoc();
        $filaEmpleados = $resultadoEmpleado->fetch_assoc();
        $filaClientes = $resultadoCliente->fetch_assoc();

    $salida_xml.= "\t<Datos>\n";
        $salida_xml.= "\t<idFactura>".$fila['idFactura']."</idFactura>\n";

        $salida_xml.= "\t<Ventas>\n";
            $salida_xml.= "\t<idVenta>".$fila['idVenta']."</idVenta>\n";
            $salida_xml.= "\t<idEmpleado>".$filaVentas['idEmpleado']."</idEmpleado>\n";
            $salida_xml.= "\t<idCliente>".$filaVentas['idCliente']."</idCliente>\n";
            $salida_xml.= "\t<fecha>".$filaVentas['fecha']."</fecha>\n";
            $salida_xml.= "\t<total>".$filaVentas['total']."</total>\n";
        $salida_xml.= "\t</Ventas>\n";

        $salida_xml.= "\t<Empleado>\n";
            $salida_xml.= "\t<Nombre>".$filaEmpleados['nombreEmpleado']."</Nombre>\n";
            $salida_xml.= "\t<Paterno>".$filaEmpleados['apellidoPaternoEmpleado']."</Paterno>\n";
            $salida_xml.= "\t<Materno>".$filaEmpleados['apellidoMaternoEmpleado']."</Materno>\n";
        $salida_xml.= "\t</Empleado>\n";

        $salida_xml.= "\t<Cliente\n>";
            $salida_xml.= "\t<Nombre>".$filaClientes['nombreCliente']."</Nombre>\n";
            $salida_xml.= "\t<Paterno>".$filaClientes['apellidoPaternoCliente']."</Paterno>\n";
            $salida_xml.= "\t<Materno>".$filaClientes['apellidoMaternoCliente']."</Materno>\n";
            $salida_xml.= "\t<Direccion>".$filaClientes['direccionCliente']."</Direccion>\n";
            $salida_xml.= "\t<Telefono>".$filaClientes['telefonoCliente']."</Telefono>\n";
            $salida_xml.= "\t<Correo>".$filaClientes['correoCliente']."</Correo>\n";
            $salida_xml.= "\t<NIF>".$filaClientes['nifCliente']."</NIF>\n";
        $salida_xml.="\t</Cliente>\n";

    $salida_xml.= "\t</Datos>\n";
    }
    $salida_xml.="</Factura>";
    echo $salida_xml;
/*
    $obj = new Xml2Pdf($salida_xml);
    $pdf->AddPage('Portrait','A4');
    $pdf = $obj->render();
    $pdf->Output()*/
?>
