<!DOCTYPE html>

<html>
<head>
	<title>DataTable practice</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Tablas dinámicas con datatable y php
					</div>
					<div class="card-body">
						<h5 class="card-title">Lista de juegos de NES clásicos</h5>
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarNuevosDatosModal">
							Agregar nuevo <i class="fas fa-plus-circle"></i>
						</span>
						<hr>
						<div id="tableDataTable"></div>
					</div>
					<div class="card-footer text-muted">
						By Samuel Gómez Balderas
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarNuevosDatosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevos juegos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Año</label>
						<input type="text" class="form-control input-sm" id="anio" name="anio">
						<label>Empresa</label>
						<input type="text" class="form-control input-sm" id="empresa" name="empresa">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarNuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar juego</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idJuego" name="idJuego">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Año</label>
						<input type="text" class="form-control input-sm" id="anioU" name="anioU">
						<label>Empresa</label>
						<input type="text" class="form-control input-sm" id="empresaU" name="empresaU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#btnAgregarNuevo').click(function() {
			datos = $('#frmnuevo').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url: "procesos/agregar.php",
				success: function(r) {
					if(r == 1) {
						$('#frmnuevo')[0].reset();
						$('#tableDataTable').load('tabla.php');
						alertify.success("Agregado con éxito");
					}
					else{
						alertify.error("Falló al agregar");
					}
				}
			});
		});

		$('#btnActualizar').click(function() {
			datos = $('#frmnuevoU').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url: "procesos/actualizar.php",
				success: function(r) {
					console.log(r);
					if(r == 1) {
						$('#frmnuevoU')[0].reset();
						$('#tableDataTable').load('tabla.php');
						alertify.success("Actualizado con éxito");
					}
					else{
						alertify.error("Falló al actualizar");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tableDataTable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idJuego) {
		$.ajax({
			type: "POST",
			data: "idJuego=" + idJuego,
			url: "procesos/obtenerDatos.php",
			success: function(r) {
				console.log(r);
				datos = jQuery.parseJSON(r);
				$('#idJuego').val(datos['ID_JUEGO']);
				$('#nombreU').val(datos['NOMBRE']);
				$('#anioU').val(datos['ANIO']);
				$('#empresaU').val(datos['EMPRESA']);
			}
		});
	}
</script>