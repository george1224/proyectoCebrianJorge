<?php

namespace Clases1;

class PersonaDiscapacitada {

    private $nombreUsuario;
    private $passUsuario;
    private $nombreTutorUsuario;
    private $direccionUsuario;
    private $telefonoUsuario;
    private $emailUsuario;
    private $tipoDiscapacidadUsuario;
    private $gradoDiscapacidadUsuario;

    public function __construct($arrayDatosUsuario) {
        $this->nombreUsuario = $arrayDatosUsuario['NombreUsuario'];
        $this->passUsuario = $arrayDatosUsuario['PassUsuario'];
        $this->nombreTutorUsuario = $arrayDatosUsuario['NombreTutor'];
        $this->direccionUsuario = $arrayDatosUsuario['Direccion'];
        $this->telefonoUsuario = $arrayDatosUsuario['Telefono'];
        $this->emailUsuario = $arrayDatosUsuario['Email'];
        $this->tipoDiscapacidadUsuario = $arrayDatosUsuario['TipoDiscapacidad'];
        $this->gradoDiscapacidadUsuario = $arrayDatosUsuario['GradoDiscapacidad'];
    }
    
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getPassUsuario() {
        return $this->passUsuario;
    }

    public function getNombreTutorUsuario() {
        return $this->nombreTutorUsuario;
    }

    public function getDireccionUsuario() {
        return $this->direccionUsuario;
    }

    public function getTelefonoUsuario() {
        return $this->telefonoUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function getTipoDiscapacidadUsuario() {
        return $this->tipoDiscapacidadUsuario;
    }

    public function getGradoDiscapacidadUsuario() {
        return $this->gradoDiscapacidadUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setPassUsuario($passUsuario) {
        $this->passUsuario = $passUsuario;
    }

    public function setNombreTutorUsuario($nombreTutorUsuario) {
        $this->nombreTutorUsuario = $nombreTutorUsuario;
    }

    public function setDireccionUsuario($direccionUsuario) {
        $this->direccionUsuario = $direccionUsuario;
    }

    public function setTelefonoUsuario($telefonoUsuario) {
        $this->telefonoUsuario = $telefonoUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function setTipoDiscapacidadUsuario($tipoDiscapacidadUsuario) {
        $this->tipoDiscapacidadUsuario = $tipoDiscapacidadUsuario;
    }

    public function setGradoDiscapacidadUsuario($gradoDiscapacidadUsuario) {
        $this->gradoDiscapacidadUsuario = $gradoDiscapacidadUsuario;
    }

}
