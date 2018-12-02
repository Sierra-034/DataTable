<?php 
require_once "../clases/Connection.php";
require_once "../clases/Crud.php";

$obj = new Crud();
$datos = array($_POST['nombre'], $_POST['anio'], $_POST['empresa']);
echo $obj->add($datos);

 ?>