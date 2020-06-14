<?php
/* Smarty version 3.1.36, created on 2020-06-14 20:05:50
  from 'C:\xampp\htdocs\proyecto\plantillas\frases.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee666fe00e287_79322241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15284f1ac3394be73bc12ce6d6951de3c5abf869' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto\\plantillas\\frases.tpl',
      1 => 1592147680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee666fe00e287_79322241 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>      
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>   
    <center><h1>"El Fraseador"</h1></center>
        <?php if ($_smarty_tpl->tpl_vars['alumno']->value !== null) {?>
        <span>Usuario: <?php echo $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getNombreUsuario();?>
 ha entrado en la cuenta del usuario: <?php echo $_smarty_tpl->tpl_vars['alumno']->value->getNombreUsuario();?>
 </span>
    <?php } elseif ($_smarty_tpl->tpl_vars['usuarioBD']->value !== null) {?>
        <span>Bienvenido usuario: <?php echo $_smarty_tpl->tpl_vars['usuarioBD']->value->getNombreUsuario();?>
</span>
    <?php } else { ?>
        <span>Bienvenido usuario: <?php echo $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getNombreUsuario();?>
</span>
    <?php }?>
    <hr />
    <?php if ($_smarty_tpl->tpl_vars['msj']->value !== null) {?>
        <span><?php echo $_smarty_tpl->tpl_vars['msj']->value;?>
</span>     
    <?php }?>
    <form id="frasesPHP" action="frases.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoFrase" placeholder="Escriba aquí"></textarea><br/>
            <?php if ($_smarty_tpl->tpl_vars['alumno']->value !== null) {?>
                <input type="hidden" name="alumno" value="<?php echo $_smarty_tpl->tpl_vars['alumno']->value->getNombreUsuario();?>
"/>
                <input type="hidden" name="profesor" value="<?php echo $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getNombreUsuario();?>
"/>
            <?php } elseif ($_smarty_tpl->tpl_vars['usuarioBD']->value !== null) {?>
                <input type="hidden" name="usuario" value="<?php echo $_smarty_tpl->tpl_vars['usuarioBD']->value->getNombreUsuario();?>
"/>
            <?php } else { ?>
                <input type="hidden" name="profesor" value="<?php echo $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getNombreUsuario();?>
"/>
            <?php }?>
            <input type="submit" name="submitFrases" value="Borrar" />
            <input type="submit" name="submitFrases" value="Modificar"/>
        </center>
        <hr />
        <br />
        <span id="msgResultado">Listado de Frases Favoritas: </span><br />
        <?php if ($_smarty_tpl->tpl_vars['frasesUser']->value !== null) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['frasesUser']->value, 'contenido', false, 'datosArray');
$_smarty_tpl->tpl_vars['contenido']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['datosArray']->value => $_smarty_tpl->tpl_vars['contenido']->value) {
$_smarty_tpl->tpl_vars['contenido']->do_else = false;
?>
                <div>
                    <p><input type="checkbox" name="frasesLista[]" value="<?php echo $_smarty_tpl->tpl_vars['contenido']->value->getFraseUsuario();?>
"> <?php echo ucfirst($_smarty_tpl->tpl_vars['contenido']->value->getFraseUsuario());?>
</p><br/>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contenido']->value->getPalabrasFrases(), 'contenidoFrases', false, 'numFrasesIndices');
$_smarty_tpl->tpl_vars['contenidoFrases']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['numFrasesIndices']->value => $_smarty_tpl->tpl_vars['contenidoFrases']->value) {
$_smarty_tpl->tpl_vars['contenidoFrases']->do_else = false;
?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['contenidoFrases']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['contenidoFrases']->value;?>
"/>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>        
    </form>
    <br />
    <form id="pictotraductorPHP" action="pictotraductor.php" method="POST">
        <?php if ($_smarty_tpl->tpl_vars['alumno']->value !== null) {?>
            <input type="hidden" name="alumno" value="<?php echo $_smarty_tpl->tpl_vars['alumno']->value->getNombreUsuario();?>
"/>
            <input type="hidden" name="profesor" value="<?php echo $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getNombreUsuario();?>
"/>
        <?php } elseif ($_smarty_tpl->tpl_vars['usuarioBD']->value !== null) {?>
            <input type="hidden" name="usuario" value="<?php echo $_smarty_tpl->tpl_vars['usuarioBD']->value->getNombreUsuario();?>
"/>
        <?php } else { ?>
            <input type="hidden" name="profesor" value="<?php echo $_smarty_tpl->tpl_vars['usuarioProfesor']->value->getNombreUsuario();?>
"/>
        <?php }?>
        <input type="submit" name="submitVolver" value="Volver"/>
    </form>
</body>
</html><?php }
}
