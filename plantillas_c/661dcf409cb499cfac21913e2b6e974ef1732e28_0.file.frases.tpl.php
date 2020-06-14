<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-07 21:42:59
  from 'C:\xampp\htdocs\Pictotraductor\plantillas\frases.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edd43435d9d98_78565536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '661dcf409cb499cfac21913e2b6e974ef1732e28' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Pictotraductor\\plantillas\\frases.tpl',
      1 => 1591558802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edd43435d9d98_78565536 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>      
        <style>
            img {
                width: 100px;
                height: 100px;
                margin-left: 10px;
                float: left;
            }
            html{
                min-height: 100%;
            }
            body{
                background-image: url("./imagenesFondo/espacio.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                align-items: center;
            }
            textarea{
                display:inline-block;
                padding-right: 100px;
            }
            #frasesPHP input[type="submit"]{
                display:inline-block;
            }
            h1{
                font-family: Verdana;
                color: #F416FF;
                font-style: italic
            }
            #msj, span, label{
                color: white;
            }
            #user{
                float: right;
            }
            #pictotraductorPHP input[type="submit"]{
                position: absolute;
                bottom: 50px;
                right: 0px;
            }
        </style>
    </head>
    <body>   
    <center><h1>"El Fraseador"</h1></center>
        <?php if ($_smarty_tpl->tpl_vars['user']->value !== null) {?>
        <span>Usuario: <?php echo $_smarty_tpl->tpl_vars['user']->value->getNombreUsuario();?>
</span>     
    <?php }?>
    <hr />
    <?php if ($_smarty_tpl->tpl_vars['msj']->value !== null) {?>
        <span><?php echo $_smarty_tpl->tpl_vars['msj']->value;?>
</span>     
    <?php }?>
    <form id="frasesPHP" action="frases.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoFrase" placeholder="Escriba aquí"></textarea><br/>
            <input type="submit" name="submitFrases" value="Borrar" />
            <input type="submit" name="submitFrases" value="Modificar"/>
            <input type="submit" name="submitFrases" value="Imprimir">
        </center>
        <hr />
        <br />
        <span>Listado de Frases Favoritas: </span><br />
            <?php if ($_smarty_tpl->tpl_vars['frasesUser']->value !== null) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['frasesUser']->value, 'contenido', false, 'datosArray');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['datosArray']->value => $_smarty_tpl->tpl_vars['contenido']->value) {
?>
                    <label><input type="checkbox" name="frasesLista[]" value="<?php echo $_smarty_tpl->tpl_vars['contenido']->value->getFraseUsuario();?>
"> <?php echo ucfirst($_smarty_tpl->tpl_vars['contenido']->value->getFraseUsuario());?>
</label><br/>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['palabrasFrases']->value, 'contenidoPalabras', false, 'numFrasesIndices');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['numFrasesIndices']->value => $_smarty_tpl->tpl_vars['contenidoPalabras']->value) {
?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['contenidoPalabras']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['contenidoPalabras']->value;?>
"/>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>        
    </form>
    <br />
    <form id="pictotraductorPHP" action="pictotraductor.php" method="POST">
        <input type="submit" name="submitVolver" value="Volver"/>
    </form>
</body>
</html><?php }
}
