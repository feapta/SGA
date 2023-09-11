<?php

// Controlador de paginas de los clientes

namespace Controllers;

use Model\Maquinas;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class MaquinasControllers{

    // MAQUINAS LISTADO
    public static function listado(Router $router){
        session_start();
        $idclienteS = $_GET['idclienteS'];
        $maquinas = Maquinas::all_find($idclienteS);
        
        $router->renderClientesConfiguracion('maquinas/listado', [
            'maquinas' => $maquinas
        ]);
    }

    // MAQUINAS CREAR
    public static function crear(Router $router){
        session_start();
        $alertas = [];
        $maquina = new Maquinas();
        $carpeta = CARPETA_IMAGEN_MAQUINAS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idclienteS = $_POST['maquinas']['idclientesistemar'];
            $maquinas = ($_POST['maquinas']);

            $autonumero = Maquinas::autonumero('maquinas', $idclienteS);

            $maquina = new Maquinas($maquinas);
            $maquina->autonumero = $autonumero;

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['maquinas']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['maquinas']['tmp_name']['imagen'])->resize(350, 250);
                $maquina->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $maquina->validar();
            if(empty($alertas)){
                $imagen->save($carpeta . $nombreImagen);    
                $maquina->guardar();  
                header("Location: /maquinas?idclienteS=$maquina->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('maquinas/crear', [

        ]);
        
    }

    // MAQUINAS ACTUALIZAR
    public static function actualizar(Router $router){
        session_start();
        $id = validar0Redireccionar('/admin');
        $carpeta = CARPETA_IMAGEN_MAQUINAS;
        $maquina = Maquinas::find($id);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['maquinas'];
            $maquina->sincronizar($args);
            $alertas = $maquina->validar();

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['maquinas']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['maquinas']['tmp_name']['imagen'])->resize(350, 250);
                $maquina->setImagen($nombreImagen, $carpeta);                                   
            }
           
            $alertas = $maquina->validar();
            if(empty($alertas)){
                if($_FILES['maquinas']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                } 

                $maquina->guardar();  
                header("Location: /maquinas?idcliente=$maquina->idcliente");
            }
        }

        $router->renderClientesConfiguracion('maquinas/actualizar', [
            'maquinas' => $maquina,
            'alertas' => $alertas
        ]);
    }

}

?>
