<?php

// Modelo de usuarios

namespace Model;

class ClientesApp extends ActiveRecord {
    protected static $tabla = 'clientesapp';
    protected static $columnasDB = ['id', 'idclientesistemar',  'autonumero', 'nombre', 'apellidos','direccion', 'numero', 'codigopostal', 'poblacion', 'provincia', 'pais', 'dninif', 'telefono', 'email',  
                                      'tipoiva', 'imagen', 'notas', 'creado'];

    public $id;
    public $idclientesistemar;
    public $autonumero;
    public $nombre;
    public $apellidos;
    public $direccion;
    public $numero;
    public $codigopostal;
    public $poblacion;
    public $provincia;
    public $pais;
    public $dninif;
    public $telefono;
    public $email;
    public $tipoiva;
    public $imagen;
    public $notas;
    public $creado;



    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idclientesistemar = $args['idclientesistemar'] ?? null;
        $this->autonumero = $args['autonumero'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->numero = $args['numero'] ?? '0';
        $this->codigopostal = $args['codigopostal'] ?? '';
        $this->poblacion = $args['poblacion'] ?? '';
        $this->provincia = $args['provincia'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->dninif = $args['dninif'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->tipoiva = $args['tipoiva'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->notas = $args['notas'] ?? '';
        $this->creado = date('Y/m/d');
    }


    // Mensajes de validacion para la creacion de una cuenta
    public function validarNuevaCuenta(){

        if(!$this->nombre){
            self::$alertas['error'] [] = 'El nombre es obligatorio';
        }
        if(!$this->apellidos){
            self::$alertas['error'] [] = 'Los apellidos son obligatorios';
        }
        if(!$this->direccion){
            self::$alertas['error'] [] = 'La direccion es obligatoria';
        }
        if(!$this->numero){
            self::$alertas['error'] [] = 'El numero es obligatorio';
        }
        if(!$this->codigopostal){
            self::$alertas['error'] [] = 'El código postal es obligatorio';
        }
        if(!$this->poblacion){
            self::$alertas['error'] [] = 'La población es obligatorio';
        }
        if(!$this->provincia){
            self::$alertas['error'] [] = 'La provincia es obligatoria';
        }
        if(!$this->dninif){
            self::$alertas['error'] [] = 'El DNI o NIF son obligatorios';
        }
        return self::$alertas;
    }



}