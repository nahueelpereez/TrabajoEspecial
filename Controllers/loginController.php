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
        $password = $_POST['password'];

        $usuario = $this->model->getByUsername($email);

        var_dump($usuario);
        // encontró un usuario con el email que mandó, y tiene la misma contraseña
        if (!empty($usuario) && password_verify($password, $usuario->password)) {
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
	
    public function NuevoUsuario(){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if (!empty($email)  && !empty($password)) {
            $this->model->guardarUsuario($email, $password);
            header("Location: " . noticias);
            die();
        }
        else {
            $this->view->mostrarError("Faltan datos obligatorios");
        }
    }

    public function register() {
        //var_dump($_POST['user']);
        $hash = password_hash($_GET['pass'], PASSWORD_DEFAULT);
	    echo "Hash:" . $hash;
    }
	
    public function showRegistro() {
        $this->view->showRegistro();
    }


}
