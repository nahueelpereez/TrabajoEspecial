{include 'Templates/header.tpl'}

<form action="obtenerNoticia" method="GET">
    <div class="container">    
        <h3>{$noticia->titulo}</h3><p>{$noticia->fecha}</p>
        <p>{$noticia->contenido|truncate:1000:"..."}</p>
    </div>
</form>

{include 'Templates/vue/comentariosVue.tpl'}

<section>

    <h3>Nuevo comentario</h3>
    <form id="form-comentarios" method="POST">
        <input type="text" name="usuario"  id="columna" placeholder="usuario">
        <input type="text" name="contenido" id="columna1" placeholder="contenido">
        <input type="number" name="puntuacion" id="columna2" placeholder="puntuacion" max="5">
        <button class="btn btn-primary" id="boton1" type="button" >Agregar</button>
    </form>

</section>
{include 'Templates/footer.tpl'}
