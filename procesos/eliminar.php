<?php 
require_once "../clases/Connection.php";
require_once "../clases/Crud.php";

$obj = new Crud();
echo $obj->delete($_POST['idJuego']);

 ?>