<?php

// Modelo de usuarios

namespace Model;

class ClienteSistemar extends ActiveRecord {
    protected static $tabla = 'clientesistemar';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'email', 'password', 'telefono', 'imagen', 'direccion', 'numero', 'codigopostal', 'poblacion', 'provincia',
                                     'pais', 'dni_nif', 'token', 'confirmado', 'formapago', 'diapago', 'pagook', 'creado', 'rol'];

    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $password;
    public $password2;
    public $telefono;
    public $imagen;
    public $direccion;
    public $numero;
    public $codigopostal;
    public $poblacion;
    public $provincia;
    public $pais;
    public $dni_nif;
    public $token;
    public $confirmado;
    public $formapago;
    public $diapago;
    public $pagook;
    public $creado;
    public $rol;


    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->numero = $args['numero'] ?? '0';
        $this->codigopostal = $args['codigopostal'] ?? '0';
        $this->poblacion = $args['poblacion'] ?? '';
        $this->provincia = $args['provincia'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->dni_nif = $args['dni_nif'] ?? '';
        $this->token = $args['token'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->formapago = $args['formapago'] ?? '';
        $this->diapago = $args['diapago'] ?? '0';
        $this->pagook = $args['pagook'] ?? '0';
        $this->creado = date('Y/m/d');
        $this->rol = $args['rol'] ?? '1';
    }


    // Mensajes de validacion para la creacion de una cuenta
    public function validarNuevaCuenta(){

        if(!$this->nombre){
            self::$alertas['error'] [] = 'El nombre es obligatorio';
        }
        if(!$this->apellidos){
            self::$alertas['error'] [] = 'Los apellidos son obligatorios';
        }
        if(!$this->email){
            self::$alertas['error'] [] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        if($this->password != $this->password2){
            self::$alertas['error'] [] = 'Los password no son iguales';
        }
        if(strlen($this->password) < 6 ){
            self::$alertas['error'] [] = 'El password debe contener al menos 6 caracteres';
        }
        if(!$this->telefono){
            self::$alertas['error'] [] = 'El telefono es obligatorio';
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
        if(!$this->dni_nif){
            self::$alertas['error'] [] = 'El DNI o NIF son obligatorios';
        }
        return self::$alertas;
    }

    // Mensajes de validacion para el login y password
    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'] [] = 'El email es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El Password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Comprobar el password confirmado y verificado
    public function comprobaciones($password) {
        $resultado = password_verify($password, $this->password);
        if(!$resultado) {
            self::$alertas['error'][] = 'Password Incorrecto';
        } else if(!$this->confirmado){
            self::$alertas['error'][] = 'Cuenta no confirmada, por favor valla a su Email y confirmela';
        }else{
            return true;
        }
    }


    // Validar email si se olvido contraseña
    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'] [] = 'El email es obligatorio';
        }   
        return self::$alertas;
    }

    // Validar email si se olvido contraseña
    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'] [] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 6 ){
            self::$alertas['error'] [] = 'El password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }



    // Comprobar si exite cuenta
    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1"; 
        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'] [] = 'El usuario ya esta registrado';
        }
        return $resultado;
    }

    // Hashear password
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Crear un token unico
    public function crearToken(){
        $this->token = uniqid();    //Genera un numero unico, sirve para generar id unico y se cambia cada vez que actualizas
    }

}