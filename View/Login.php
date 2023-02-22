
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Proyecto Final Ingeria Software</title>

     <!-- Estilos -->
    <style>
      body{
          background-color: #F7FAFC;
      }

      .container {
          width: 50% !important;
          height: 80vh;
          background-color: #FFFFFF;
          border-radius: 0.9rem;
      }
    </style>

  </head>
  <body>

    <div class="container mt-5 d-flex justify-content-center align-items-center text-center">

        <form action="" method="POST" enctype="multipart/form-data">

        <?php

          include_once './../Controllers/controllersModel.php';
          $controllers = new ControllerModels();
          $controllers->Login();


        ?>
            <h4 class="mb-3 ">LOGIN</h4>

            <input class="form-control mb-3" type="text" name="username" placeholder="Usuario" required>

            <input class="form-control mb-3" type="password" name="password" placeholder="Contraseña" required>

            <input class="btn btn-primary mb-3" name="btn" type="submit" value="Acceder" id="submit" > 

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>