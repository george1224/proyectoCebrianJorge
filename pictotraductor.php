<?php
require ("./vendor/autoload.php");
error_reporting(0);
session_start();
$plantilla = new Smarty();
$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

$fraseTextArea = Clases1\BD::escapa(strtolower(filter_input(INPUT_POST, "textoTraducir", FILTER_SANITIZE_STRING)));
if (isset($_POST['alumno'])) {
    $userLogin = unserialize($_SESSION['alumno']);
} else {
    $userLogin = unserialize($_SESSION['usuario']);
}
$arrayCamposFrase = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='oracion';");
if (isset($_POST['submitPictotraductor'])) {
    switch ($_POST['submitPictotraductor']) {
        case 'Cerrar sesion':
            header("Location:index.php");
            break;
        case 'Traducir':
            $arrayPalabrasFrases = explode(" ", $fraseTextArea);
            $arrayPictogramas = Clases1\BD::crearArrayPalabrasFrase($arrayPalabrasFrases);
            Clases1\BD::cerrar();
            if (isset($_POST['alumno'])) {
                $plantilla->assign("alumno", unserialize($_SESSION['alumno']));
                $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
            } else if (isset($_POST['usuario'])) {
                $plantilla->assign("usuarioBD", unserialize($_SESSION['usuario']));
            } else {
                $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
            }
            $plantilla->assign("fraseUser", filter_input(INPUT_POST, "textoTraducir", FILTER_SANITIZE_STRING));
            $plantilla->assign("pictogramas", $arrayPictogramas);
            $plantilla->display("pictotraductor.tpl");
            break;
        case 'Añadir a Frases Favoritas':
            if (($fraseTextArea === null) || ($fraseTextArea === "")) {
                $msj = "No se ha introducido ninguna frase, por favor escriba una.";
            } else {
                if (Clases1\BD::ejecutaConsulta2("SELECT * FROM oracion WHERE OracionUsuario=? and Usuario=?;", array($fraseTextArea, $userLogin->getNombreUsuario())) === true) {
                    $msj = "La frase ya existe en la base de datos, pruebe con otra.";
                } else {
                    $sentenciaInsert = Clases1\BD::insert_parametrizada($arrayCamposFrase, "oracion");
                    if (Clases1\BD::ejecutaConsulta2($sentenciaInsert, array(null, $fraseTextArea, $userLogin->getNombreUsuario())) === true) {
                        $msj = "La frase se ha añadido con exito a la base de datos.";
                    }
                }
            }
            Clases1\BD::cerrar();
            if (isset($_POST['alumno'])) {
                $plantilla->assign("alumno", unserialize($_SESSION['alumno']));
                $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
            } else if (isset($_POST['usuario'])) {
                $plantilla->assign("usuarioBD", unserialize($_SESSION['usuario']));
            } else {
                $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
            }
            $plantilla->assign("msjInfo", $msj);
            $plantilla->display("pictotraductor.tpl");
            break;
        case 'Ir a Frases Favoritas':
            if (isset($_POST['alumno'])) {
                header("Location:frases.php?usuarioProfesor=" . $userLogin->getNombreUsuario() . "&alumno=" . unserialize($_SESSION['alumno'])->getNombreUsuario());
            } else if (isset($_POST['usuario'])) {
                header("Location:frases.php?usuarioBD=" . $userLogin->getNombreUsuario());
            } else {
                header("Location:frases.php?usuarioProfesor=" . $userLogin->getNombreUsuario());
            }
            break;
        case 'Volver':
            if (isset($_POST['usuario'])) {
                header("Location:index.php");
            } else {
                $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
                $plantilla->display("profesorSesion.tpl");
            }
            break;
        default :
            break;
    }
} else if (isset($_POST['submitVolver'])) {
    if (isset($_POST['alumno'])) {
        $plantilla->assign("alumno", unserialize($_SESSION['alumno']));
        $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
    } else if (isset($_POST['usuario'])) {
        $plantilla->assign("usuarioBD", unserialize($_SESSION['usuario']));
    } else {
        $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
    }
    $plantilla->assign("msjInfo", $msj);
    $plantilla->display("pictotraductor.tpl");
}
?>