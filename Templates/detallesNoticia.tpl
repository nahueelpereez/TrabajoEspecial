{include 'Templates/header.tpl'}

<div class="container">

    <h1>{$noticia->titulo} </h1><p>({$noticia->fecha})</p>
    <p>{$noticia->descripcion|wordwrap:50:"<br/>\n"}</p>

</div>
{include 'Templates/footer.tpl'}