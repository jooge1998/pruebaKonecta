<?php

class ControllerModels{


    public function Login(){
        include_once('./../Model/login.php');
        $login = new Login();
        $login->session_login();
    }

    #sessiones en el login por roles
    public function Sessiones(){
        include_once('./../Model/sessiones.php');
        $sesiones = new Sessiones();
        $sesiones->session();
    }

    public function Roles(){
        include_once('./../Model/sessiones.php');
        $sesiones = new Sessiones();
        $sesiones->roles();
    }


}

