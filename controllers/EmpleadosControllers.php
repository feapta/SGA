<?php

// Controlador empleados

namespace Controllers;

use Model\Empleados;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class EmpleadosControllers{

    // empleados LISTADO
    public static function listado(Router $router){
        session_start();
        $idclienteS = $_GET['idclienteS'];
        $empleados = Empleados::all_find($idclienteS);
        
        $router->renderClientesConfiguracion('empleados/listado', [
            'empleados' => $empleados

        ]);
    }
    // empleados LISTADO COMPLETO
    public static function listadocompleto(Router $router){
        session_start();
        $id = $_GET['idclienteS'];
        $empleados = Empleados::find($id);
        
        $router->renderClientesConfiguracion('empleados/listadocompleto', [
            'empleados' => $empleados
        ]);
    }
    
    // empleados CREAR
    public static function crear(Router $router){
        $alertas = [];
        session_start();
        $empleados = new Empleados();
        $carpeta = CARPETA_IMAGEN_EMPLEADOS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $empleados = new Empleados($_POST['empleados']);

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['empleados']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['empleados']['tmp_name']['imagen'])->resize(350, 250);
                $empleados->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $empleados->validar();
            if(empty($alertas)){
                $imagen->save($carpeta . $nombreImagen);    
                $empleados->guardar();  
                header("Location: /empleados?idcliente=$empleados->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('empleados/crear', [

        ]);
        
    }

    // empleados ACTUALIZAR
    public static function actualizar(Router $router){
        session_start();
        $id = validar0Redireccionar('/admin');
        $carpeta = CARPETA_IMAGEN_EMPLEADOS;
        $empleados = Empleados::find($id);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['empleados'];
            $empleados->sincronizar($args);
            $alertas = $empleados->validar();

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['empleados']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['empleados']['tmp_name']['imagen'])->resize(350, 250);
                $empleados->setImagen($nombreImagen, $carpeta);                                   
            }
           
            $alertas = $empleados->validar();
            if(empty($alertas)){
                if($_FILES['empleados']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                } 

                $empleados->guardar();  
                header("Location: /empleados?idclienteS=$empleados->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('empleados/actualizar', [
            'empleados' => $empleados,
            'alertas' => $alertas
        ]);
    }

}


?>
