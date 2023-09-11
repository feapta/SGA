<?php

// Modelo de Fincas

namespace Model;

class Fincas extends ActiveRecord {
    protected static $tabla = 'fincas';
    protected static $columnasDB = ['id', 'idclienteapp',  'idclientesistemar', 'autonumero', 'nombre', 'propietario', 'lati', 'longi', 'hectareas', 'imagen', 'creada'];

    public $id;
    public $idclienteapp;
    public $idclientesistemar;
    public $autonumero;
    public $nombre;
    public $propietario;
    public $lati;
    public $longi;
    public $hectareas;
    public $imagen;
    public $creada;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idclienteapp = $args['idclienteapp'] ?? null;
        $this->idclientesistemar = $args['idclientesistemar'] ?? null;
        $this->autonumero = $args['autonumero'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->propietario = $args['propietario'] ?? null;
        $this->lati = $args['lati'] ?? null;
        $this->longi = $args['longi'] ?? null;
        $this->hectareas = $args['hectareas'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
        $this->creada = date('Y/m/d');
    }

      // Mensajes de validacion para la creacion de una cuenta
      public function validarNuevaCuenta(){

        if(!$this->nombre){
            self::$alertas['error'] [] = 'El nombre es obligatorio';
        }
        if(!$this->propietario){
            self::$alertas['error'] [] = 'El propietario es obligatorio';
        }
   
        return self::$alertas;
    }
}