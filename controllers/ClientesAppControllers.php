<?php

// Controlador ClientesApp

namespace Controllers;

use Model\ClientesApp;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Fincas;

class ClientesAppControllers{

    // CLIENTESAPP LISTADO
    public static function listado(Router $router){
        session_start();
        $idclientesistemar = $_GET['idclienteS'];

        $clientesApp = ClientesApp::all_find($idclientesistemar);
      
        $router->renderClientesConfiguracion('clientesApp/listado', [
            'clientesApp' => $clientesApp

        ]);
    }
    public static function listadocompleto(Router $router){
        session_start();
        $id = $_GET['id'];

        $clientesApp = ClientesApp::find($id);
        $fincas = Fincas::all_find_clienteapp($id);

        $router->renderClientesConfiguracion('clientesApp/listadocompleto', [
            'clientesApp' => $clientesApp,
            'fincas' => $fincas

        ]);
    }

    // CLIENTESAPP CREAR
    public static function crear(Router $router){
        session_start();
        $alertas = [];
        $clientesApp = new ClientesApp();
        $carpeta = CARPETA_IMAGEN_CLIENTESAPP;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idclienteS = $_POST['clientesApp']['idclientesistemar'];
            $autonumero = ClientesApp::autonumero('clientesapp', $idclienteS);

            $clientesApp = new ClientesApp($_POST['clientesApp']);
            $clientesApp->autonumero = $autonumero;

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['clientesApp']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['clientesApp']['tmp_name']['imagen'])->resize(350, 250);
                $clientesApp->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $clientesApp->validar();
            if(empty($alertas)){
                $imagen->save($carpeta . $nombreImagen);    
                $clientesApp->guardar();  
                header("Location: /clientesApp?idclienteS=$clientesApp->idclientesistemar");
            }
        }
        $alertas = ClientesApp::getAlertas();
        $router->renderClientesConfiguracion('clientesApp/crear', [
            'alertas' => $alertas
        ]);
        
    }

    // ClientesApp ACTUALIZAR
    public static function actualizar(Router $router){
        session_start();
        $id = validar0Redireccionar('/clientesApp?idcliente=$clientesApp->idcliente');
        $carpeta = CARPETA_IMAGEN_CLIENTESAPP;
        $clientesApp = ClientesApp::find($id);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['clientesApp'];
            $clientesApp->sincronizar($args);
            
           
            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['clientesApp']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['clientesApp']['tmp_name']['imagen'])->resize(350, 250);
                $clientesApp->setImagen($nombreImagen, $carpeta);                                   
            }
            $alertas = $clientesApp->validar();
            if(empty($alertas)){
                if($_FILES['clientesApp']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                }

                $clientesApp->guardar();  
                header("Location: /clientesApp?idclienteS=$clientesApp->idclientesistemar");
            }

        }

        $alertas = ClientesApp::getAlertas();

        $router->renderClientesConfiguracion('clientesApp/actualizar', [
            'clientesApp' => $clientesApp,
            'alertas' => $alertas
        ]);
    }

}


?>
