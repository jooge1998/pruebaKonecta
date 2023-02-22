<?php

class ControllerProductos{

    #crea un nuevo cliente
    public function Create(){
        
        require_once("./../Model/productos.php");

        $productos = new Productos();

        #verifica si el boton agregar con el name salvar fue presionado
        if(isset($_POST['salvar'])){
            #llama al metodo create
            $productos->create();

            header('location: /dasboard/View/Capacitacion.php');
        }

    }

    public function Delete(){

        require_once("././Model/productos.php");

        $productos = new Productos();

        #verifica si hay una solicitud de tipo de get
        if(isset($_GET['id'])){
            #llama al metodo delete delete
            $productos->delete($_GET['id']);

            header('location: /dasboard/View/productos.php');
        }
    }

    public function Read(){
        require_once("./../Model/productos.php");

        $productos = new Productos();

        $cont = 1;
        #recorre todos los datos en la base de datos
        foreach ($productos->getAll() as $key => $value) {
            
            $datos = array(
                        "categoria" => $value->CATEGORIA,
                        "fecha" => $value->FECHA_CREACION,
                        "nombre"=> $value->NOMBRE_PRODUCTO,
                        "peso" => $value->PESO,
                        "precio" => $value->PRECIO,
                        "referencia" => $value->REFERENCIA,
                        "stock" => $value->STOCK,
                        "id" =>$value->ID
                    );

            $json = json_encode($datos);

            echo "<tr>";
            echo  "<th scope='row'>".$cont."</th>";
            
            echo  "<td >" . $value->NOMBRE_PRODUCTO . "</td>";
            echo  "<td >" . $value->PESO . "</td>";
            echo  "<td >" . $value->PRECIO . "</td>";
            echo  "<td >" . $value->REFERENCIA . "</td>";
            echo  "<td >" . $value->STOCK . "</td>";
            echo  "<td >" .  $productos->getCategoria($value->CATEGORIA)[0]->categoria . "</td>";
            echo  "<td >" . $value->FECHA_CREACION . "</td>";
            echo  "<td>

            <div class='d-flex justify-content-center'>

            <a href='/dasboard/View/Login.php?controller=Cliente&action=delete&id=$value->ID' class='btn btn-danger mr-1'>ELIMINAR</a> 
             
            <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop1' onclick='enviar( $json)'> EDITAR</a>
            </div>

            </td>";
            echo "</tr>";
            $cont++;

           
        }
    }

    
    public function Update(){

        require_once("./../Model/productos.php");

        $productos = new Productos();

        #verifica si hay una solicitud de tipo de get
        if(isset($_POST['editar'])){
            #llama al metodo delete delete
            $productos->update($_GET['id']);

            header('location: /dasboard/View/productos.php');
        }
        
    }

     #imprime el numero de registros en tabla productos
     public function getAll(){
        require_once("./../Model/productos.php");

        $productos = new Productos();
        echo count($productos->getAll());
        
    }

}