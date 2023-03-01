<?php
echo    "<title>Productos</title>";

#css boostrap 5v
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>";

require_once "./base/view_navbar.php";


include_once './../Controllers/controllersProductos.php';
$controllers = new ControllerProductos();

?>

<!-- Content -->

<div class="container">


  <?php
  if (isset($_GET['alert'])) {
    echo "<div class='alert alert-success' role='alert'>
  Comprar Exitosa
</div>";
  }

  ?>

  <!-- Inicio Modal Agregar -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Crear Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form action="./ruteador.php?controller=Productos&action=create" method="post">

            <input class="form-control mb-3" type="text" name="name" placeholder="Nombre Producto" required>

            <input class="form-control mb-3" type="number" name="peso" placeholder="Peso Producto" required>

            <input class="form-control mb-3" type="number" name="precio" placeholder="Precio" required>

            <input class="form-control mb-3" type="text" name="referencia" placeholder="Referencia" required>

            <input class="form-control mb-3" type="number" name="stock" placeholder="Stock" required>

            <label for="">
              Categorias
            </label>
            <select name="categoria" class="form-select" aria-label="Default select example">

              <?php


              include_once './../Model/categorias.php';
              $controllers2 = new Categorias();



              $datos = $controllers2->getAll();


              foreach ($datos as $key => $value) {
              ?>

                <option value="<?php echo $datos[$key]->ID_CATEGORIA ?>"><?php echo $datos[$key]->CATEGORIA ?></option>

              <?php
              };
              ?>



            </select>

            <label for="">
              Fecha Creacion

              <input class="form-control mt-3" type="date" name="fecha" required>

            </label>

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <input name="salvar" value="Salvar" type="submit" class="btn btn-primary">
        </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Fin Modal Agregar -->



  <!-- Inicio Modal Editar -->
  <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Editar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form id='formEdit' action="" method="post">

            <input class="form-control mb-3" type="text" name="name" placeholder="Nombre Producto" required>

            <input class="form-control mb-3" type="number" name="peso" placeholder="Peso Producto" required>

            <input class="form-control mb-3" type="number" name="precio" placeholder="Precio" required>

            <input class="form-control mb-3" type="text" name="referencia" placeholder="Referencia" required>

            <input class="form-control mb-3" type="number" name="stock" placeholder="Stock" required>

            <label for="">
              Categorias
            </label>
            <select name="categoria" class="form-select" aria-label="Default select example">

              <?php


              include_once './../Model/categorias.php';
              $controllers2 = new Categorias();



              $datos = $controllers2->getAll();


              foreach ($datos as $key => $value) {
              ?>

                <option value="<?php echo $datos[$key]->ID_CATEGORIA ?>"><?php echo $datos[$key]->CATEGORIA ?></option>

              <?php
              };
              ?>



            </select>

            <label for="">
              Fecha Creacion

              <input class="form-control mt-3" type="date" name="fecha" required>

            </label>

            <script>
              function enviar(datos) {

                //console.log(datos['name'])
                const formEdit = document.getElementById('formEdit');

                // le agrega la ruta al action del formulario
                formEdit.setAttribute('action', './ruteador.php?controller=Productos&action=update&id=' + datos['id']);

                document.getElementsByName('name')[1].value = datos['name'];
                document.getElementsByName('peso')[1].value = datos['peso'];
                document.getElementsByName('precio')[1].value = datos['precio'];
                document.getElementsByName('referencia')[1].value = datos['referencia'];
                document.getElementsByName('stock')[1].value = datos['stock'];
                document.getElementsByName('categoria')[1].value = datos['categoria'];
                document.getElementsByName('fecha')[1].value = datos['fecha'];

              }
            </script>

        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <input name="editar" value="Editar" type="submit" class="btn btn-primary">
        </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Fin Modal Editar -->


  <div class="row mt-4 mx-5">

    <div class="col-9">

      <h1 class="Display-4">Productos</h1>

    </div>

    <div class="col-3 d-flex justify-content-center align-items-center">

      <button class="btn btn-primary mx-2">Filtrar</button>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar
      </button>


    </div>

  </div>

  <div class="row mt-4">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Producto</th>
                <th scope="col">Peso</th>
                <th scope="col">Precio</th>
                <th scope="col">Referencia</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoria</th>
                <th scope="col">Fecha Creacion</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody class="text-center">

              <?php
              $controllers->Read();
              ?>
            </tbody>
          </table>


        </div>



      </div>

      <!-- Content -->



      <!-- Footer -->

      <?php

      #js boostrap 5v
      echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

      require_once './base/view_footer.php'; ?>