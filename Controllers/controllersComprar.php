<?php

class ControllerComprar{

    #crea un nuevo cliente
    public function Create(){

        require_once("./../Model/Comprar.php");

        require_once("./../Model/Productos.php");

        $Comprar = new Comprar();

        $producto = new Productos();

        #verifica si el boton agregar con el name salvar fue presionado
        if (isset($_POST['salvar'])) {
            #llama al metodo create


            //Verifica el stock del producto y valida la cantidad no sea negativa
            if ($this->VerificarStock($_POST['id'], $_POST['cantidad']) and $_POST['cantidad']>= 0) {

                //Verifica que el producto halla sido comprado anteriormente
                if ($this->VerificarProducto($_POST['id'])) {

                    //print_r($this->VerificarProducto($_POST['id'])) ;

                    $this->UpdateCantidad($_POST['cantidad'], $_POST['id']);

                    $producto->updateStock($_POST['id']);
                } else {
                    $Comprar->create();

                    $producto->updateStock($_POST['id']);
                }

                header('location: ./Productos.php?alert=si');
            } else {
                header("location: ./Comprar.php?alert2=si&id=" . $_POST['id']);
            }
        }
    }


    public function VerificarStock($id, $cantidad) {

        require_once("./../Model/Productos.php");

        $producto = new Productos();

        $produ =   $producto->getById($id);

        return intval($produ->STOCK) - intval($cantidad) >= 0;
    }

    public function VerificarProducto($id){

        require_once("./../Model/Comprar.php");

        $Comprar = new Comprar();

        return $Comprar->VerificarProducto($id);
    }


    public function Update() {

        require_once("./../Model/Comprar.php");

        $Comprar = new Comprar();

        #verifica si hay una solicitud de tipo de get
        if (isset($_POST['editar'])) {
            #llama al metodo delete delete
            $Comprar->update($_GET['id']);

            header('location: ./View/Comprar.php');
        }
    }

    public function UpdateCantidad($cantidad, $id) {

        require_once("./../Model/Comprar.php");

        $Comprar = new Comprar();

        $Comprar->updateCantidad($cantidad, $id);
    }
}
