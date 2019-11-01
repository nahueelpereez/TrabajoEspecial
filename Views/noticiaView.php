<?php
    require_once('libs/Smarty.class.php');

class NoticiaView {

    private $smarty;

    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref',basehref);
    }

    public function mostrarNoticias($noticias) {
        $this->smarty->assign('titulo', 'Lista de noticias');
        $this->smarty->assign('noticias', $noticias);

        $this->smarty->display('Templates/noticias.tpl');
    }

    /**
     * Construye el html que permite visualizar el detalle de una tarea determinada.
     */
    public function mostrarNoticia($noticia) {
        $this->smarty->assign('titulo', 'Detalle de noticia');
        $this->smarty->assign('noticia', $noticia);

        $this->smarty->display('Templates/detallesNoticia.tpl');
    }

    public function mostrarError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

    public function showForm(){
        $this->smarty->assign('titulo', 'Agregar noticia');
        $this->smarty->display('Templates/formNoticias.tpl');
    }
}