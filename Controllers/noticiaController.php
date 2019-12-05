<?php

require_once('Models/noticiaModel.php');
require_once('Views/noticiaView.php');
require_once('AyudaLogin/autenticacion.php');
require_once('Models/equiposModel.php');

class NoticiasController{

    private $view;
    private $model;

    public function __construct(){
        $this->view = new NoticiaView();
        $this->model = new NoticiaModel();
        $this->modelE = new EquiposModel();
    }


    public function obtenerNoticias(){
        session_start();
        $noticias = $this->model->obtenerNombreEquipo();

        $this->view->mostrarNoticias($noticias);
    }

     public function obtenerNoticia($params = null) {
        
        $idNoticia = $params[':ID'];
        $noticia = $this->model->getNoticia($idNoticia);

        if ($noticia){ // si existe la noticia
            $this->view->mostrarNoticia($noticia);
        }else
            $this->view->mostrarError('La noticia no existe');
    }

    public function agregarNoticia() {
        $autenticador = new Autenticacion();
        $autenticador->checkLoggedIn();
         // agarra el file
         if ($_FILES['imagen']['name']) {
            if ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/png") {
                
                $this->model->guardar($_POST['titulo'], $_POST['fecha'], $_POST['contenido'], $_POST['equipo'], $_FILES['imagen']);
            }
            else {
                $this->view->showError("Formato no aceptado");
                die();
            }
        }
        else {
            $this->model->guardar($_POST['titulo'], $_POST['fecha'], $_POST['contenido'], $_POST['equipo']);  
        }
        header("Location: " . basehref . noticias);
    }

    public function eliminarNoticia($params = null) {
        
        $autenticador = new Autenticacion();
        $autenticador->checkLoggedIn();
        
        $idNoticia = $params[':ID'];
        $this->model->borrar($idNoticia);
        header("Location: " . basehref . noticias);
    }

    public function showForm(){
        session_start();
        $noticias = $this->modelE->getEquipos();
        $this->view->showForm($noticias);

    }

   public function editarNoticia(){
    if(isset($_POST['titulo']) && (isset($_POST['fecha'])) && (isset($_POST['contenido'])) && (isset($_POST['equipo'])) && (isset($_POST['id_notica']))){
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $contenido = $_POST['contenido'];
        $idEquipo = $_POST['equipo'];
        $id_noticia = $_POST['id_notica'];
        $imagen = $_FILES['imagen'];
        $this->model->editarNoticia($titulo, $fecha, $contenido, $idEquipo, $imagen, $id_noticia);
        header("Location: " . basehref . noticias);
    }
    else {
        $this->view->mostrarError("Faltan datos obligatorios");
    }
}

    public function showFormEditar($params = null){
        
        $idNoticia = $params[':ID'];
        $noticia = $this->model->getNoticia($idNoticia);
        $noticias = $this->modelE->getEquipos();
        $this->view->showFormEditar($noticia, $noticias);   
    }  
    
}
