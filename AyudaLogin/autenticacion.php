<?php

class Autenticacion{

    public function __construct(){}

    public function login($user){
        //Inicio sesion y loggeo al usuario.
        session_start();
        $_SESSION["id_usuario"] = $user->id_usuario;
        $_SESSION["email"] = $user->email;
    }

    public function logout(){
        session_start();
        session_destroy();
    }

    public function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["id_usuario"])){
            header('Location: ' . login);
            die();
        }
    }

    public function getLoggedUserName(){
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['email'];
    }
}
