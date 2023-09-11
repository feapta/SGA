<?php

// Modelo de solicitud de informacion

namespace Model;

class Informacion extends ActiveRecord {
    protected static $tabla = 'informacion';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'comocontacto', 'fecha', 'hora', 'email', 'telefono', 'mensaje', 'atendida', 'creado' ];

    public $id;
    public $nombre;
    public $apellidos;
    public $comocontacto;
    public $fecha;
    public $hora;
    public $email;
    public $telefono;
    public $mensaje;
    public $atendida;
    public $creado;


    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->comocontacto = $args['comocontacto'] ?? '';
        $this->fecha = $args['fecha'] ?? '0000-00-00';
        $this->hora = $args['hora'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
        $this->atendida = $args['atendida'] ?? '0';
        $this->creado = date('Y/m/d');
    }


    // Mensajes de validacion para la creacion de una cuenta
    public function validarinformacion(){

        if(!$this->nombre){
            self::$alertas['error'] [] = 'El nombre es obligatorio';
        }
        if($this->comocontacto === 'telefono'){
            if(!$this->telefono){
                self::$alertas['error'] [] = 'El telefóno es obligatorio';
            }
        }
        if($this->comocontacto === 'email'){
            if(!$this->email){
                self::$alertas['error'] [] = 'El email es obligatorio';
            }
        }
        return self::$alertas;
    }

}