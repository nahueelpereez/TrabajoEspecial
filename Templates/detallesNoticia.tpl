{include 'Templates/header.tpl'}

<form action="obtenerNoticia" method="GET">
    <div class="container">    
        <h3>{$noticia->titulo}</h3><p>{$noticia->fecha}</p>
        <p>{$noticia->contenido|truncate:1000:"..."}</p>
    </div>
</form>

{include 'Templates/vue/comentariosVue.tpl'}

{include 'Templates/footer.tpl'}
