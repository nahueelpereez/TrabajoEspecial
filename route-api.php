<?php

//creo el router
$r = new apiRouter();

//tabla de ruteo
$r->addRoute("comentarios", "GET", "comentariosController", "obtenerComentarioss");

$r->addRoute("comentarios/:ID", "DELETE", "comentariosController", "borrar");

$r->addRoute("comentarios", "POST", "comentariosController", "agregarComentario");




// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
