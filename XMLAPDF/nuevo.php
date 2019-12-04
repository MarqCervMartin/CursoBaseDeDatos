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
				<h3 style="text-align:center">NUEVA FACTURA</h3>
			</div>
			<div class="row">
				<h2 style="text-align:left">Datos del Empleado</h2>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombreEmpleado" placeholder="Nombre del empleado" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Apellido Paterno</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="paternoEmpleado" placeholder="Apellido paterno del empleado" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Apellido Materno</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="maternoEmpleado" placeholder="Apellido materno del empleado" required>
					</div>
				</div>

				<div class="row">
					<h2 style="text-align:left">Datos del Cliente</h2>
				</div>
				
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombreCliente" placeholder="Nombre del cliente" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Apellido Paterno</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="paternoCliente" placeholder="Apellido paterno del cliente" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Apellido Materno</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="maternoCliente" placeholder="Apellido materno del cliente" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="direccionCliente" placeholder="Dirección del cliente" required>
					</div>
				</div>

				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefonoCliente" placeholder="Telefono del cliente">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="emailCliente" placeholder="Email del cliente" required>
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">NIF o RFC</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nifCliente" placeholder="NIF o RFC del cliente" required>
					</div>
				</div>
				
				<div class="row">
					<h2 style="text-align:left">Vender Producto</h2>
				</div>
				
				<div class="form-group">
					<label for="estado_civil" class="col-sm-2 control-label">Producto</label>
					<div class="col-sm-10">
						<select class="form-control" id="estado_civil" name="productoCliente">
							<option value="1">Borrador pizarron</option>
							<option value="2">Pizarron</option>
							<option value="3">Marcador de color</option>
							<option value="4">Cartulina</option>
							<option value="5">Lapizero</option>
							<option value="6">Corrector</option>
							<option value="7">Lapizera</option>
							<option value="8">Colores</option>
							<option value="9">Lapiz</option>
							<option value="10">Goma</option>

						</select>
					</div>
				</div>
				
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>