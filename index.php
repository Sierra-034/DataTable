<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
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
						<span class="btn btn-primary">
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
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tableDataTable').load('tabla.php');
	});
</script>