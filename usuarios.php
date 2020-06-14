<?php
require ("./vendor/autoload.php");
error_reporting(0);
session_start();
$plantilla = new Smarty();
$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

if (isset($_POST['userCreado'])) {
    $nombreUserNuevo = Clases1\BD::escapa(filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING));
    $passUserNuevo = Clases1\BD::escapa(filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING));
    $nombreTutorUserNuevo = Clases1\BD::escapa(filter_input(INPUT_POST, "nombreTutor", FILTER_SANITIZE_STRING));
    $direccionUserNuevo = Clases1\BD::escapa(filter_input(INPUT_POST, "direccion", FILTER_SANITIZE_STRING));
    $telefonoUserNuevo = Clases1\BD::escapa(filter_input(INPUT_POST, "telef", FILTER_SANITIZE_STRING));
    $emailUserNuevo = Clases1\BD::escapa(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    $tipoDiscapacidadUserNuevo = Clases1\BD::escapa(filter_input(INPUT_POST, "tipoDiscapacidad", FILTER_SANITIZE_STRING));
    $gradoDiscapacidadUserNuevo = Clases1\BD::escapa(filter_input(INPUT_POST, "gradoDiscapacidad", FILTER_SANITIZE_STRING));

    $listaDatosUserNuevo = [$nombreUserNuevo, $passUserNuevo, $nombreTutorUserNuevo, $direccionUserNuevo,
        $telefonoUserNuevo, $emailUserNuevo, $tipoDiscapacidadUserNuevo, $gradoDiscapacidadUserNuevo];
    $arrayCamposTabla = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='personadiscapacitada';");
    foreach ($listaDatosUserNuevo as $arrayPos => $contenido) {
        if (($contenido === "") || ($contenido === null)) {
            Clases1\BD::cerrar();
            $msj = "Uno o más campos se encuentran vacios, rellenelos todos por favor.";
            $plantilla->assign("msjInfo", $msj);
            $plantilla->display("usuarios.tpl");
            break;
        }
    }
    if (Clases1\BD::ejecutaConsulta2("SELECT * FROM personadiscapacitada WHERE NombreUsuario=?;", array($nombreUserNuevo)) === true) {
        Clases1\BD::cerrar();
        $msj = "El usuario ya existe, intentelo de nuevo.";
        $plantilla->assign("msjInfo", $msj);
        $plantilla->display("usuarios.tpl");
    } else {
        $sentenciaInsert = Clases1\BD::insert_parametrizada($arrayCamposTabla, "personadiscapacitada");
        Clases1\BD::ejecutaConsulta2($sentenciaInsert, $listaDatosUserNuevo);
        Clases1\BD::cerrar();
        $msj = "El usuario se ha creado correctamente.";
        $plantilla->assign("msjInfo", $msj);
        $plantilla->display("index.tpl");
    }
}
?>