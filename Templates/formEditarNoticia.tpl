{include 'Templates/header.tpl'}

<h3>{$titulo1}</h3>

<form action="editarNoticia/{$noticia->id_notica}" method="POST">
<div class="row">
            <div class="col-9">
                <div class="form-group">
                    <h5>Título</h5>
                    <input name="titulo" type="text" class="form-control" value="{$noticia->titulo}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <h5>Fecha</h5>
                    <input name="fecha" type="date" class="form-control" value="{$noticia->fecha}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <h5>Descripcion</h5>
            <input name="contenido" type="text" class="form-control" value="{$noticia->contenido|truncate:1000:"..."}">
        </div>
        <h5>Equipos</h5>
        <select name="equipo">
                {foreach from=$noticias item=noticia}
                    <option value="{$noticia->id_equipo}">{$noticia->nombre}</option>
                {/foreach}
        </select>
            <input class="form-control" hidden type="text" name="id_notica" value="{$noticia->id_notica}>
        <div class="form-group">
            <h5>Imagen</h5>
            <input name="imagen" type="file" class="form-control" value="{$noticia->imagen}>
        </div>
        <div class="form-group">   
        <button type="submit" class="btn  btn-secondary text-black btnEditar">EDITAR</button>
        </div>
</form>


{include 'Templates/footer.tpl'}
