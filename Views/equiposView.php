<?php
    require_once('libs/Smarty.class.php');

class EquipoView {

    private $smarty;

    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', basehref);
    }

    public function showEquipos($equipos) {
        $this->smarty->assign('titulo', 'Equipos');
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('Templates/equipos.tpl');
    }

    /**
     * Construye el html que permite visualizar el detalle de una tarea determinada.
     */
    public function mostrarEquipo($equipo) {
        $this->smarty->assign('titulo', 'Detalle de equipo');
        $this->smarty->assign('equipo', $equipo);

        $this->smarty->display('Templates/detallesEquipo.tpl');
    }

    public function mostrarError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

    public function showFormEquipo(){
        $this->smarty->assign('titulo', 'Agregar Equipo');
        $this->smarty->display('Templates/formEquipo.tpl');
    }

}