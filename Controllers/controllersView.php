<?php

class ControllerViews{

    public function Producto(){
        return"./Productos.php";
    }

    public function Dashboard(){
        header('location: ./Dashboard.php');
    }

    public function Venta(){
        return "./Venta.php";
    }

    

    public function Index(){
        return "./../index.php";
    }


}

