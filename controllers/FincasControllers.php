<?php

// Controlador fincas

namespace Controllers;

use Model\Fincas;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\ClientesApp;

class FincasControllers{

    // FINCAS LISTADO
    public static function listado(Router $router){
        session_start();
        $idclienteS = $_GET['idclienteS'];
        $fincas = Fincas::all_find($idclienteS);
        $router->renderClientesConfiguracion('fincas/listado', [
            'fincas' => $fincas

        ]);
    }

    // FINCAS CREAR
    public static function crear(Router $router){
        session_start();
        $alertas = [];
        $fincas = new Fincas();
        $carpeta = CARPETA_IMAGEN_FINCAS;
        
        $idclienteS = $_GET['idclienteS'];
        $propietarios = ClientesApp::all_find($idclienteS);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Recibo los datos dentro de un option aqui los parto
            $fincas = $_POST['fincas'];
            $datos = $fincas['datos'];
            $cortes = explode(",", $datos);
            $fincas['idclienteapp'] = $cortes[0];
            $fincas['propietario'] = $cortes[1];
            
            //debuguear( $fincas['idclienteapp']);

            // Para crear un indice unico para tabla y cliente
            $autonumero = Fincas::autonumero('fincas', $idclienteS);

            $finca = new Fincas($fincas);
            $finca->autonumero = $autonumero;
                        
            // Creo un objeto con los datos añadidos despues de partirlos

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['fincas']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['fincas']['tmp_name']['imagen'])->resize(350, 250);
                $finca->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $finca->validar();
            if(empty($alertas)){
                $imagen->save($carpeta . $nombreImagen);    
                $finca->guardar();  
                header("Location: /fincas?idclienteS=$finca->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('fincas/crear', [
            'propietarios' => $propietarios,
            'fincas' => $finca

        ]);
        
    }

    // FINCAS ACTUALIZAR
    public static function actualizar(Router $router){
        session_start();
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_FINCAS;
       
        $idclienteS = $_GET['idclienteS'];
        $fincas = $_GET;

        $datos = $fincas['datos'];
        $cortes = explode(",", $datos);
        $fincas['idclienteapp'] = $cortes[0];
        $fincas['propietario'] = $cortes[1];

        $id = validar0Redireccionar('/fincas?idclienteS=$finca->idclienteS');
        
        $fincas = Fincas::find($id);
        $propietarios = ClientesApp::all_find($idclienteS);
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['fincas'];
            $fincas->sincronizar($args);

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['fincas']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['fincas']['tmp_name']['imagen'])->resize(350, 250);
                $fincas->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $fincas->validar();
            if(empty($alertas)){
                if($_FILES['fincas']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                }
                $fincas->guardar();  
                header("Location: /fincas?idclienteS=$fincas->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('fincas/actualizar', [
            'fincas' => $fincas,
            'alertas' => $alertas,
            'propietarios' => $propietarios
        ]);
    }

}


?>
