<?php

// Administracion controllers

namespace Controllers;

use Model\ClienteSistemar;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class AdminControllers{

    public static function dashboard(Router $router){
         $router->renderDash('/index',[]);
    }
    
    // Listar clientes
    public static function clientesListado(Router $router){  
        $router->renderDash('clientes/listado');
    }
    public static function clientesListado_P(){
        $clientes = ClienteSistemar::all();

        foreach($clientes as $data){
            $json['data'][] = $data;
            }
    
            $jsonstring = json_encode($json);
            echo $jsonstring; 
    }
    
    // Ver datos clientes
    public static function clientesVer(Router $router){
        $id = validar0Redireccionar('/clientes/listado');  
        $clientes = ClienteSistemar::find($id);

        $router->renderDash('/clientes/ver', [
            'clientes' => $clientes,
        ]);
    }
    // Actualizar datos clientes
    public static function clientesActualizar(Router $router){
        $id = validar0Redireccionar('/clientes/listado');
        $clientes = ClienteSistemar::find($id);

        $alertas = [];
        $carpeta = CARPETA_IMAGEN_CLIENTES;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['clientes'];
            $clientes->sincronizar($args);

            $alertas = $clientes->validar();
    
            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; // 
            
            if($_FILES['clientes']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['clientes']['tmp_name']['imagen'])->resize(350, 250);
                $clientes->setImagen($nombreImagen,  $carpeta);                                   
            }

            if(empty($alertas)){
                if($_FILES['clientes']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                }
                
                $clientes->guardar();
                header('Location: /clientes/listado');
            }
        }

        $router->renderDash('/clientes/actualizar', [
            'clientes' => $clientes,
            'alertas' => $alertas
        ]);
    }
}

?>