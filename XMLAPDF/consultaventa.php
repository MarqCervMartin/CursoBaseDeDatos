<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM ventas WHERE idVenta = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
    echo $row['idVenta'];
    echo"<br>";
    echo $row['idEmpleado'];
    echo"<br>";
    echo $row['idCliente'];
    echo"<br>";
    echo $row['fecha'];
    echo"<br>";
    echo $row['total'];
   

?>