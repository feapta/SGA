<?php

// Pagina de inicio

namespace Controllers;
use MVC\Router;
use Model\Informacion;

class PaginasControllers{

    public static function index(Router $router){
        session_start();

        $_SESSION = [];
        $router->render('paginas/index', [

        ]);
    }
    public static function contacto(Router $router){

         
         $router->render('/paginas/contacto', [

         ]);
    }
    public static function nosotros(Router $router){


        $router->render('paginas/nosotros', [

        ]);
    }
    public static function precios(Router $router){


        $router->render('paginas/precios', [

        ]);
    }
    public static function demo(Router $router){
 

        $router->render('paginas/demo', [

        ]);
    }
    public static function informacion(Router $router){
        $informacion = new Informacion();
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $informacion = new Informacion($_POST['informacion']);
 
            $informacion->sincronizar($_POST);
            
            if(empty($alertas)){                                        // Si no hay alerta
            
                $resultado = $informacion->guardar();                                                  // Crear usuario

                if($resultado){
                    header("Location: /informacion/mensaje");
                }
            }
        }

        $router->render('paginas/informacion', [
            'informacion' => $informacion,
            'alertas' => $alertas
        ]);
    }
    public static function mensaje(Router $router){
        $inicio = false;

        $router->render('paginas/mensaje', [
            'inicio' => $inicio,
        ]);
    }

}
?>