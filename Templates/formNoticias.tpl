{include 'Templates/header.tpl'}

<form action="nuevaNoticia" method="POST" enctype="multipart/form-data>

        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Título</label>
                    <input name="titulo" type="text" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Fecha</label>
                    <input name="fecha" type="date" class="form-group">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="descripcion" class="form-control" rows="3"></textarea>
        </div>
        <h5>Equipo</h5>
        <div class="btn-group">
            <button name="nombre_equipo" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Equipos
            </button>
            <div class="dropdown-menu">
                {foreach $noticias $noticia}
                    <li>{$noticia->nombre_equipo}</li>
                {/foreach}
            </div>
        </div>
        <div class="form-group">
            <h5>Imagen</h5>
            <input name="imagen" type="file" class="form-control" >
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>

</form>

{include 'Templates/footer.tpl'}
