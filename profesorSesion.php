<?php
require ("./vendor/autoload.php");
error_reporting(0);
session_start();
$plantilla = new Smarty();
$plantilla->template_dir = "./plantillas";
$plantilla->compile_dir = "./plantillas_c";

if (isset($_POST['submitCuenta'])) {
    $userName = $_POST['alumnoName'];
    $passUser = $_POST['alumnoPass'];
    $arrayUser = Clases1\BD::ejecutaConsulta("SELECT * FROM personadiscapacitada WHERE NombreUsuario=? AND PassUsuario =?;", array($userName, $passUser));
    Clases1\BD::cerrar();
    foreach ($arrayUser as $contenidoArray) {
        $user = new \Clases1\PersonaDiscapacitada($contenidoArray);
    }
    $_SESSION['alumno'] = serialize($user);
    $plantilla->assign("alumno", unserialize($_SESSION['alumno']));
    $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
    $plantilla->display("pictotraductor.tpl");
} else if (isset ($_POST['submitPictotraductor'])) {
    switch ($_POST['submitPictotraductor']) {
        case 'Ir al Pictotraductor':
            $plantilla->assign("usuarioProfesor", unserialize($_SESSION['usuario']));
            $plantilla->display("pictotraductor.tpl");
            break;
        case 'Cerrar sesion':
            header("Location:index.php");
            break;
        default :
            break;
    }
}
?>