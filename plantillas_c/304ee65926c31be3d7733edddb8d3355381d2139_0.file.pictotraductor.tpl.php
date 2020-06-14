<?php
/* Smarty version 3.1.36, created on 2020-06-14 16:59:52
  from 'C:\xampp\htdocs\pruebaComposer\plantillas\pictotraductor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee63b68039792_98702222',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '304ee65926c31be3d7733edddb8d3355381d2139' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pruebaComposer\\plantillas\\pictotraductor.tpl',
      1 => 1592146783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee63b68039792_98702222 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php if ($_smarty_tpl->tpl_vars['msjInfo']->value !== null) {?>
        <span><?php echo $_smarty_tpl->tpl_vars['msjInfo']->value;?>
</span>
    <?php }?>
    <form id="pictoFrases" action="pictotraductor.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoTraducir" placeholder="Escriba aquí"></textarea>
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
            <input type="submit" name="submitPictotraductor" value="Traducir"/><br/>
            <input type="submit" name="submitPictotraductor" value="Añadir a Frases Favoritas" />
            <input type="submit" name="submitPictotraductor" value="Ir a Frases Favoritas" />   
            <input type="submit" name="submitPictotraductor" value="Volver" /></center>
    </form>
    <hr/>
    <span id="msgResultado">Resultado:</span>
    <?php if ($_smarty_tpl->tpl_vars['pictogramas']->value !== null) {?>
        <p><?php echo ucfirst($_smarty_tpl->tpl_vars['fraseUser']->value);?>
</p>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pictogramas']->value, 'contenido', false, 'datosArray');
$_smarty_tpl->tpl_vars['contenido']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['datosArray']->value => $_smarty_tpl->tpl_vars['contenido']->value) {
$_smarty_tpl->tpl_vars['contenido']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['contenido']->value !== null) {?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['contenido']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['contenido']->value;?>
"/>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
    <br />
</body>
</html><?php }
}
