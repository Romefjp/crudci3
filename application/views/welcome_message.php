<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CRUD CI 3</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h1>CRUD EN CODEIGNITER 3</h1>
			</div>

			<div class="mb-5">
				<?php echo form_open('welcome/agregar', array('id'=>'formulario-persona')); ?>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Nombre</label>
							<input type="text" name="nombre" class="form-control" placeholder="Nombre" required id="nombre">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Apellido paterno</label>
							<input type="text" name="ap" class="form-control" placeholder="Apellido paterno" required id="ap">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Apellido materno</label>
							<input type="text" name="am" class="form-control" placeholder="Apellido materno" required id="am">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Fecha de nacimiento</label>
							<input type="date" name="fecha_nacimiento" class="form-control" required id="fn">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Genero</label>
							<input type="text" name="genero" class="form-control" placeholder="F o M" required id="genero">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Guardar</button>
				<?php echo form_close(); ?>
			</div>

			<div class="row">
				<div class="card col-12">
					<div class="card-header">
						<h2>Tabla de personas registradas</h2>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nombre completo</th>
									<th scope="col">Fech. Nacimiento</th>
									<th scope="col">Genero</th>
									<th scope="col">Editar</th>
									<th scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$count = 0;
									foreach ($personas as $persona) {
										echo '
											<tr>
												<td>'.++$count.'</td>
												<td>'.$persona->nombre.' '.$persona->ap.' '.$persona->am.'</td>
												<td>'.$persona->fecha_nacimiento.'</td>
												<td>'.$persona->genero.'</td>
												<td><button type="button" class="btn btn-warning text-white" onclick="colocar_datos('.$persona->id.', `'.$persona->nombre.'`, `'.$persona->ap.'`, `'.$persona->am.'`, `'.$persona->fecha_nacimiento.'`, `'.$persona->genero.'`);">Editar</button></td>
												<td> <a type="button" class="btn btn-danger" href="'.base_url('welcome/eliminar/'.$persona->id).'">Eliminar</a> </td>
											</tr>
										';
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script>
			let url_editar = '<?php echo base_url('welcome/editar/'); ?>';
			function colocar_datos(id, nombre, ap, am, fecha_nacimiento, genero) {
				document.getElementById('formulario-persona').setAttribute('action', url_editar+id)
				document.getElementById('nombre').value = nombre;
				document.getElementById('ap').value = ap;
				document.getElementById('am').value = am;
				document.getElementById('fn').value = fecha_nacimiento;
				document.getElementById('genero').value = genero;
			}
		</script>
	</body>
</html>