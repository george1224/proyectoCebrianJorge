<?php
require ("./vendor/autoload.php");
error_reporting(0);
session_start();
$plantilla = new Smarty();
$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

if ((isset($_GET['alumno'])) || $_POST['alumno']) {
    $userName = unserialize($_SESSION['alumno']);
} else {
    $userName = unserialize($_SESSION['usuario']);
}
$frase = Clases1\BD::escapa(strtolower(filter_input(INPUT_POST, "textoFrase", FILTER_SANITIZE_STRING)));
$fraseRadio = $_POST['frasesLista'];
$arrayCamposFrase = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='oracion';");
if (isset($_POST['submitFrases'])) {
    switch ($_POST['submitFrases']) {
        case "Borrar":
            if ($fraseRadio === null) {
                $msjInfo = "No ha seleccionado una frase para borrar, por favor escoja una.";
            } else {
                $sentenciaBorrar = Clases1\BD::delete_parametrizada("OracionUsuario", "Usuario", "oracion");
                foreach ($fraseRadio as $indices => $contenido) {
                    if (Clases1\BD::ejecutaConsulta2($sentenciaBorrar, array($contenido, $userName->getNombreUsuario())) === true) {
                        $msjInfo = "Eliminacion completada.";
                    }
                }
            }
            break;
        case "Modificar":
            if (($frase === null) || ($frase === "")) {
                $msjInfo = "No se ha introducido ninguna frase para modificar, por favor escriba una.";
            } else if (count($fraseRadio) > 1) {
                $msjInfo = "Solo se puede elegir una frase para modificar.";
            } else if ($fraseRadio === null) {
                $msjInfo = "No se ha seleccionado ninguna frase para modificar, por favor escoga una.";
            } else {
                $sentenciaUpdate = Clases1\BD::update_parametrizada("oracion", "OracionUsuario", "Usuario");
                foreach ($fraseRadio as $indices => $contenido) {
                    if (Clases1\BD::ejecutaConsulta2($sentenciaUpdate, array($frase,$contenido, $userName->getNombreUsuario())) === true) {
                        $msjInfo = "La frase se ha modificado correctamente.";
                    }
                }
            }
            break;
    }
}
$arrayFrasesUser = Clases1\BD::ejecutaConsulta("SELECT OracionUsuario FROM oracion WHERE Usuario=?;", array($userName->getNombreUsuario()));
if ($arrayFrasesUser !== null) {
    foreach ($arrayFrasesUser as $array) {
        $frase = new Clases1\Frase($array);
        $listadoFrases[] = $frase;
    }
    Clases1\BD::cerrar();
    if ((isset($_GET['alumno'])) || $_POST['alumno']) {
        $plantilla->assign("alumno", unserialize($_SESSION['alumno']));
        $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
    } else if ((isset($_GET['usuarioBD'])) || $_POST['usuarioBD']) {
        $plantilla->assign("usuarioBD", unserialize($_SESSION['usuario']));
    } else {
        $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
    }
    $plantilla->assign("msj", $msjInfo);
    $plantilla->assign("frasesUser", $listadoFrases);
    $plantilla->display("frases.tpl");
} else {
    Clases1\BD::cerrar();
    if ((isset($_GET['alumno'])) || $_POST['alumno']) {
        $plantilla->assign("alumno", unserialize($_SESSION['alumno']));
        $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
    } else if ((isset($_GET['usuarioBD'])) || $_POST['usuarioBD']) {
        $plantilla->assign("usuarioBD", unserialize($_SESSION['usuario']));
    } else {
        $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
    }
    $plantilla->assign("msj", $msjInfo);
    $plantilla->display("frases.tpl");
}
?>
