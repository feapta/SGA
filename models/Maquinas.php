<?php

// Articulos

namespace Model;

class Maquinas extends ActiveRecord{
    protected static $tabla = 'maquinas';
    protected static $columnasDB = ['id', 'idclientesistemar', 'autonumero', 'nombre', 'precioHora', 'imagen', 'creada'];

    public $id;
    public $idclientesistemar;
    public $autonumero;
    public $nombre;
    public $precioHora;
    public $imagen;
    public $creada;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->idclientesistemar = $args['idclientesistemar'] ?? null;
        $this->autonumero = $args['autonumero'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->precioHora = $args['precioHora'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
        $this->creada = date('Y/m/d');
    }
}

?>