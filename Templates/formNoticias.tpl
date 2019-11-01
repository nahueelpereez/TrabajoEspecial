{include 'Templates/header.tpl'}

<form action="nuevaNoticia" method="POST">

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

        <button type="submit" class="btn btn-primary">Guardar</button>

</form>

{include 'Templates/footer.tpl'}