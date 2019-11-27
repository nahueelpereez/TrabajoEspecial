{include 'Templates/header.tpl'}

<form action="nuevaUsuario" method="POST" enctype="multipart/form-data>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduzca su Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include 'Templates/footer.tpl'}