<?php

class Sessiones{


    public function session(){

        session_start();

        if($_SESSION['rol'] == 1){
            $this->Admin();
        }else{
            $this->Usuario();
            
        }

    }

    public function Admin(){
        if(isset($_GET['cerrar_session'])){
            session_unset(); 
        
            // destroy the session 
            session_destroy(); 
        }

        if(!isset($_SESSION['rol'])){
            header('location: ./../index.php');
        }else{
            if($_SESSION['rol'] != 1){
                header('location: ./../index.php');
            }
        }

    }

    public function Usuario(){
        if(isset($_GET['cerrar_session'])){
            session_unset(); 
            session_destroy(); 
        }
        
        if(!isset($_SESSION['rol'])){
            header('location: ./../index.php');
        }else{
            if($_SESSION['rol'] != 2){
                header('location: ./../index.php');
            }
        }

    }


    public function roles(){
          #verifica el rol del usuario 
          $user = $_SESSION['rol'] == 1 ? "Admin": "Empleado" ;
          #imprime nomnre de usuario y su rol
          echo $_SESSION['user'] ."</br>" . $user;
    }









}