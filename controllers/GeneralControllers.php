<?php

// Controlador de funciones generales

namespace Controllers;

use Model\Maquinas;
use Model\Fincas;
use Model\ClientesApp;
use Model\ClienteSistemar;
use Model\Empleados;
use Model\Trabajos;
use Model\Productos;

class GeneralControllers{

    // ELIMINAR
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $numero = $_POST['numero'];
            $tabla = $_POST['tabla'];

            $carpetas = array(
                '1' => CARPETA_IMAGEN_CLIENTES,
                '2' => CARPETA_IMAGEN_CLIENTESAPP,
                '3' => CARPETA_IMAGEN_FINCAS,
                '4' => CARPETA_IMAGEN_MAQUINAS, 
                '5' => CARPETA_IMAGEN_PRODUCTOS, 
                '6' => CARPETA_IMAGEN_EMPLEADOS, 
                '7' => CARPETA_IMAGEN_TRABAJOS, 
            );

            $modelo = array(
                '1' => ClienteSistemar::find($id),
                '2' => ClientesApp::find($id),
                '3' => Fincas::find($id),
                '4' => Maquinas::find($id),
                '5' => Productos::find($id),
                '6' => Empleados::find($id),
                '7' => Trabajos::find($id)
                //'8'
            );
            
            
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)) {
                    $eliminar = $modelo["$numero"];
                    $eliminar->eliminar($tabla, $id, $carpetas["$numero"]);
                }
            }
        }   
    }

}