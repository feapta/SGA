<?php

// Controlador de paginas de los clientes

namespace Controllers;

use Model\ClientesApp;
use Model\Empleados;
use Model\Fincas;
use Model\Maquinas;
use Model\Partes;
use Model\Productos;
use Model\Trabajos;
use MVC\Router;

class ClienteSistemarControllers{

    public static function app(Router $router){
        session_start();
        $idclienteS = $_SESSION['id'];
        
        $par = new Partes();
        $cli = new ClientesApp();
        $fin = new Fincas();
        $maq = new Maquinas();
        $pro = new Productos();
        $emp = new Empleados();
        $tra = new Trabajos();
        

        $partes = $par->contar('partes', $idclienteS);
        $clientesApp = $cli->contar('clientesapp', $idclienteS);
        $fincas = $fin->contar('fincas', $idclienteS);
        $maquinas = $maq->contar('maquinas', $idclienteS);
        $productos = $pro->contar('productos', $idclienteS);
        $empleados = $emp->contar('empleados', $idclienteS);
        $trabajos = $tra->contar('trabajos', $idclienteS);

        $router->renderClientes('index', [
            'partes' => $partes,
            'clientesapp' => $clientesApp,
            'fincas' => $fincas,
            'maquinas' => $maquinas,
            'productos' => $productos,
            'empleados' => $empleados,
            'trabajos' => $trabajos
        ]);
    }


    public static function configuracion(Router $router){
        session_start();
        $idclienteS = $_SESSION['id'];

        $cli = new ClientesApp();
        $fin = new Fincas();
        $maq = new Maquinas();
        $pro = new Productos();
        $emp = new Empleados();
        $tra = new Trabajos();

        $clientesApp = $cli->contar('clientesapp', $idclienteS);
        $fincas = $fin->contar('fincas', $idclienteS);
        $maquinas = $maq->contar('maquinas', $idclienteS);
        $productos = $pro->contar('productos', $idclienteS);
        $empleados = $emp->contar('empleados', $idclienteS);
        $trabajos = $tra->contar('trabajos', $idclienteS);

        $router->renderClientesConfiguracion('index', [
            'clientesapp' => $clientesApp,
            'fincas' => $fincas,
            'maquinas' => $maquinas,
            'productos' => $productos,
            'empleados' => $empleados,
            'trabajos' => $trabajos
        ]);
    }


    public static function gestion(Router $router){
        session_start();
        $idclienteS = $_SESSION['id'];

        $par = new Partes();

        $partes = $par->contar('partes', $idclienteS);

        $router->renderClientesGestion('/index', [
            'partes' => $partes
        ]);
    }


}

?>