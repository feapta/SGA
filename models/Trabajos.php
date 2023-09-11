<?php

// Articulos

namespace Model;

class Trabajos extends ActiveRecord{
    protected static $tabla = 'trabajos';
    protected static $columnasDB = ['id', 'idclientesistemar', 'autonumero', 'nombre', 'preciohora', 'imagen', 'creada'];

    public $id;
    public $idclientesistemar;
    public $autonumero;
    public $nombre;
    public $preciohora;
    public $imagen;
    public $creada;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->idclientesistemar = $args['idclientesistemar'] ?? null;
        $this->autonumero = $args['autonumero'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->preciohora = $args['preciohora'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
        $this->creada = date('Y/m/d');
    }
}

?>