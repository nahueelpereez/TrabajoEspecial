{literal}

<section id="template-vue-comentarios">
    
    <h5>Comentarios</h5>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Puntuacion</th>
                </tr>
            </thead>
            <tbody v-for="comentario in comentarios">
                <tr>
                    <th scope="row" name="usuario">{{comentario.usuario}}</th>
                    <td name="contenido">{{comentario.contenido}}</td>
                    <td name="puntuacion">{{comentario.puntuacion}}</td>
                    <td><button type="submit" class="btn btn-danger"><a :data-id="comentarios.id" class="btn-eliminar" href="detallesNoticia">eliminar</a></button>
                    <button type="submit" class="btn btn-primary"><a :data-id="comentarios.id" class="btn-completar" href="detallesNoticia">completar</a></button></td>
                </tr>
            </tbody>
        </table>
        
</section>

<section>

    <h3>Nuevo comentario</h3>
    <form id="form-comentarios" action="comentarios" method="POST">
        <input type="text" name="usuario" placeholder="usuario">
        <input type="text" name="contenido" placeholder="contenido">
        <input type="number" name="puntuacion" placeholder="puntuacion" max="5">
        <input type="submit" value="Insertar">
    </form>

</section>

{/literal}