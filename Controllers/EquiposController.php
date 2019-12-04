<?php
require_once('Models/equiposModel.php');
require_once('Views/equiposView.php');
require_once('AyudaLogin/autenticacion.php');

class EquiposController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new EquiposModel();
        $this->view = new EquipoView();
    }

    /**
     * Muestra la lista de tareas.
     */
    public function obtenerEquipos() {

        // obtengo Equipos del model
        $equipos = $this->model->getEquipos();

        // se las paso a la vista
        $this->view->showEquipos($equipos);
    }

    public function showEquipos(){
        $this->view->showEquipos();
    }

    public function agregarEquipo() {

        $autenticador = new Autenticacion();
        $autenticador->checkLoggedIn();

        $nombre = $_POST['nombre'];
        $titulos = $_POST['titulos'];
        $descripcion = $_POST['descripcion'];
   
        if (!empty($nombre)  && !empty($titulos) && !empty($descripcion)) {
            $this->model->guardar($nombre, $titulos, $descripcion);
            header("Location: " . equipos);
            die();
        }
        else {
            $this->view->mostrarError("Faltan datos obligatorios");
        }
    }
    
    public function showForm(){
        $this->view->showFormEquipo();
    }
    
    public function eliminarEquipo($params = null) {

        $autenticador = new Autenticacion();
        $autenticador->checkLoggedIn();
        
        $idEquipo = $params[':ID'];
        $this->model->eliminar($idEquipo);
        header("Location: " . basehref . equipos);

    }

    public function showFormEditar($params = null){
        
        $idEquipo = $params[':ID'];
        $equipo = $this->model->get($idEquipo);
        $this->view->showFormEditarEquipo($equipo);

    }

    public function editarEquipo(){

        $autenticador = new Autenticacion();
        $autenticador->checkLoggedIn();
        
        if(isset($_POST['nombre']) && (isset($_POST['titulos'])) && (isset($_POST['descripcion'])) && (isset($_POST['id_equipo']))){
            $nombre = $_POST['nombre'];
            $titulos = $_POST['titulos'];
            $descripcion = $_POST['descripcion'];
            $id_equipo = $_POST['id_equipo'];
            $this->model->editarEquipo($nombre, $titulos, $descripcion, $id_equipo);
            header("Location: " . basehref . equipos);
        }
        else {
            $this->view->mostrarError("Faltan datos obligatorios");
        }
    }
}
    
