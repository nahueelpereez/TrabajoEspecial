<?php
/* Smarty version 3.1.33, created on 2019-11-01 04:15:33
  from 'C:\xampp\htdocs\trabajoweb2\Templates\equipos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbba355767d64_11235435',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34acfe3a79c426d6c3dff0a87a3388cfd8c37765' => 
    array (
      0 => 'C:\\xampp\\htdocs\\trabajoweb2\\Templates\\equipos.tpl',
      1 => 1572578130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Templates/header.tpl' => 1,
    'file:Templates/footer.tpl' => 1,
  ),
),false)) {
function content_5dbba355767d64_11235435 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\trabajoweb2\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->_subTemplateRender('file:Templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipos']->value, 'equipo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['equipo']->value) {
?>
    <form action="equipos/<?php echo $_smarty_tpl->tpl_vars['equipo']->value->id_equipo;?>
" method="GET">
    <tbody>
        <tr>
            <th scope="row"><?php echo $_smarty_tpl->tpl_vars['equipo']->value->nombre;?>
</th>
            <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value->titulos;?>
</td>
            <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['equipo']->value->descripcion,1000,"...");?>
</td>
            <td><button type="sumbit" class="btn btn-secondary">Editar</button></td>
            <td><button type="sumbit" class="btn btn-danger">Eliminar</button></td>
        </tr>
    </form>
    </tbody>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>


<?php $_smarty_tpl->_subTemplateRender('file:Templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
