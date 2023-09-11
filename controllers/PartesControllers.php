<?php

// Controlador partes

namespace Controllers;

use Model\ActiveRecord;

use Classes\Paginacion;
use Model\Fincas;
use Model\Partes;
use Model\PartesTrabajos;
use MVC\Router;

class PartesControllers{

    // partes LISTADO
    public static function listado(Router $router){
        session_start();
        $idclienteS = $_GET['idclienteS'] ?? $_POST['partes']['idclienteS'];
        $fechainicio = $_POST['partes']['fechainicio'] ?? date('Y-m-01');
        $fechafin = $_POST['partes']['fechafin'] ?? date('Y-m-d');
        $limite = $_POST['partes']['numeroRegistros'] ?? 10;
        $orden = $_POST['partes']['orden'] ?? 'DESC';

        // Paginacion
        $pagina_actual = $_GET['page'];
            $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
            if(!$pagina_actual || $pagina_actual < 1){
                header("Location: /partes?idclienteS=$idclienteS&page=1");
            }

        $total_registros = Partes::contar_registros_fechas( $fechainicio, $fechafin);
        $registros_por_pagina = $limite;
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros, $idclienteS);
        $offset = $paginacion->offset();

           
        if($total_registros < 1){

            $alertas = 'No hay registros para mostrar';

        } else {
            $consulta = " SELECT clientesapp.id AS idclienteapp, clientesapp.nombre AS nombre, clientesapp.apellidos AS apellidos, ";
            $consulta .= "fincas.nombre AS finca, ";
            $consulta .= "partes.autonumero AS autonumero, ";
            $consulta .= "partes.id AS idparte, partes.fecha AS fecha, partes.creada AS fechaHecho FROM partes ";
            $consulta .= "LEFT JOIN clientesapp ON clientesapp.id = partes.idclienteapp ";
            $consulta .= "LEFT JOIN fincas ON fincas.id = partes.idfinca ";
            $consulta .= "WHERE partes.fecha >= '$fechainicio' AND partes.fecha <= '$fechafin' ";
            $consulta .= "AND partes.idclientesistemar = '$idclienteS' ";
            $consulta .= "ORDER BY partes.autonumero $orden ";
            $consulta .= "LIMIT $registros_por_pagina ";
            $consulta .= "OFFSET $offset";

            $nombrepartes =  ActiveRecord::SQL_directa($consulta);
        }

