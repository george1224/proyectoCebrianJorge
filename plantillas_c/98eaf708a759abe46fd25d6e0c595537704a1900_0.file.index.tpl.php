<?php
/* Smarty version 3.1.36, created on 2020-06-14 19:17:49
  from 'C:\xampp\htdocs\proyecto\plantillas\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee65bbd1500d3_12300667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98eaf708a759abe46fd25d6e0c595537704a1900' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto\\plantillas\\index.tpl',
      1 => 1592147680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee65bbd1500d3_12300667 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>  
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div>
            <center><h1>Bienvenidos a "El Fraseador"</h1></center>
            <hr />
            <?php if ($_smarty_tpl->tpl_vars['errorInicioSesion']->value !== null) {?>
                <span><?php echo $_smarty_tpl->tpl_vars['errorInicioSesion']->value;?>
</span>
            <?php } elseif ($_smarty_tpl->tpl_vars['msjInfo']->value !== null) {?>
                <span><?php echo $_smarty_tpl->tpl_vars['msjInfo']->value;?>
</span>
            <?php }?>
            <form action="index.php" method="POST">
                <fieldset id="fieldIndex">
                    <legend>Login</legend>
                    <span>Usuario:</span> <input type="text" name="name" placeholder="Introduzca datos..."/><br/>
                    <span>Contraseña:</span> <input type="text" name="pass" placeholder="Introduzca datos..."/><br/>
                    <input type="submit" name="login" value="Iniciar sesion" />       
                    &nbsp;&nbsp;<input type="submit" name="create" value="Crear usuario" />
                </fieldset>
            </form>
            <!--<h3>$mi_error}</h3>-->
        </div>
    </body>
</html><?php }
}
