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
			<!-- Título de oa página -->
			<div class="row">
				<h2>CRUD EN CI 3</h2>
			</div>

			<!-- Formulario -->
			<div class="mb-5">
				<?php echo form_open('welcome/agregar', ['id' => 'form-persona']); ?>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Nombre</label>
							<input type="text" name="nombre" class="form-control" required placeholder="Nombre" id="nombre">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Apellido paterno</label>
							<input type="text" name="ap" class="form-control" required placeholder="Apellido paterno" id="ap">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Apellido matenro</label>
							<input type="text" name="am" class="form-control" required placeholder="Apellido materno" id="am">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Fecha de nacimiento</label>
							<input type="date" name="fn" class="form-control" required id="fn">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Genero</label>
							<input type="text" name="genero" class="form-control" required placeholder="F o M" id="genero">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Guardar</button>
				<?php echo form_close(); ?>
			</div>

			<!-- Tabla de datos -->
			<div class="row">
				<div class="card col-12">
					<div class="card-header">
						<h4>Tabla de personas</h4>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Fecha de nacimiento</th>
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
												<td>'.$persona->fn.'</td>
												<td>'.$persona->genero.'</td>
												<td><button type="button" class="btn btn-warning text-white" onclick="llenar_datos('.$persona->id.', `'.$persona->nombre.'`, `'.$persona->ap.'`, `'.$persona->am.'`, `'.$persona->fn.'`, `'.$persona->genero.'`)">Editar</button></td>
												<td><a href="'.base_url('welcome/eliminar/'.$persona->id).'" type="button" class="btn btn-danger">Eliminar</a></td>
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
			let url = "<?php echo base_url('welcome/editar'); ?>";
			const llenar_datos = (id, nombre, ap, am, fn, genero) => {
				let path = url+"/"+id;
				document.getElementById('form-persona').setAttribute('action', path);
				document.getElementById('nombre').value = nombre;
				document.getElementById('ap').value = ap;
				document.getElementById('am').value = am;
				document.getElementById('fn').value = fn;
				document.getElementById('genero').value = genero;
			};
		
		</script>
	</body>
</html>