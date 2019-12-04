<?php
	require 'conexion.php';
	require 'config.php';
	$nombreEmpleado = $_POST['nombreEmpleado'];
	$apellidoPaternoEmpleado = $_POST['paternoEmpleado'];
	$apellidoMaternoEmpleado = $_POST['maternoEmpleado'];

	
	$nombreCliente = $_POST['nombreCliente'];
	$apellidoPaternoCliente = $_POST['paternoCliente'];
	$apellidoMaternoCliente = $_POST['maternoCliente'];
	$direccionCliente = $_POST['direccionCliente'];
	$telefonoCliente = $_POST['telefonoCliente'];
	$emailCliente = $_POST['emailCliente'];
	$nifCliente = $_POST['nifCliente'];
	$productoCliente =  $_POST['productoCliente'];

	$sqlEmpleado = "INSERT INTO empleados(nombreEmpleado,apellidoPaternoEmpleado,apellidoMaternoEmpleado) VALUES ('$nombreEmpleado','$apellidoPaternoEmpleado','$apellidoMaternoEmpleado')";
	$resEmpleado = $mysqli->query($sqlEmpleado);

	$sqlCliente = "INSERT INTO clientes(nombreCliente,apellidoPaternoCliente,apellidoMaternoCliente,direccionCliente,telefonoCliente,correoCliente,nifCliente) VALUES('$nombreCliente','$apellidoPaternoCliente','$apellidoMaternoCliente','$direccionCliente','$telefonoCliente','$emailCliente','$nifCliente') ";
	$resCliente = $mysqli->query($sqlCliente);

	$sqlVentaDetalle = "INSERT INTO detalle_venta(idProducto,cantidad) VALUES ('1','1')";
	$resDetalle = $mysqli->query($sqlVentaDetalle);
	
    header("Content-type: text / xml");
	$enlace = new mysqli($host,$user,$pass) or die ("Error MySQL");
    mysqli_select_db($enlace,$database) or die ("Error en la Base de Datos");
    $query = "SELECT * FROM empleados WHERE nombreEmpleado = '$nombreEmpleado'";
	$resultado = $enlace->query($query);
	for($x=0;$x<mysqli_num_rows($resultado);$x++){
        $fila = $resultado->fetch_assoc();
        $auxIdEmpleado = $fila['idEmpleado'];
	}
    $queryCliente = "SELECT * FROM clientes WHERE nombreCliente = '$nombreCliente'";
	$resultadoCliente = $enlace->query($queryCliente);
	for($x=0;$x<mysqli_num_rows($resultadoCliente);$x++){
        $filados = $resultadoCliente->fetch_assoc();
        $auxIdCliente = $filados['idCliente'];
	}
	/*
	$mydate=getdate();
	$auxFecha = "$mydate[year]".'-'."$mydate[mon]".'-'."$mydate[mday]".' '."$mydate[hours]".'0:'."$mydate[minutes]".'0:'."$mydate[seconds]";
	*/
	//echo "$auxFecha";
	$sqlVentas = "INSERT INTO ventas(idEmpleado,idCliente,fecha,total) VALUES ('$auxIdEmpleado','$auxIdCliente','2019-11-01 20:05:00','$productoCliente')";
	$resVentas = $mysqli->query($sqlVentas);


	$queryVentas = "SELECT * FROM ventas WHERE idEmpleado = '$auxIdEmpleado'";
	$resultadoVentas = $enlace->query($queryVentas);
	$idVenta="";
	for($x=0;$x<mysqli_num_rows($resultadoVentas);$x++){
        $tres = $resultadoVentas->fetch_assoc();
        $idVenta = $tres['idVenta'];
	}
	
	$sqlFactura = "INSERT INTO factura(idVenta,idCliente) VALUES ('$idVenta', '$auxIdCliente')";

	$resFactura = $mysqli->query($sqlFactura);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resEmpleado AND $resCliente AND $resDetalle AND $resVentas){ ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
