<?php 
class Crud {
	function add($datos) {
		$obj = new Connection();
		$connection = $obj->get_connection();

		$sql = "INSERT INTO JUEGOS (NOMBRE, ANIO, EMPRESA) VALUES ('$datos[0]', '$datos[1]', '$datos[2]')";
		return mysqli_query($connection, $sql);
	}

	function get_datos($idJuego) {
		$obj = new Connection();
		$connection = $obj->get_connection();

		$sql = "SELECT ID_JUEGO, NOMBRE, ANIO, EMPRESA FROM JUEGOS WHERE ID_JUEGO = '$idJuego'";	
		$result = mysqli_query($connection, $sql);
		$ver = mysqli_fetch_row($result);
		$datos = array('ID_JUEGO' => $ver[0], 'NOMBRE' => $ver[1], 'ANIO' => $ver[2], 'EMPRESA' => $ver[3]);
		return $datos;
	}

	function update($datos) {
		$obj = new Connection();
		$connection = $obj->get_connection();

		$sql = "UPDATE JUEGOS SET NOMBRE = '$datos[0]', ANIO = '$datos[1]', EMPRESA = '$datos[2]' WHERE ID_JUEGO = '$datos[3]'";
		return mysqli_query($connection, $sql);
	}
}

 ?>