<?php 
/**
 * Clase para generar la conexión a la base de datos
 */
class Connection {
	
	function get_connection() {
		$connection = mysqli_connect('localhost', 'root', '', 'juegos');
		$connection->set_charset('utf8');
		return $connection;
	}
}

 ?>