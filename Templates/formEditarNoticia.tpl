{include 'Templates/headerAdmin.tpl'}

<form action="editarNoticia" method="POST">

    <ul class="list-group mt-4">
            <li class="noticia list-group-item">
                <label>Titulo</label>
                <input type="text" class="form-control" {$noticia->titulo}
                <label>Fecha</label>
                <input type="date" class="form-control" {$noticia->fecha}
                <label>Contenido</label>
                <input type="text" class="form-control" {$noticia->Contenido|truncate:1000:"..."}
            </li>
    </ul>

</form>

{include 'Templates/footer.tpl'}