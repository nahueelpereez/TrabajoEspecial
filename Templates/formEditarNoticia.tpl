{if isset($smarty.session.id_usuario) }

<h3>{$titulo1}</h3>

<form action="editarNoticia" method="POST">
    <ul class="list-group mt-4">
            <li class="list-group-item">
                <label>Titulo</label>
                <input name="titulo" type="text" class="form-control" value="{$noticia->titulo}"
                <label>Fecha</label>
                <input name="fecha" type="date" class="form-control" value="{$noticia->fecha}"
                <label>Contenido</label>
                <input name="contenido" type="text" class="form-control" value="{$noticia->contenido|truncate:1000:"..."}"
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                {foreach $noticias $noticia}
                    <a class="dropdown-item">{$noticia->nombre_equipo}</a>
                {/foreach}
                </div>
            </div>
            </li>
    </ul>
    <a href="editar/{$noticia->id_notica}" type="submit" class="btn  btn-secondary text-black btnEditar">EDITAR</a>
</form>

{/if}
