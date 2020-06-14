<?php
/* Smarty version 3.1.36, created on 2020-06-14 19:18:08
  from 'C:\xampp\htdocs\proyecto\plantillas\profesorSesion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee65bd0e80e44_21869543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbb652378e750edf8a54f0183ab044a3140f2df2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto\\plantillas\\profesorSesion.tpl',
      1 => 1592147680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee65bd0e80e44_21869543 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>      
  <link rel="stylesheet" href="./style.css">
    </head>
    <body>   
    <center><h1>"El Fraseador"</h1></center>
        <?php if ($_smarty_tpl->tpl_vars['usuarioProfesor']->value !== null) {?>
        <span>Bienvenido usuario: <?php echo $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getNombreUsuario();?>
</span>
    <?php }?>
    <hr />
    <center><table border=1>
            <tr><th colspan="3">Listado de alumnos del profesor: <?php echo $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getNombreUsuario();?>
</th></tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getListadoAlumnos(), 'contenido', false, 'alumnos');
$_smarty_tpl->tpl_vars['contenido']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['alumnos']->value => $_smarty_tpl->tpl_vars['contenido']->value) {
$_smarty_tpl->tpl_vars['contenido']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['contenido']->value['NombreUsuario'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['contenido']->value['PassUsuario'];?>
</td>
                    <td>
                        <form action="profesorSesion.php" method="POST">
                            <input type="hidden" name="alumnoName" value="<?php echo $_smarty_tpl->tpl_vars['contenido']->value['NombreUsuario'];?>
"/>
                            <input type="hidden" name="alumnoPass" value="<?php echo $_smarty_tpl->tpl_vars['contenido']->value['PassUsuario'];?>
"/>
                            <input type="submit" name="submitCuenta" value="Acceder a cuenta"/>
                        </form>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table></center>
    <form id="pictotraductorProfe" action="profesorSesion.php" method="POST">
        <input type="submit" name="submitPictotraductor" value="Cerrar sesion"/>
        <input type="submit" name="submitPictotraductor" value="Ir al Pictotraductor"/>
    </form>
</body>
</html><?php }
}
