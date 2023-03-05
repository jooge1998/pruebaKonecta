<?php

class ControllerProductos{

    #crea un nuevo cliente
    public function Create(){
        
        require_once("./../Model/productos.php");

        $productos = new Productos();

        /* valida que los campos no este vacios o halla negativos */
        if(
            $_POST['name'] == "" 
            or $_POST['peso'] <= 0 
            or $_POST['precio'] <= 0 
            or $_POST['referencia'] == "" 
            or $_POST['stock'] <= 0 
            or $_POST['fecha'] == "" 
            or $_POST['categoria'] == ""
        ){
        
            header('location: ./Productos.php?alerta=valid');
        }else{

            #verifica si el boton agregar con el name salvar fue presionado
            if(isset($_POST['salvar'])){
                #llama al metodo create
                $productos->create();

                header('location: ./Productos.php');
            }
        }

      

    }

    public function Delete(){

        require_once("./../Model/productos.php");

        $productos = new Productos();

        #verifica si hay una solicitud de tipo de get
        if(isset($_GET['id'])){
            #llama al metodo delete delete
            $productos->delete($_GET['id']);

            header('location: ./Productos.php');
        }
    }

    public function Read(){
        require_once("./../Model/productos.php");

        $productos = new Productos();

        $cont = 1;
        #recorre todos los datos en la base de datos
        foreach ($productos->getAll() as $key => $value) {

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

            <a href='./ruteador.php?controller=Productos&action=delete&id=$value->ID' class='btn btn-danger mr-1'>ELIMINAR</a> 
             
            <a class='btn btn-primary mr-1' data-bs-toggle='modal' data-bs-target='#staticBackdrop1' data-bs-id='$value->ID'> EDITAR</a>

            <a href='./../View/Comprar.php?id=$value->ID' class='btn btn-success mr-1'>COMPRAR</a> 
            </div>

            </td>";
            echo "</tr>";
            $cont++;

           
        }
    }

    
    public function Update(){

        require_once("./../Model/productos.php");

        $productos = new Productos();

        /* VALIDACIONES */
        if(
            $_POST['name'] == "" 
            or $_POST['peso'] <= 0 
            or $_POST['precio'] <= 0 
            or $_POST['referencia'] == "" 
            or $_POST['stock'] <= 0 
            or $_POST['fecha'] == "" 
            or $_POST['categoria'] == ""
        ){

            header('location: ./Productos.php?alerta=valid');

           } else{
                   #verifica si hay una solicitud de tipo de get
                    if(isset($_POST['editar'])){
                        #llama al metodo delete delete
                        $productos->update();

                        header('location: ./Productos.php');
                    }

            }

     
        
    }

    public function UpdateStock(){

        require_once("./../Model/productos.php");

        $productos = new Productos();

  
        #llama al metodo delete delete
        $productos->updateStock($_POST['id']);

        
    }

     #imprime el numero de registros en tabla productos
     public function getAll(){
        require_once("./../Model/productos.php");

        $productos = new Productos();
        echo count($productos->getAll());
        
    }

    #imprime el numero de registros en tabla productos
    public function getId(){
        require_once("./../Model/productos.php");

        $productos = new Productos();

        $data = $productos->getById($_GET['id']);

        //echo json_encode($data);
        return json_encode($data);
        
    }

    
    #imprime el numero de registros en tabla productos
    public function getbyId(){
        require_once("./../Model/productos.php");

        $productos = new Productos();

        $data = $productos->getById($_GET['id']);

        echo json_encode($data);
        
    }

}