        $router->renderClientesGestion('partes/listado', [
            'nombrepartes' => $nombrepartes,
            'fechainicio' => $fechainicio,
            'fechafin' => $fechafin,
            'limite' => $registros_por_pagina,
            'orden' => $orden,
            'paginacion' => $paginacion->paginacion(),
            'cuenta' => $total_registros
        ]);
    }

    // Ver mas
    public static function vermas(Router $router){
        session_start();
        $idparte = $_GET['idparte'];

        $consultaUno = " SELECT clientesapp.nombre AS nombre, clientesapp.apellidos AS apellidos, ";
        $consultaUno .= "fincas.nombre AS finca, ";
        $consultaUno .= "partes.id AS idparte, partes.autonumero AS autonumero, ";
        $consultaUno .= "partes.fecha AS fecha, partes.creada FROM partes ";
        $consultaUno .= "LEFT JOIN clientesapp ON clientesapp.id = partes.idclienteapp ";
        $consultaUno .= "LEFT JOIN fincas ON fincas.id = partes.idfinca ";
        $consultaUno .= "WHERE partes.id = $idparte";
        
        $nombrepartes =  ActiveRecord::SQL_directa($consultaUno);

        $consultaDos = " SELECT empleados.nombre AS empleados, empleados.apellidos AS apellidos, ";
        $consultaDos .= "trabajos.nombre AS trabajos, ";
        $consultaDos .= "maquinas.nombre AS maquinas, ";
        $consultaDos .= "productos.nombre AS productos, ";                                          
        $consultaDos .= "partestrabajos.horastrabajo AS horastrabajo, partestrabajos.horasmaquina AS horasmaquina, ";
        $consultaDos .= "partestrabajos.cantpro AS cantidadproductos, partestrabajos.id AS idpartestrabajos ";
        $consultaDos .= "FROM partestrabajos ";
        $consultaDos .= "LEFT JOIN trabajos ON trabajos.id = partestrabajos.idtrabajo ";
        $consultaDos .= "LEFT JOIN empleados ON empleados.id = partestrabajos.idempleado ";
        $consultaDos .= "LEFT JOIN maquinas ON maquinas.id = partestrabajos.idmaquina ";
        $consultaDos .= "LEFT JOIN productos ON productos.id = partestrabajos.idproducto ";	
        $consultaDos .= "WHERE partestrabajos.idparte = $idparte";	
            
        $nombrepartestrabajos =  ActiveRecord::SQL_directa($consultaDos);

        $router->renderClientesGestion('partes/vermas', [
            'partes' => $nombrepartes,
            'trabajos' => $nombrepartestrabajos
        ]);
    }

    // Crear
    public static function crear(Router $router){
        session_start();
        $router->renderClientesGestion('partes/crear');  
    }

    // Select
    public static function datos(){
        $arrayJson = [];
        $idclienteS = $_POST['idclienteS'];

        $clientesapp = "SELECT id AS idclienteapp, CONCAT (nombre, ' ', apellidos) AS nombrecliente FROM clientesapp WHERE idclientesistemar = $idclienteS";
        $empleados = "SELECT id AS idempleados, CONCAT (nombre, ' ', apellidos) AS nombreempleados FROM empleados WHERE idclientesistemar = $idclienteS";
        $trabajos = "SELECT id AS idtrabajos, nombre AS nombretrabajos FROM trabajos WHERE idclientesistemar = $idclienteS";
        $maquinas = "SELECT id AS idmaquinas, nombre AS nombremaquinas FROM maquinas WHERE idclientesistemar = $idclienteS";
        $productos = "SELECT id AS idproductos, nombre AS nombreproductos FROM productos WHERE idclientesistemar = $idclienteS";

        $clien = ActiveRecord::SQL_directa($clientesapp);
        $emple = ActiveRecord::SQL_directa($empleados);
        $traba = ActiveRecord::SQL_directa($trabajos);
        $maqui = ActiveRecord::SQL_directa($maquinas);
        $produ = ActiveRecord::SQL_directa($productos);

        array_push($arrayJson, $clien);
        array_push($arrayJson, $emple);
        array_push($arrayJson, $traba);
        array_push($arrayJson, $maqui);
        array_push($arrayJson, $produ);

        echo json_encode($arrayJson);
    }

    //Select de fincas
    public static function fincas(){
        $idclienteapp = $_POST['idclienteapp'];
        $fincas = Fincas::all_fincas($idclienteapp);
        echo json_encode($fincas);
    }

    // Actualizar
    public static function editar(Router $router){
        session_start();
        $router->renderClientesGestion('partes/editar');
    }
    public static function edicion(){
        session_start();
        $idparte = $_POST['idparte'];
        $idclienteS = $_POST['idclienteS'];
        $arrayJson = [];
        
        $consultaUno = " SELECT clientesapp.id AS idclienteapp, CONCAT (clientesapp.nombre, ' ', clientesapp.apellidos) AS nombreclienteapp, ";
        $consultaUno .= "fincas.id AS idfinca, fincas.nombre AS finca, ";
        $consultaUno .= "partes.id AS idparte, partes.autonumero AS autonumero, ";
        $consultaUno .= "partes.fecha AS fecha, partes.creada ";
        $consultaUno .= "FROM partes ";
        $consultaUno .= "LEFT JOIN clientesapp ON clientesapp.id = partes.idclienteapp ";
	    $consultaUno .= "LEFT JOIN fincas ON fincas.id = partes.idfinca ";
	    $consultaUno .= "WHERE partes.id = $idparte";
        
        $nombrepartes =  ActiveRecord::SQL_directa($consultaUno);

        $consultaDos = " SELECT empleados.id AS idempleado, CONCAT (empleados.nombre, ' ', empleados.apellidos) AS nombre, ";
        $consultaDos .= "trabajos.id AS idtrabajo, trabajos.nombre AS trabajos, ";
        $consultaDos .= "maquinas.id AS idmaquina, maquinas.nombre AS maquinas, ";
        $consultaDos .= "productos.id AS idproducto, productos.nombre AS productos, ";                                          
        $consultaDos .= "partestrabajos.horastrabajo AS horastrabajo, partestrabajos.horasmaquina AS horasmaquina, ";
        $consultaDos .= "partestrabajos.cantpro AS cantidadproducto, ";
        $consultaDos .= "partestrabajos.id AS id, partestrabajos.idparte AS idparte, partestrabajos.indicefila ";
        $consultaDos .= "FROM partestrabajos ";
        $consultaDos .= "LEFT JOIN trabajos ON trabajos.id = partestrabajos.idtrabajo ";
        $consultaDos .= "LEFT JOIN empleados ON empleados.id = partestrabajos.idempleado ";
        $consultaDos .= "LEFT JOIN maquinas ON maquinas.id = partestrabajos.idmaquina ";
		$consultaDos .= "LEFT JOIN productos ON productos.id = partestrabajos.idproducto ";	
		$consultaDos .= "WHERE partestrabajos.idparte = $idparte";	
			
        $nombrepartestrabajos =  ActiveRecord::SQL_directa($consultaDos);

        $clienteapp = "SELECT id AS idclienteapp, CONCAT (nombre, ' ', apellidos) AS nombrecliente FROM clientesapp WHERE idclientesistemar = $idclienteS";
        $empleados = "SELECT id AS idempleados, CONCAT (nombre, ' ', apellidos) AS nombreempleados FROM empleados WHERE idclientesistemar = $idclienteS";
        $trabajos = "SELECT id AS idtrabajos, nombre AS nombretrabajos FROM trabajos WHERE idclientesistemar = $idclienteS";
        $maquinas = "SELECT id AS idmaquinas, nombre AS nombremaquinas FROM maquinas WHERE idclientesistemar = $idclienteS";
        $productos = "SELECT id AS idproductos, nombre AS nombreproductos FROM productos WHERE idclientesistemar = $idclienteS";

        $clientesapp = ActiveRecord::SQL_directa($clienteapp);
        $emple = ActiveRecord::SQL_directa($empleados);
        $traba = ActiveRecord::SQL_directa($trabajos);
        $maqui = ActiveRecord::SQL_directa($maquinas);
        $produ = ActiveRecord::SQL_directa($productos);

        array_push($arrayJson, $nombrepartes);
        array_push($arrayJson, $nombrepartestrabajos);
        array_push($arrayJson, $clientesapp);
        array_push($arrayJson, $emple);
        array_push($arrayJson, $traba);
        array_push($arrayJson, $maqui);
        array_push($arrayJson, $produ);

        echo json_encode($arrayJson);
    }


    // Guardar el parte
    public static function guardar(){
        $partes = $_POST;
        $idclienteS = $partes['idclientesistemar'];
        $seccion = json_decode($partes['trabajos'], true);
        $id = $partes['id'];

        // Si es un parte nuevo genera un autonumero
        if (!$id){
            $autonumero = Partes::autonumero($idclienteS);
            $parte = new Partes($partes);
            $parte->autonumero = $autonumero;
        } else {
            $parte = new Partes($partes);
            // Elimina las filas que halla que eliminar
            $filasEliminadas = PartesTrabajos::comprobarFilas($seccion);
        }
      
        // Comprueba que la cabecera traiga los datos correctos
        $alertas = $parte->validarNuevoParte();

        // Si no hay alertas guarda los datos
        if(empty($alertas)){
            // Guarda los datos de la cabecera del parte
            $resultado = $parte->guardar();

            if ($resultado){
                // Guarda los datos de cada fila de la tabla con los trabajos
                for ($i = 0; $i < count($seccion); $i++){
                    $seccionPartes = new PartesTrabajos();
                        $seccionPartes->id = $seccion[$i]['id'] ? : NULL;
                        $seccionPartes->idparte = $resultado['id'] ? : $seccion[$i]['idparte'];;
                        $seccionPartes->indicefila = $seccion[$i]['indicefila'];
                        $seccionPartes->idempleado = $seccion[$i]['idempleado'];
                        $seccionPartes->idtrabajo = $seccion[$i]['idtrabajo'] ? : 'NULL';
                        $seccionPartes->horastrabajo = $seccion[$i]['horastrabajo'] ? : ' NULL';
                        $seccionPartes->idmaquina = $seccion[$i]['idmaquina'] ? : 'NULL';
                        $seccionPartes->horasmaquina = $seccion[$i]['horasmaquina'] ? : 'NULL';
                        $seccionPartes->idproducto = $seccion[$i]['idproducto'] ? : 'NULL';
                        $seccionPartes->cantpro = $seccion[$i]['cantpro'] ? : 'NULL';
                    $seccionPartes->guardarParte();
                }
            }
            echo json_encode("ok");
        }
    }

    // Eliminar
    public static function eliminar(){
        $idparte = $_POST['idparte'];

        $parte = Partes::find($idparte);
        $partes = PartesTrabajos::all_id($idparte);
        
        if (empty($partes)){
            $resultadoCabecera = $parte->eliminar_partes('partes', 'id', $idparte);
            if($resultadoCabecera){
                echo json_encode("ok");
            }
            
        } else {
            foreach($partes as $parte){
                $resultado = $parte->eliminar_partes('partestrabajos', 'idparte', $idparte);
             }
             if($resultado){
                 $resultadoCabecera = $parte->eliminar_partes('partes', 'id', $idparte);
             }
             if($resultadoCabecera){
                 echo json_encode("ok");
             }
        }
      
    }
} 