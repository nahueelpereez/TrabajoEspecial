{include 'Templates/header.tpl'}

<form action="nuevaNoticia" method="POST"  enctype="multipart/form-data">

        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <h5>Título</h5>
                    <input name="titulo" type="text" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <h5>Fecha</h5>
                    <input name="fecha" type="date" class="form-group">
                </div>
            </div>
        </div>
        <div class="form-group">
            <h5>Descripcion</h5>
            <input name="contenido" class="form-control" rows="3"></input>
        </div>
        <h5>Equipos</h5>
        <select name="equipo">
                {foreach from=$noticias item=noticia}
                    <option value="{$noticia->id_equipo}">{$noticia->nombre}</option>
                {/foreach}
        </select>
        <div class="form-group">
            <h5>Imagen</h5>
            <input name="imagen" type="file" class="form-control" >
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>
</form>

{include 'Templates/footer.tpl'}
