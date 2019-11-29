{literal}

<section id="template-vue-comentarios">
    
    <h3>Comentarios</h3>
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
                    <td>
                        <button type="submit" class="btn btn-danger" id="botonBorrar">
                            eliminar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        
</section>
{/literal}
