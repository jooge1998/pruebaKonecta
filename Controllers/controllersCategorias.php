<?php

class ControllerProductos{

    
     #imprime el numero de registros en tabla productos
     public function getAll(){
        require_once("./../Model/productos.php");

        $productos = new Productos();
        echo count($productos->getAll());
        
    }

}
