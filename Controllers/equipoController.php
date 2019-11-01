<?php
require_once('Models/equiposModel.php');
require_once('Views/equiposView.php');

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

public function obtenerEquipo($params = null){
    $idEquipo = $params[':ID'];
    $equipo = $this->model->get($idEquipo);

    if ($equipo) // si existe la tarea
        $this->view->mostrarEquipo($equipo);
    else
        $this->view->mostrarError('El equipo no existe');
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
        header("Location: " . equipos);

    }
}
    
