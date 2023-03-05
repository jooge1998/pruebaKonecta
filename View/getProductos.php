<?php

include_once './../Controllers/controllersProductos.php';
$controllers = new ControllerProductos();


$data = $controllers->getId($_POST['id']);

echo json_encode($data);