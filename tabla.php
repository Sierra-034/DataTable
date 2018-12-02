<?php 
require_once "clases/Connection.php";
$obj = new Connection();
$connection = $obj->get_connection();
$sql = "SELECT ID_JUEGO, NOMBRE, ANIO, EMPRESA FROM JUEGOS";
$result = mysqli_query($connection, $sql);

 ?>

<div>
	<table class="table table-hover table-condensed" id="idDataTable">
		<thead style="background-color: #dc3545; color: white; font-weight: bold;">	<!-- Separar en otro archivo css -->
			<tr>
				<td>Nombre</td>				
				<td>Año</td>				
				<td>Empresa</td>
				<td>Editar</td>			
				<td>Eliminar</td>			
			</tr>
		</thead>
		<tbody>
			<?php while($mostrar = mysqli_fetch_row($result)) { ?>	<!-- Abre el ciclo que muestra registros -->
			<tr>
				<td><?php echo $mostrar[1] ?></td>
				<td><?php echo $mostrar[2] ?></td>
				<td><?php echo $mostrar[3] ?></td>
				<td style="text-align: center;">
					<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
						<i class="fas fa-pen-square"></i>
					</span>
				</td>
				<td style="text-align: center;">
					<span class="btn btn-danger btn-sm">
						<i class="fas fa-minus-circle"></i>
					</span>
				</td>
			</tr>
			<?php } ?>	<!-- Cierre del ciclo que muestra los registros -->
		</tbody>
		<tfoot style="background-color: #ccc; color: white; font-weight: bold;">
			<tr>
				<td>Nombre</td>				
				<td>Año</td>				
				<td>Empresa</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
    	$('#idDataTable').DataTable();
	} );
</script>