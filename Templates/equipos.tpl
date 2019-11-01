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
    <form action="equipos/{$equipo->id_equipo}" method="GET">
    <tbody>
        <tr>
            <th scope="row">{$equipo->nombre}</th>
            <td>{$equipo->titulos}</td>
            <td>{$equipo->descripcion|truncate:1000:"..."}</td>
            <td><button type="sumbit" class="btn btn-secondary">Editar</button></td>
            <td><button type="sumbit" class="btn btn-danger">Eliminar</button></td>
        </tr>
    </form>
    </tbody>
    {/foreach}
</table>


{include 'Templates/footer.tpl'}