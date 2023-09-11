<?php

// Controlador Productos

namespace Controllers;

use Model\Productos;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class ProductosControllers{

    // Productos LISTADO
    public static function listado(Router $router){
        session_start();
        $idclienteS = $_GET['idclienteS'];
        $productos = Productos::all_find($idclienteS);
        
        $router->renderClientesConfiguracion('productos/listado', [
            'productos' => $productos

        ]);
    }

    // Productos CREAR
    public static function crear(Router $router){
        session_start();
        $alertas = [];
        $productos = new Productos();
        $carpeta = CARPETA_IMAGEN_PRODUCTOS;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $idclienteS = $_POST['productos']['idclientesistemar'];
            $productos = ($_POST['productos']);

            $autonumero = Productos::autonumero('productos', $idclienteS);
            
            $producto = new Productos($productos);
            $producto->autonumero = $autonumero;

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['productos']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['productos']['tmp_name']['imagen'])->resize(350, 250);
                $producto->setImagen($nombreImagen, $carpeta);                                   
            }

            $alertas = $producto->validar();
            if(empty($alertas)){
                $imagen->save($carpeta . $nombreImagen);    
                $producto->guardar();  
                header("Location: /productos?idclienteS=$producto->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('productos/crear', [

        ]);
        
    }

    // Productos ACTUALIZAR
    public static function actualizar(Router $router){
        session_start();
        $id = validar0Redireccionar(' /productos?idcliente=$productos->idcliente');
        $carpeta = CARPETA_IMAGEN_PRODUCTOS;
        $productos = Productos::find($id);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['productos'];
            $productos->sincronizar($args);

            $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //            
            if($_FILES['productos']['tmp_name']['imagen']){
                $imagen = Image::make($_FILES['productos']['tmp_name']['imagen'])->resize(350, 250);
                $productos->setImagen($nombreImagen, $carpeta);                                   
            }
           
            $alertas = $productos->validar();
            if(empty($alertas)){
                if($_FILES['productos']['tmp_name']['imagen']){
                    $imagen->save($carpeta . $nombreImagen);
                }
                $productos->guardar();  
                header("Location: /productos?idclienteS=$productos->idclientesistemar");
            }
        }

        $router->renderClientesConfiguracion('productos/actualizar', [
            'productos' => $productos,
            'alertas' => $alertas
        ]);
    }

}


?>
