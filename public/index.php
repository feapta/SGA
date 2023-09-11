<?php 

// Pagina public/index.php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\GeneralControllers;
use Controllers\PaginasControllers;
use Controllers\AccesoControllers;
use Controllers\ClienteSistemarControllers;
use Controllers\ClientesAppControllers;
use Controllers\FincasControllers;
use Controllers\MaquinasControllers;
use Controllers\ProductosControllers;
use Controllers\EmpleadosControllers;
use Controllers\TrabajosControllers;
use Controllers\PartesControllers;
use Controllers\AdminControllers;
use Controllers\ListadosControllers;

$router = new Router();

// Funciones generales
$router->post('/eliminar',[GeneralControllers::class, 'eliminar']);


// Paginas
$router->get('/', [PaginasControllers::class, 'index']);
$router->get('/contacto', [PaginasControllers::class, 'contacto']);
$router->get('/nosotros', [PaginasControllers::class, 'nosotros']);

$router->get('/precios', [PaginasControllers::class, 'precios']);
$router->get('/demo', [PaginasControllers::class, 'demo']);

$router->get('/informacion', [PaginasControllers::class, 'informacion']);  
$router->post('/informacion', [PaginasControllers::class, 'informacion']);  
$router->get('/informacion/mensaje', [PaginasControllers::class, 'mensaje']);  

// Acceso
$router->get('/acceso', [AccesoControllers::class, 'acceso']);
$router->post('/acceso', [AccesoControllers::class, 'acceso']);

$router->get('/acceso/mensaje', [AccesoControllers::class, 'mensaje']);  
$router->get('/acceso/confirmar', [AccesoControllers::class, 'confirmar']);  

$router->get('/acceso/compra', [AccesoControllers::class, 'compra']);   
$router->post('/acceso/compra', [AccesoControllers::class, 'compra']);  

$router->get('/acceso/actualizar', [AccesoControllers::class, 'actualizar']);  
$router->post('/acceso/actualizar', [AccesoControllers::class, 'actualizar']);

$router->get('/acceso/olvidado', [AccesoControllers::class, 'olvidado']);  
$router->post('/acceso/olvidado', [AccesoControllers::class, 'olvidado']); 

$router->get('/acceso/recuperar', [AccesoControllers::class, 'recuperar']);  
$router->post('/acceso/recuperar', [AccesoControllers::class, 'recuperar']);  

$router->get('/acceso/logout', [AccesoControllers::class, 'logout']);  


// ADMINISTRACION
$router->get('/dashboard', [AdminControllers::class, 'dashboard']);  
$router->get('/clientes/listado', [AdminControllers::class, 'clientesListado']);  
$router->post('/clientes/listado_P', [AdminControllers::class, 'clientesListado_P']);  

$router->get('/clientes/ver', [AdminControllers::class, 'clientesver']);

$router->get('/clientes/actualizar', [AdminControllers::class, 'clientesActualizar']);
$router->post('/clientes/actualizar', [AdminControllers::class, 'clientesActualizar']);  



// ZONA CLIENTES SISTEMAR 
$router->get('/app',[ClienteSistemarControllers::class, 'app']);
$router->get('/configuracion',[ClienteSistemarControllers::class, 'configuracion']);
$router->get('/gestion',[ClienteSistemarControllers::class, 'gestion']);



// CONFIGURACION  APP

// Clientes App
$router->get('/clientesApp',[ClientesAppControllers::class, 'listado']);
$router->get('/clientesApp/completo',[ClientesAppControllers::class, 'listadocompleto']);

$router->get('/clientesApp/crear',[ClientesAppControllers::class, 'crear']);
$router->post('/clientesApp/crear',[ClientesAppControllers::class, 'crear']);

$router->get('/clientesApp/actualizar',[ClientesAppControllers::class, 'actualizar']);
$router->post('/clientesApp/actualizar',[ClientesAppControllers::class, 'actualizar']);

// Fincas
$router->get('/fincas',[FincasControllers::class, 'listado']);

$router->get('/fincas/crear',[FincasControllers::class, 'crear']);
$router->post('/fincas/crear',[FincasControllers::class, 'crear']);

$router->get('/fincas/actualizar',[FincasControllers::class, 'actualizar']);
$router->post('/fincas/actualizar',[FincasControllers::class, 'actualizar']);


// Maquinas
$router->get('/maquinas',[MaquinasControllers::class, 'listado']);

$router->get('/maquinas/crear',[MaquinasControllers::class, 'crear']);
$router->post('/maquinas/crear',[MaquinasControllers::class, 'crear']);

$router->get('/maquinas/actualizar',[MaquinasControllers::class, 'actualizar']);
$router->post('/maquinas/actualizar',[MaquinasControllers::class, 'actualizar']);

// Productos
$router->get('/productos',[ProductosControllers::class, 'listado']);

$router->get('/productos/crear',[ProductosControllers::class, 'crear']);
$router->post('/productos/crear',[ProductosControllers::class, 'crear']);

$router->get('/productos/actualizar',[ProductosControllers::class, 'actualizar']);
$router->post('/productos/actualizar',[ProductosControllers::class, 'actualizar']);

// Empleados
$router->get('/empleados',[EmpleadosControllers::class, 'listado']);
$router->get('/empleados/completo',[EmpleadosControllers::class, 'listadocompleto']);

$router->get('/empleados/crear',[EmpleadosControllers::class, 'crear']);
$router->post('/empleados/crear',[EmpleadosControllers::class, 'crear']);

$router->get('/empleados/actualizar',[EmpleadosControllers::class, 'actualizar']);
$router->post('/empleados/actualizar',[EmpleadosControllers::class, 'actualizar']);

// Trabajos
$router->get('/trabajos',[TrabajosControllers::class, 'listado']);

$router->get('/trabajos/crear',[TrabajosControllers::class, 'crear']);
$router->post('/trabajos/crear',[TrabajosControllers::class, 'crear']);

$router->get('/trabajos/actualizar',[TrabajosControllers::class, 'actualizar']);
$router->post('/trabajos/actualizar',[TrabajosControllers::class, 'actualizar']);



// GESTION

// Partes de trabajo
$router->get('/partes',[PartesControllers::class, 'listado']);
$router->post('/partes',[PartesControllers::class, 'listado']);

$router->get('/partes/crear',[PartesControllers::class, 'crear']);
$router->get('/partes/vermas',[PartesControllers::class, 'vermas']);
$router->post('/partes/guardar',[PartesControllers::class, 'guardar']);

$router->post('/partes/fincas',[PartesControllers::class, 'fincas']);
$router->post('/partes/datos',[PartesControllers::class, 'datos']);

$router->get('/partes/actualizar',[PartesControllers::class, 'editar']);
$router->post('/partes/actualizar',[PartesControllers::class, 'editar']);

$router->post('/partes/edicion',[PartesControllers::class, 'edicion']);

$router->post('/partes/eliminar',[PartesControllers::class, 'eliminar']);


// Listados
$router->get('/listados',[ListadosControllers::class, 'listados']);
$router->post('/listados/listadosPartes',[ListadosControllers::class, 'consultasPartes']);
$router->post('/listados/listadosGastos',[ListadosControllers::class, 'consultasGastos']);



$router->comprobarRutas();

?>