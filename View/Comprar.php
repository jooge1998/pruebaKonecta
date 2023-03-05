<!-- Headers -->

<?php
echo  "<title>Comprar</title>";

#css boostrap 5v
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>";

require_once "./base/view_navbar.php";

/* include_once './../Controllers/controllersPlane.php';
$controllers = new ControllerPlanes(); */

if(isset($_POST['salvar'])){

    include_once './Login.php';
}

?>

<!-- Content -->

<div class="container">

<?php
if (isset($_GET['alert2'])) {
  echo "<div class='alert alert-danger' role='alert'>
  No hay Suficiente Stock para este Producto
 </div>";

} 

?>

    <div class="row mt-4 mx-5">

        <div class="col-9">

            <h1 class="Display-4">Comprar Producto</h1>

        </div>

      

    </div>

    <div class="row mt-4">

    <?php

include_once './../Controllers/controllersProductos.php';
$controllers = new ControllerProductos;

$producto =  json_decode($controllers->getId($_GET['id'])) ;

//print_r($producto);

?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $producto->NOMBRE_PRODUCTO ?></h6>
            </div>
            <div class="card-body">

            
<?php

echo "Referencia " . $producto->REFERENCIA . "</br>";

echo "PRECIO " . $producto->PRECIO . "</br>";

echo "PESO " . $producto->PESO . "</br>";

echo "PRECIO " . $producto->PRECIO . "</br>";

echo "CATEGORIA " . $producto->CATEGORIA . "</br>";

echo "STOCK " . $producto->STOCK . "</br>";

echo "FECHA_CREACION " . $producto->FECHA_CREACION . "</br>";


?>


<form action="./ruteador.php?controller=Comprar&action=create" method="post">
    <input class="form-control my-3" type="number" name="cantidad" placeholder="cantidad a comprar" >

    <input type="hidden" name="id" value="<?php echo $producto->ID?>">

    <input class="btn btn-primary" name="salvar" type="submit" value="Comprar">

</form>




                </div>

                </div>

            </div>


<!-- Content -->




<!-- Footer -->
<?php
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

require_once './base/view_footer.php'; 
?>