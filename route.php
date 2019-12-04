<?php
    require_once('Controllers/EquiposController.php');
    require_once('Controllers/noticiaController.php');
    require_once('Controllers/loginController.php');
    require_once('router.php');
    
    // CONSTANTES PARA RUTEO
    define("basehref", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", basehref . 'login');
   // define("VER", basehref . 'ver');

    $r = new router();

    // rutas
    $r->addRoute("equipos", "GET", "EquiposController", "obtenerEquipos");
    $r->addRoute("noticias", "GET", "NoticiasController", "obtenerNoticias");

    $r->addRoute("equipo/:ID", "GET", "EquiposController", "obtenerEquipo");
    $r->addRoute("noticias/:ID", "GET", "NoticiasController", "obtenerNoticia");

    $r->addRoute("eliminarNoticia/:ID", "GET", "NoticiasController", "eliminarNoticia");
    $r->addRoute("eliminarEquipo/:ID", "GET", "EquiposController", "eliminarEquipo");

    
    $r->addRoute("equipos", "GET", "EquiposController", "ShowEquipos");
    $r->addRoute("editarNoticia/:ID", "POST", "NoticiasController", "editarNoticia");
    $r->addRoute("editarEquipo/:ID", "POST", "EquiposController", "editarEquipo");
    
    $r->addRoute("deleteUsuario/:ID", "GET", "LoginController", "borrarusuario");

    
    $r->addRoute("mostrarAdministradores", "GET", "LoginController", "showAdministradores");
    $r->addRoute("mostrarFormEquipo", "GET", "EquiposController", "showForm");
    $r->addRoute("formEditarEquipo/:ID", "GET", "EquiposController", "showFormEditar");
    $r->addRoute("mostrarFormNoticia", "GET", "NoticiasController", "showForm");
    $r->addRoute("mostrarFormRegistro", "GET", "LoginController", "showRegistro");
    $r->addRoute("nuevaNoticia", "POST", "NoticiasController", "agregarNoticia");
    $r->addRoute("nuevoEquipo", "POST", "EquiposController", "agregarEquipo");
    $r->addRoute("nuevoUsuario", "POST", "LoginController", "NuevoUsuario");

    $r->addRoute("login", "GET", "LoginController", "showLogin");
    $r->addRoute("verificar", "POST", "LoginController", "verificarUsuario");
    $r->addRoute("logout", "GET", "LoginController", "logout");

    //Ruta por defecto.
    $r->setDefaultRoute("NoticiasController", "obtenerNoticias");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
