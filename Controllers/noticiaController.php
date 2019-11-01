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
        $noticias = $this->model->getNoticias();

        $this->view->mostrarNoticias($noticias);
    }

    public function obtenerNoticia($params = null) {
        
        $idNoticia = $params[':ID'];
        $noticia = $this->model->getNoticia($idNoticia);

        if ($noticia) // si existe la noticia
            $this->view->mostrarNoticia($noticia);
        else
            $this->view->mostrarError('La noticia no existe');
    }

    public function agregarNoticia() {
        $autenticador = new Autenticacion();
        $autenticador->checkLoggedIn();
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $descripcion = $_POST['descripcion'];
   
        if (!empty($titulo)  && !empty($fecha) && !empty($descripcion)) {
            $this->model->guardar($titulo, $fecha, $descripcion);
            header("Location: " . VER);
            die();
        }
        else {
            $this->view->mostrarError("Faltan datos obligatorios");
        }
    }

    public function eliminarNoticia($params = null) {
        $idNoticia = $params[':ID'];
        $this->model->borrar($idNoticia);
        header("Location: " . noticias);
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
            $this->model->editarNoticia($titulo, $fecha, $descripcion);
            header("Location" . basehref . "editarNoticia");
        }
    }


}
