<?php

class ControllerComprar{

    #crea un nuevo cliente
    public function Create(){
        
        require_once  ("./../Model/Comprar.php");

        require_once  ("./../Model/Productos.php");

        $Comprar = new Comprar();
        
        $producto = new Productos();

        #verifica si el boton agregar con el name salvar fue presionado
        if(isset($_POST['salvar'])){
            #llama al metodo create
          
//Verifica el stock del producto
            if ($this->VerificarStock($_POST['id'],$_POST['cantidad'])) {

           //Verifica que el producto halla sido comprado anteriormente
                if ($this->VerificarProducto($_POST['id'])) {

                    //print_r($this->VerificarProducto($_POST['id'])) ;

                    $this->UpdateCantidad($_POST['cantidad'],$_POST['id']);

                    $producto->updateStock($_POST['id']); 

                } else {
                        $Comprar->create();    
                        
                        $producto->updateStock($_POST['id']); 
                }
                
                header('location: ./Productos.php?alert=si');
            
            } else {
                 header("location: ./Comprar.php?alert2=si&id=".$_POST['id']);
            }
            

           
        }

    }

    public function Delete(){

        require_once  ("./../Model/Comprar.php");

        $Comprar = new Comprar();

        #verifica si hay una solicitud de tipo de get
        if(isset($_GET['id'])){
            #llama al metodo delete delete
            $Comprar->delete($_GET['id']);

            header('location: ./View/Comprar.php');
        }
    }

    public function VerificarStock($id,$cantidad){

        require_once  ("./../Model/Productos.php");

        $producto = new Productos();

          $produ =   $producto->getById($id);

        
          if ((intval($produ->STOCK) - intval($cantidad))>= 0) {
            
            return true;
          } else {
            
            return false;
          }
          
        
    }

    public function VerificarProducto($id){

        require_once  ("./../Model/Comprar.php");

        $Comprar = new Comprar();

        return $Comprar->VerificarProducto($id);
        
    }

    

    public function Read(){
        require_once  ("./../Model/Comprar.php");

        $Comprar = new Comprar();

        $cont = 1;
        #recorre todos los datos en la base de datos
        foreach ($Comprar->getAll() as $key => $value) {

            $datos = array("plan" => $value->PLAN,
            "descrip"=> $value->DESCRIPCION,
            "precio" => $value->PRECIO,
            "id" =>$value->ID);

            $json = json_encode($datos);

            echo "<tr>";
            echo  "<th scope='row'>".$cont."</th>";
            echo  "<td id='plan'>" . $value->PLAN . "</td>";
            echo  "<td id='descrip'>" . $value->DESCRIPCION . "</td>";
            echo  "<td id='precio'>" . $value->PRECIO . "</td>";
            echo  "<td>

            <div class='d-flex justify-content-center'>

            <a href='./View/Login.php?controller=Plane&action=delete&id=$value->ID' class='btn btn-danger mr-1'>ELIMINAR</a> 
             
            <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop1' onclick='enviar(
            $json)' > EDITAR</a>

            </div>

            </td>";
            echo "</tr>";
            $cont++;
        }
    }

    
    public function Update(){

        require_once  ("./../Model/Comprar.php");

        $Comprar = new Comprar();

        #verifica si hay una solicitud de tipo de get
        if(isset($_POST['editar'])){
            #llama al metodo delete delete
            $Comprar->update($_GET['id']);
            
            header('location: ./View/Comprar.php');
        }
        
    }

    public function UpdateCantidad($cantidad,$id){

        require_once  ("./../Model/Comprar.php");

        $Comprar = new Comprar();

        $Comprar->updateCantidad($cantidad,$id);
            
        
    }
    

}
