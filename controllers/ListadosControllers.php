<?php

// Administracion controllers

namespace Controllers;

use Model\ClientesApp;
use Model\Empleados;
use Model\Fincas;
use MVC\Router;

class ListadosControllers{

    // Listado de partes de trabajo
    public static function listados(Router $router){
        session_start();
        $orden = 'DESC';
        $id = $_GET['idclienteS'];

        $clientes = ClientesApp::all_find($id);
        $empleados = Empleados::all_find($id);

        $router->renderClientesGestion('listados/listados', [
            'orden' => $orden,
            'clientes' => $clientes,
            'empleados' => $empleados
        ]);
    }

    // Resultados de la busqueda de los partes selecionados
    public static function consultasPartes(){
    session_start();
    $consulta = $_POST;
   
    //debuguear($_POST);
    $clientesistemar = $consulta['partes']['idclientesistemar'];
    $fechainicio = $consulta['partes']['fechainicio'] ?? null;
    $fechafin = $consulta['partes']['fechafin'] ?? null;
    $clienteapp = $consulta['partes']['clientesApp'] ?? null;
    $fincas = $consulta['partes']['fincas'] ?? null;
    $empleados = $consulta['partes']['empleados'] ?? null;
    $numeroRegistros = $consulta['partes']['numeroRegistros'] ?? null;
    $orden = $consulta['partes']['orden'] ?? null;

    debuguear($consulta);

    }
 



   public static function consultasGatos(){
    $consulta = $_POST;

    debuguear($consulta);

   }
}

?>