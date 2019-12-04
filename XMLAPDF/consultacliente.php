<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM clientes WHERE idCliente = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
    echo $row['idCliente'];
    echo"<br>";
    echo $row['nombreCliente'];
    echo"<br>";
    echo $row['apellidoPaternoCliente'];
    echo"<br>";
    echo $row['apellidoMaternoCliente'];
    echo"<br>";
    echo $row['direccionCliente'];
    echo"<br>";
    echo $row['telefonoCliente'];
    echo"<br>";
    echo $row['correoCliente'];



?>