<?php 
class Crud {
	function add($datos) {
		$obj = new Connection();
		$connection = $obj->get_connection();

		$sql = "INSERT INTO JUEGOS (NOMBRE, ANIO, EMPRESA) VALUES ('$datos[0]', '$datos[1]', '$datos[2]')";
		return mysqli_query($connection, $sql);
	}
}

 ?>