<?php 
require_once "../clases/Connection.php";
require_once "../clases/Crud.php";

$obj = new Crud();
$datos = array($_POST['nombreU'], $_POST['anioU'], $_POST['empresaU'], $_POST['idJuego']);;
echo $obj->update($datos);

 ?>