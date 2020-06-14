<?php
require ("./vendor/autoload.php");
error_reporting(0);
session_destroy();
session_start();
$plantilla = new Smarty();
$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

Clases1\BD::crearBaseDatos();
if (Clases1\BD::ejecutaConsulta("SELECT * FROM personadiscapacitada;") === null) {
    $arrayCamposPersona = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='personadiscapacitada';");
    $sqlPersona = Clases1\BD::insert_parametrizada($arrayCamposPersona, "personadiscapacitada");
    Clases1\BD::ejecutaConsulta2($sqlPersona, array("tester1", "tester1", "Pedro", "C/ Jarque del Moncayo n10",
        "976 300 804", "secretaria@cpilosenlaces.com", "Asperger", "Leve"));
    Clases1\BD::ejecutaConsulta2($sqlPersona, array("tester2", "tester2", "Marta", "C/ Jarque del Moncayo n10",
        "976 300 804", "secretaria@cpilosenlaces.com", "TDAH", "Moderado"));
    Clases1\BD::ejecutaConsulta2($sqlPersona, array("tester3", "tester3", "Juan", "C/ Jarque del Moncayo n10",
        "976 300 804", "secretaria@cpilosenlaces.com", "Autismo", "Grave"));
}
if (Clases1\BD::ejecutaConsulta("SELECT * FROM profesor;") === null) {
    $arrayCamposProfesor = Clases1\BD::obtenerCampos("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='profesor';");
    $sqlProfesor = Clases1\BD::insert_parametrizada($arrayCamposProfesor, "profesor");
    Clases1\BD::ejecutaConsulta2($sqlProfesor, array("admin", "admin"));
}
if (isset($_POST['login'])) {
    $userName = Clases1\BD::escapa(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $passUser = Clases1\BD::escapa(filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING));
    $arrayUser = Clases1\BD::verificaUsuario($userName, $passUser, "personadiscapacitada", "NombreUsuario", "PassUsuario");
    if ($arrayUser === null) {
        $arrayProfesor = Clases1\BD::verificaUsuario($userName, $passUser, "profesor", "NombreProfesor", "PassProfesor");
        if ($arrayProfesor === null) {
            Clases1\BD::cerrar();
            $error = "El usuario no existe en la base de datos";
            $plantilla->assign("errorInicioSesion", $error);
            $plantilla->display("index.tpl");
        } else {
            Clases1\BD::cerrar();
            foreach ($arrayProfesor as $contenidoArrayProfesor) {
                $profesor = new \Clases1\Profesor($contenidoArrayProfesor);
            }
            $_SESSION['usuario'] = serialize($profesor);
            $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
            $plantilla->display("profesorSesion.tpl");
        }
    } else {
        Clases1\BD::cerrar();
        foreach ($arrayUser as $contenidoArray) {
            $user = new \Clases1\PersonaDiscapacitada($contenidoArray);
        }
        $_SESSION['usuario'] = serialize($user);
        $plantilla->assign("usuarioBD", unserialize($_SESSION['usuario']));
        $plantilla->display("pictotraductor.tpl");
    }
} else if (isset($_POST['create'])) {
    $plantilla->display("usuarios.tpl");
} else {
    $plantilla->display("index.tpl");
}
?>