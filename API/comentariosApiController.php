<?php
require_once('Models/comentariosModel.php');
rquier_once('JSONView.js');

class comentariosController{

    private $model;
    private $view;

    public function construct(){
        $this->model = new comentariosModel();
        $this->view = new JSONView();
    }

    public function obtenerComentarios(){
        $comentarios = $this->model->obtenerComentarios();
        $this->view->response($comentarios, 200);
    }

    public function obtenerComentario($params = null){
        $id = $params[':ID'];

        $comentario = $this->model->obtenerComentario($id);

        if($comentario){
            $this->view->response($comentario, 200);
        }
        else{
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }
    }

    public function eliminar($params = []) {
        $idComentario = $params[':ID'];
        $comentario = $this->model->GetTarea($idComentario);

        if ($comentario) {
            $this->model->Borrar($idComentario);
            $this->view->response("Comentario id=$idComentario eliminado con éxito", 200);
        }
        else {
            $this->view->response("Comentario id=$idComentario not found", 404);
        }
    }

    public function agregarComentario(){
        $contenido = $_POST['contenido'];
        $puntuacion = $_POST['puntuacion'];
        $usuario = $_POST['usuario'];

        if(!empty($contenido) && !empty($puntuacion) && !empty($usuario)){
            $this->model->guardar($contenido, $puntuacion, $usuario);
        }
        else{
            $this->view->response("Faltan completar campos obligatorios");
        }
    }    

}
