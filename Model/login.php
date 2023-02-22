
<?php

include_once './../Controllers/controllersView.php';
include_once './../db/database.php';


class Login extends DATABASE
{

    private $Controllers;

    function __construct()
    {
        $this->Controllers = new ControllerViews();
    }


    function session_login()
    {

        #inicia una session o reanuda la existente
        session_start();

        #verifica si existe alguna session
        if (isset($_SESSION['rol'])) {
            switch ($_SESSION['rol']) {
                    #si la session tiene el valor de 1 envia a la vista Admin
                case 1:
                    $this->Controllers->Dashboard();
                    break;
                    #si la session tiene el valor de 2 envia a la vista Empleado
                case 2:
                    $this->Controllers->Dashboard();
                    break;
            }
        } else {
            $this->recibe_Datos();
        }
    }

    function recibe_Datos()
    {

        #valida el usuario y la contraseña
        if (isset($_POST['username']) && isset($_POST['password'])) {

            #verifica si existe un registro con ese usuario y contraseña
            if ($this->verificar_User()) {
                echo "
                <div class='alert alert-danger' role='alert'>
                Nombre de usuario o contraseña correcto
                </div> ";

                #guarda el contenido de la fila 4 de la base de datos en la variable rol, empezando de 0
                #crea una session con el paramatro rol 
                $_SESSION['rol'] = $this->verificar_User()[4];
                #crea una session con el paramatro user 
                $_SESSION['user'] = $this->verificar_User()[1];

                #verifica el rol del usuario logeado
                switch ($_SESSION['rol']) {
                        #admin
                    case 1:
                        $this->Controllers->Dashboard();
                        break;
                        #empleado
                    case 2:
                        $this->Controllers->Dashboard();
                        break;
                }
            } else {
                // no existe el usuario
                echo "
        <div class='alert alert-danger' role='alert'>
        Nombre de usuario o contraseña incorrecto
        </div> ";
            }
        }
    }


    // verifica que los datos del login se encuentren en la bd
    function verificar_User()
    {

        #instancia la clase database
        $db = new Database();

        #realiza la consulta a la base de datos
        $query = $db->getConnection()->prepare('SELECT *FROM usuario WHERE USUARIO = ? AND CONTRASEÑA = ?');

        $query->execute([
            $_POST['username'],
            $_POST['password']
        ]);

        #ejecuta la consulta
        $row = $query->fetch(PDO::FETCH_NUM);

        #devuelve el registro que coincida con la consulta
        return $row;
    }
}
