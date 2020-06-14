<?php

namespace Clases1;

class Frase {

    //put your code here

    private $fraseUsuario;
    private $palabrasFrases;

    public function __construct($frases) {
        $this->fraseUsuario = $frases['OracionUsuario'];
        $this->palabrasFrases = \Clases1\BD::crearArrayPalabrasFrase(explode(" ", $frases['OracionUsuario']));
    }

    public function getFraseUsuario() {
        return $this->fraseUsuario;
    }

    public function getPalabrasFrases() {
        return $this->palabrasFrases;
    }

    public function setPalabrasFrases($palabrasFrases) {
        $this->palabrasFrases = $palabrasFrases;
    }

    public function setFraseUsuario($fraseUsuario) {
        $this->fraseUsuario = $fraseUsuario;
    }

}
