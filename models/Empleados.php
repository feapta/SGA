<?php

// Modelo de empleados

namespace Model;

class Empleados extends ActiveRecord {
    protected static $tabla = 'empleados';
    protected static $columnasDB = ['id', 'idclientesistemar', 'autonumero', 'nombre', 'apellidos', 'direccion', 'numero', 'codigopostal', 'poblacion', 'provincia', 'dni', 'telefono', 'email',  
                                      'categoria', 'preciohora', 'imagen', 'creado'];

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
    public $dni;
    public $telefono;
    public $email;
    public $categoria;
    public $preciohora;
    public $imagen;
    public $creado;



    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->idclientesistemar = $args['idclientesistemar']  ?? '';
        $this->autonumero = $args['autonumero']  ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->numero = $args['numero'] ?? '0';
        $this->codigopostal = $args['codigopostal'] ?? '';
        $this->poblacion = $args['poblacion'] ?? '';
        $this->provincia = $args['provincia'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->preciohora = $args['preciohora'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
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
        return self::$alertas;
    }



}