<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{$basehref}">    

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FutArg</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="js/comentarios.js"></script>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <a href="noticias"><img src="imagenes/logoFutArg.png" width="150" height="35" alt="" href="noticias"></a>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="noticias"><button type="button" class="btn btn-info">Noticias</button><span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="equipos"><button type="button" class="btn btn-info">Equipos</button></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="mostrarFormNoticia"><button type="button" class="btn btn-info">Agregar noticia</button><span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="mostrarFormEquipo"><button type="button" class="btn btn-info">Agregar equipo</button><span
                class="sr-only">(current)</span></a>
          </li>
          {if !isset($smarty.session.id_usuario) }
          <li class="nav-item">
            <a class="nav-link" href="login"><button type="button"
                class="btn btn-primary">Inicia Sesion</button></a>
          </li>
          {/if}
          {if isset($smarty.session.id_usuario) }
          <li class="nav-item active">
            <a class="nav-link" href="logout"><button type="button" class="btn btn-info">Salir</button><span
            class="sr-only">(current)</span></a>
          </li>
          {/if}
          {if isset($smarty.session.id_usuario) }
          <li class="nav-item active">
            <a class="nav-link" href="mostrarAdministradores"><button type="button" class="btn btn-info">Administradores</button><span
            class="sr-only">(current)</span></a>
          </li>
          {/if}
        </ul>
      </div>
    </nav>
  </header>
