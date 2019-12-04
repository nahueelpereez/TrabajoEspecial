<?php

require_once('Models/noticiaModel.php');
require_once('Views/noticiaView.php');
require_once('AyudaLogin/autenticacion.php');

class NoticiasController{

    private $view;
    private $model;

    public function __construct(){
        $this->view = new NoticiaView();
        $this->model = new NoticiaModel();
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

     public function agregarNoticia(){
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
        header("Location: " . basehref);
    }

    public function eliminarNoticia($params = null) {
        
        $autenticador = new Autenticacion();
        $autenticador->checkLoggedIn();
        
        $idNoticia = $params[':ID'];
        $this->model->borrar($idNoticia);
        header("Location: " . basehref);
    }

    public function showForm(){
        
        $this->view->showForm();

    }

   public function editarNoticia(){
        $id_noticia = $_POST['id_noticia'];
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $descripcion = $_POST['descripcion'];

        if(!empty($titulo) && !empty($fecha) && !empty($descripcion)){
            $this->model->editar($titulo, $fecha, $descripcion);
            header("Location: " . basehref . noticias);
        }
    }
    
    public function showFormEditar($param = null){
        $idNoticia = $param[':ID'];
        $noticia = $this->model->getNoticia($idNoticia);
        
        $this->view->showFormEditar($noticia);
    }


}
