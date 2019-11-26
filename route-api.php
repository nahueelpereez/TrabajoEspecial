<?php

//creo el router
$r = new apiRouter();

//tabla de ruteo
$r->addRoute("comentarios", "GET", "comentariosController", "obtenerComentarioss");

$r->addRoutew("comentario", "GET", "comentariosController", "obtenerComentario");

$r->addRoute("borrarComentario", "DELETE", "comentariosController", "borrar");

$r->addRoute("formAgregar", "GET", "comentariosController", "mostrarForm");
$r->addRoute("agregarComentario", "POST", "comentariosController", "agregarComentario");




// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
