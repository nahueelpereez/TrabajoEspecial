{include 'Templates/header.tpl'}

<h1>Noticias Actuales</h1>

<p>Enterate las noticias de tus equipos favoritos en nuestra pagina web y mantenete al tanto de todo lo nuevo que
ocurre en el mundo del futbol registrandote en nuestra pagina.</p>
<p>Indaga y enterate de curiosidades sobre tu equipo favorito</p>


<ul class="list-group mt-4">
    {foreach $noticias as $noticia}
    <form action="noticias/{$noticia->id_notica}" method="GET">
        <li class="list-group-item">
        <h3>{$noticia->titulo}</h3> | {$noticia->fecha}
        {$noticia->contenido|truncate:1000:"..."} 
        <button type="sumbit" class="btn btn-secondary">EDITAR</button>
        <button type="sumbit" class="btn btn-danger">ELIMINAR</button></li>
    </form>
    {/foreach}
</ul>

{include 'Templates/footer.tpl'}
