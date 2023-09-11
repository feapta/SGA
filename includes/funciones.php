<?php

define('TEMPLATES_URL', __DIR__ . 'templates');        // Super global de php para que busque la ruta al archivo
define('FUNCIONES_URL',  __DIR__ . 'funciones.php');

define('CARPETA_IMAGEN_CLIENTES', $_SERVER['DOCUMENT_ROOT']. '/imagenesClientes/');
define('CARPETA_IMAGEN_MAQUINAS', $_SERVER['DOCUMENT_ROOT']. '/imagenesMaquinas/');
define('CARPETA_IMAGEN_FINCAS', $_SERVER['DOCUMENT_ROOT']. '/imagenesFincas/');
define('CARPETA_IMAGEN_CLIENTESAPP', $_SERVER['DOCUMENT_ROOT']. '/imagenesClientesApp/');
define('CARPETA_IMAGEN_PRODUCTOS', $_SERVER['DOCUMENT_ROOT']. '/imagenesProductos/');
define('CARPETA_IMAGEN_EMPLEADOS', $_SERVER['DOCUMENT_ROOT']. '/imagenesEmpleados/');
define('CARPETA_IMAGEN_TRABAJOS', $_SERVER['DOCUMENT_ROOT']. '/imagenesTrabajos/');



function incluirTemplate(string $nombre, bool $inicio = false ){
    include TEMPLATES_URL . "/{$nombre}.php";
};

function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function debug($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

// Escapa el HTML sanitizar los datos recibidos
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Función que revisa que el usuario este autenticado
function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

// Para proteger el panel de control o administracion
function isAdmin() : void {
    if(!isset($_SESSION['admin'])) {
        header('Location: /');
    }
}

function validar0Redireccionar(string $url){
    // Validar ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: $url");
    }
    return $id;
}

// Valida el contenido para eliminar para saber de que tabla deseamos eliminar video 387
function validarTipoContenido($tipo) {
    $tipos = ['clienteSistemar', 'maquinas', 'fincas', 'clientesApp', 'fito', 'empleados', 'trabajos', 'partes'];

    return in_array($tipo, $tipos);
}


?>