<?php

// Controlador trabajos

namespace Controllers;

use Model\Trabajos;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class TrabajosControllers{

    // trabajos LISTADO
    public static function listado(Router $router){
        session_start();
        $idclienteS = $_GET['idclienteS'];
        $trabajos = Trabajos::all_find($idclienteS);
        
        $router->renderClientesConfiguracion('trabajos/listado', [
            'trabajos' => $trabajos

        ]);
    }

    // trabajos CREAR
    public static function crear(Router $router){
        session_start();
        $alertas = [];
        $trabajos = new Trabajos();
        $carpeta = CARPETA_IMAGEN_TRABAJOS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idclienteS = $_POST['trabajos']['idclientesistemar'];
            $trabajos = ($_POST['trabajos']);

            $autonumero = Trabajos::autonumero('trabajos', $idclienteS);
            
            $trabajo = new Trabajos($trabajos);
            $trabajo->autonumero = $autonumero;

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['trabajos']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['trabajos']['tmp_name']['imagen'])->resize(350, 250);
                $trabajo->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $trabajo->validar();
            if(empty($alertas)){
                $imagen->save($carpeta . $nombreImagen);    
                $trabajo->guardar();  
                header("Location: /trabajos?idclienteS=$trabajo->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('trabajos/crear', [

        ]);
        
    }

    // trabajos ACTUALIZAR
    public static function actualizar(Router $router){
        session_start();
        
        $id = validar0Redireccionar('/admin');
        $carpeta = CARPETA_IMAGEN_TRABAJOS;
        $trabajos = Trabajos::find($id);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['trabajos'];
            $trabajos->sincronizar($args);
            $alertas = $trabajos->validar();

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['trabajos']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['trabajos']['tmp_name']['imagen'])->resize(350, 250);
                $trabajos->setImagen($nombreImagen, $carpeta);                                   
            }
           
            $alertas = $trabajos->validar();
            if(empty($alertas)){
                if($_FILES['trabajos']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                } 

                $trabajos->guardar();  
                header("Location: /trabajos?idclienteS=$trabajos->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('trabajos/actualizar', [
            'trabajos' => $trabajos,
            'alertas' => $alertas
        ]);
    }

}


?>
