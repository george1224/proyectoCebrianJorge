<?php

namespace Clases1;

class Profesor {

    private $nombreUsuario;
    private $passUsuario;
    private $listadoAlumnos;

    public function __construct($arrayProfesor) {
        $this->nombreUsuario = $arrayProfesor['NombreProfesor'];
        $this->passUsuario = $arrayProfesor['PassProfesor'];
        $this->listadoAlumnos = \Clases1\BD::ejecutaConsulta("SELECT NombreUsuario, PassUsuario FROM "
                        . "personadiscapacitada;");
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getPassUsuario() {
        return $this->passUsuario;
    }

    public function getListadoAlumnos() {
        return $this->listadoAlumnos;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setPassUsuario($passUsuario) {
        $this->passUsuario = $passUsuario;
    }

    public function setListadoAlumnos($listadoAlumnos) {
        $this->listadoAlumnos = $listadoAlumnos;
    }

}
