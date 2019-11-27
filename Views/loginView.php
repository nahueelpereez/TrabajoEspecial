<?php
require_once('libs/Smarty.class.php');

class LoginView{

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', basehref );
    }

    public function showLogin($error = null) {
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->assign('error', $error);
        $this->smarty->display('Templates/login.tpl');
    }
    
    public function ShowRegistro($error = null){
        $this->smarty->assign('titulo', 'Registrarse');
        $this->smarty->assign('error', $error);
        $this->smarty->display('Templates/formRegistro.tpl');
    }


}
