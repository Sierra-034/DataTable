<?php 
require_once "../clases/Connection.php";
require_once "../clases/Crud.php";

$obj = new Crud();
echo json_encode($obj->get_datos($_POST['idJuego']));

 ?>