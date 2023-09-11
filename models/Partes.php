<?php

// Modelo de Fincas

namespace Model;

class Partes extends ActiveRecord {
    protected static $tabla = 'partes';
    protected static $columnasDB = ['id', 'idclienteapp', 'idclientesistemar', 'autonumero', 'fecha', 'idfinca', 'creada'];

    public $id;
    public $idclienteapp;
    public $idclientesistemar;
    public $autonumero;
    public $fecha;
    public $idfinca;
    public $creada;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idclienteapp = $args['idclienteapp'] ?? null;
        $this->idclientesistemar = $args['idclientesistemar'] ?? null;
        $this->autonumero = $args['autonumero'] ?? null;
        $this->fecha = $args['fecha'] ?? null;
        $this->idfinca = $args['idfinca'] ?? null;
        $this->creada = date('Y/m/d');
    }

   // Mensajes de validacion para la creacion de un parte
   public function validarNuevoParte(){

    if(!$this->fecha){
        self::$alertas['error'] [] = 'Debe introducir una fecha';
    }
    if(!$this->idclienteapp){
        self::$alertas['error'] [] = 'Seleccione un cliente';
    }
    if(!$this->idfinca){
        self::$alertas['error'] [] = 'Seleccione una finca';
    }

    return self::$alertas;
}

}