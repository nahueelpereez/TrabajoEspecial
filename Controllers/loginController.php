<?php

require_once("Models/loginModel.php");
require_once("Views/loginView.php");
require_once("AyudaLogin/autenticacion.php");

class LoginController{

    private $view;
    private $model;
    private $autenticador;

    public function __construct() {
        $this->view = new LoginView();
        $this->model = new UsuarioModel();
        $this->autenticador = new Autenticacion();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function verificarUsuario(){
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];

        $usuario = $this->model->getByUsername($email);

        var_dump($usuario);
        // encontró un usuario con el email que mandó, y tiene la misma contraseña
        if (!empty($usuario) && password_verify($contraseña, $usuario->contraseña)) {
            $this->autenticador->login($usuario);
            header('Location: '. basehref);
        } 
        else {
            $this->view->showLogin("Login incorrecto");
        }
    }

    public function logout() {
        $this->autenticador->logout();
        header('Location: ' . LOGIN);
    }
	
	public function getUsuarios(){
    if($this->autenticador->isAdmin()){
         // obtengo Equipos del model
         $usuarios = $this->model->getusuarios();
         $this->view->showUsuarios($usuarios);
     }else{
        $this->autenticador->checkadmin();

     }
    }
	
     public function AsignarAdmin($params = null){
        $id = $params[':ID'];
        $this->model->AsignarAdmin($id);
        
        }
	
    public function NuevoUsuario(){
        
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        
        if (!empty($email)  && !empty($contraseña)) {
            $hash = password_hash($contraseña, PASSWORD_DEFAULT);
            $this->model->guardarUsuario($email, $hash);
            header("Location: " . noticias);
            die();
        }
        else {
            $this->view->mostrarError("Faltan datos obligatorios");
        }
    }
	
    public function showRegistro() {
        $this->view->showRegistro();
    }


}
