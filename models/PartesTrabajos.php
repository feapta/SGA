<?php

// Modelo de Fincas

namespace Model;

class PartesTrabajos extends ActiveRecord {
    protected static $tabla = 'partestrabajos';
    protected static $columnasDB = ['id', 'idparte', 'indicefila', 'idempleado', 'idtrabajo', 'horastrabajo', 'idmaquina', 'horasmaquina', 'idproducto', 'cantpro'];

    public $id;
    public $idparte;
    public $indicefila;
    public $idempleado;
    public $idtrabajo;
    public $horastrabajo;
    public $idmaquina;
    public $horasmaquina;
    public $idproducto;
    public $cantpro;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idparte = $args['idparte'] ?? null;
        $this->indicefila = $args['indicefila'] ?? null;
        $this->idempleado = $args['idempleado'] ?? null;
        $this->idtrabajo = $args['idtrabajo'] ?? null;
        $this->horastrabajo = $args['horastrabajo'] ?? null;
        $this->idmaquina = $args['idmaquina'] ?? null;
        $this->horasmaquina = $args['horasmaquina'] ?? null;
        $this->idproducto = $args['idproducto'] ?? null;
        $this->cantpro = $args['cantpro'] ?? null;
    }

// Mensajes de validacion para la creacion de un parte
   public function validarNuevoPartesTrabajos(){
    if(!$this->idtrabajo){
        self::$alertas['error'] [] = 'Debe seleccionar un trabajo';
    }
    if(!$this->horastrabajo){
        self::$alertas['error'] [] = 'Indique cantidad de trabajo';
    }

    return self::$alertas;
    }

}