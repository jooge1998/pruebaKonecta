<?php



if(isset($_GET['controller']) && isset($_GET['action'])){
    $controller = $_GET['controller'];
    $action = $_GET['action'];

    include_once("./../Controllers/controllers".$controller . ".php");

    $objController = "Controller" . ucfirst($controller);

    $controllador = new $objController();

    $fun =  ucfirst($action);

    $controllador->$fun();
   
  }else{
    echo "no ruta";
  }


