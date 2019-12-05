{include 'Templates/header.tpl'}

<h1>Noticias Actuales</h1>

<p>Enterate las noticias de tus equipos favoritos en nuestra pagina web y mantenete al tanto de todo lo nuevo que
ocurre en el mundo del futbol registrandote en nuestra pagina.</p>
<p>Indaga y enterate de curiosidades sobre tu equipo favorito</p>


<ul class="list-group mt-4">
    {foreach $noticias as $noticia}
        <li class="list-group-item">
        <h3>{$noticia->titulo}</h3> | {$noticia->fecha}
        {$noticia->contenido|truncate:1000:"..."}
        <h5>{$noticia->nombre_equipo}</h5>
        {if isset($smarty.session.id_usuario) }
        <a href="formEditarNoticia/{$noticia->id_notica}" class="btn  btn-secondary text-black btnEditar">EDITAR</a>
        <a href="noticias/{$noticia->id_notica}" class="btn  btn-secondary text-black btnVer">VER</a>
        <a href="eliminarNoticia/{$noticia->id_notica}" type="submit" class="btn  btn-danger text-black btnEliminar">ELIMINAR</a></li>
        {/if}
    {/foreach}
</ul>

{include 'Templates/footer.tpl'}

