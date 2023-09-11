<?php

// Modelo de Fincas

namespace Model;

class Productos extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'idclientesistemar', 'autonumero', 'nombre', 'tipo', 'kilolitro', 'precio', 'imagen', 'creada'];

    public $id;
    public $idclientesistemar;
    public $autonumero;
    public $nombre;
    public $tipo;
    public $kilolitro;
    public $precio;
    public $imagen;
    public $creada;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idclientesistemar = $args['idclientesistemar'] ?? null;
        $this->autonumero = $args['autonumero'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->tipo = $args['tipo'] ?? null;
        $this->kilolitro = $args['kilolitro'] ?? null;
        $this->precio = $args['precio'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
        $this->creada = date('Y/m/d');
    }

      // Mensajes de validacion para la creacion de una cuenta
      public function validarNuevaCuenta(){

        if(!$this->nombre){
            self::$alertas['error'] [] = 'El nombre es obligatorio';
        }
        if(!$this->precio){
            self::$alertas['error'] [] = 'El precio es obligatorio';
        }
   
        return self::$alertas;
    }
}