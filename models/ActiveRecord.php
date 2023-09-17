<?php

namespace Model;
use Classes\Conexion;
use mysqli;

class ActiveRecord{

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];
    protected static $alertas = [];
    public $id;
    public $imagen; 

// VALIDACIONES
    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }
    public static function getAlertas() {
        return static::$alertas;
    }
    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

// BASE DE DATOS
    // Definir la conexión a la BD
    public static function setDB($database) {
         self::$db = $database;
    }
    // Consulta SQL para crear un objeto en Memoria
    public static function consultarSQL($query) {
        $resultado = self::$db->query($query);
        $array = [];
        
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free();
        return $array;
    }
    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }
    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    // Sincronizar el obejto en memoria con los cambios ralizados
    public function sincronizar($args) {
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }



// GUARDAR Y ACTUALIZAR REGISTROS
    // Registros
    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }
    // Crea un nuevo registro
    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= "') ";

        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
            'resultado' =>  $resultado,
            'id' => self::$db->insert_id
        ];
    }
    // Actualizar el registro
    public function actualizar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
   
        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id='" . self::$db->escape_string($this->id) . "' ";
        $query .= "LIMIT 1"; 

        // Actualizar BD
        $resultado = self::$db->query($query);
       
        return $resultado;
    }

    ///////////////////////////////// SOLO PARTES->TRABAJOS
    public function guardarParte() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizarParte();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crearParte();
        }
        return $resultado;
    }
    // Crea un nuevo registro
    public function crearParte() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));   // MODIFICADO PARA QUE FUNCIONE
        $query .= " ) VALUES ("; 
        $query .= join(", ", array_values($atributos));
        $query .= ") ";
        //debug("Crear ----->" . $query);
        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
            'resultado' =>  $resultado,
            'id' => self::$db->insert_id
        ];
    }
    // Actualizar el registro
    public function actualizarParte() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
   
        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key} = {$value}" ; // MODIFICADO PARA QUE FUNCIONE
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id='" . self::$db->escape_string($this->id) . "' ";
        $query .= "LIMIT 1"; 
        //debug("Actualizar" . $query);
        // Actualizar BD
        $resultado = self::$db->query($query);
       
        return $resultado;
    }
    //////////////////////////////////

    
// ELIMINAR
    public function eliminar($tabla, $id, $carpetaRecibida) {
        $query = "DELETE FROM $tabla WHERE id = $id LIMIT 1";
        $resultado = self::$db->query($query);
        
        if($resultado){
            $this->borrarImagen($carpetaRecibida);
            echo json_encode('ok');
        }
    }
// ELIMINAR PARTES
    public function eliminar_partes($tabla, $columna, $id) {
        $query = "DELETE FROM $tabla WHERE $columna = $id";
        $resultado = self::$db->query($query);
        return $resultado;
    }

// FIND
    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }
    // Busca un registro por su id y tabla
    public static function find_tabla($tabla, $id) {
        $query = "SELECT * FROM $tabla WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }
   
    public static function find_tabla_cliente($tabla, $id) {
        $query = "SELECT * FROM $tabla WHERE idclienteapp = $id";

        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    

// ALL
// MUESTRA TODOS LOS REGISTROS
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // MUESTRA TODOS LOS REGISTROS
    public static function all_id($id) {
        $query = "SELECT * FROM " . static::$tabla ." WHERE idparte = $id";

        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    // MUESTRA TODOS LOS REGISTROS
    public static function all_id_partestrabajos($id) {
        $query = "SELECT * FROM " . static::$tabla ." WHERE id = $id";

        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca todos los registros de un clienteSISTEMAR
    public static function all_find($id) {
        $query = "SELECT * FROM " . static::$tabla ." WHERE idclientesistemar = $id";
        $resultado = self::consultarSQL($query);
        return  $resultado;
    }
    
    // Busca todos los registros de un clienteAPP
    public static function all_find_clienteapp($id) {
        $query = "SELECT id, CONCAT(nombre, ' ', apellidos) AS nombre FROM " . static::$tabla  ." WHERE idclientesistemar = $id";
        $resultado = self::consultarSQL($query);
        return  $resultado;
    }
    
    // Busca todas las fincas de un cliente app
    public static function all_fincas($idclienteapp) {
        $query = "SELECT id, nombre FROM " . static::$tabla ." WHERE idclienteapp = $idclienteapp";

        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    


// WHERE
    // Busca un registro por columna y valor
    public static function whereValor($columna, $valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE $columna = '$valor'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }



// SQL PLANA
    // Consulta Plana de SQL (Utilizar cuando los métodos del modelo no son suficientes)
    public static function SQL($query) {
        $resultado = self::$db->query($query);
        return $resultado;
    }
    // Devulve un solo registro
    public static function SQL_directa($query) {
       // debug($query);
        $resultado = self::$db->query($query);
        while($registro = $resultado->fetch_assoc()) {
            $array[] = $registro;
        }
        return $array;
    }


// CONTAR
    // Contar registros de una tabla
    public static function contar($tabla, $id) {
        $query = "SELECT COUNT(*) $tabla FROM $tabla WHERE idclientesistemar = $id";
        $resultado = self::$db->query($query);
        return mysqli_fetch_assoc($resultado);
    }

    // Contar registros
    public static function contar_registros() {
        $query = "SELECT COUNT(*) FROM ". static::$tabla;
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();
        return array_shift($total);
    }

    // Contar registros entre fechas
    public static function contar_registros_fechas($fechainicio, $fechafin) {
        $query = "SELECT COUNT(*) FROM ". static::$tabla ." WHERE fecha >= '$fechainicio' AND fecha <= '$fechafin' ";
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();
        return array_shift($total);
    }



// IMAGENES
    // Subir archivo de imagenes
    public function setImagen($imagen, $carpeta){
        // Eliminar la imagen previa
        if(!is_null($this->id)){
            $this->borrarImagen($carpeta);
        }
        // Agrega la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    // Borrar archivos de imagen
    public function borrarImagen($carpeta){
        $existeArchivo = file_exists($carpeta . $this->imagen);

        if($existeArchivo){
            unlink($carpeta . $this->imagen);
        }
    }



// AUTONUMERO
    // Busca el ultimo numero de una tabla
    public static function autonumero($idclienteS) {
        $query = "SELECT MAX(autonumero) AS autonumero FROM " . static::$tabla  ." WHERE idclientesistemar = $idclienteS";
        $resultado = self::consultarSQL($query);
        $numero = array_shift( $resultado );
        $suma = $numero->autonumero;
        $suma++;
        return $suma;
    }
// COMPROBAR LAS FILAS QUE LLEGAN PARA GUARDAR
    public static function comprobarFilas($seccion){
        $idparte = $seccion[0]['idparte'];

        $idsquehay = [];
        $idsquellegan = [];

        $consulta = " SELECT id FROM partestrabajos WHERE idparte = $idparte ";
        $resultado = ActiveRecord::SQL_directa($consulta);
        foreach($resultado as $ids){
            array_push($idsquehay, $ids['id']);
        }
        foreach($seccion as $ids){
            array_push($idsquellegan, $ids['id']);
        }

        $diferencias = array_diff($idsquehay, $idsquellegan);
        
        if($diferencias){
            foreach ( $diferencias as $diferencia){
                $ideliminar = $diferencia;
                $filas = PartesTrabajos::all_id_partestrabajos($ideliminar);

                foreach($filas as $fila){
                    $resultado = $fila->eliminar_partes('partestrabajos', 'id', $ideliminar);
                }
            }
        }
        return $resultado;
    }


}