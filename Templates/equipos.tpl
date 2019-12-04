{include 'Templates/header.tpl'}

<h1>Equipos Disponibles</h1>


<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Equipos</th>
            <th scope="col">Titulos</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    {foreach $equipos as $equipo}
    <tbody>
        <tr>
            <th scope="row">{$equipo->nombre}</th>
            <td>{$equipo->titulos}</td>
            <td>{$equipo->descripcion|truncate:1000:"..."}</td>
            <td><a class="btn btn-secondary" href="formEditarEquipo/{$equipo->id_equipo}">Editar</a></td>
            <td><a type="sumbit" class="btn btn-danger" href="eliminarEquipo/{$equipo->id_equipo}">Eliminar</a></td>
        </tr>
    </tbody>
    {/foreach}
</table>


{include 'Templates/footer.tpl'}
