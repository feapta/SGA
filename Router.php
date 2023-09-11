<?php

namespace MVC;

class Router {

    public array $getRoutes = [];
    public array $postRoutes = [];

    // GET
    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    // POST
    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    // Comprobar rutas
    public function comprobarRutas() {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        //$urlActual = explode('?', $_SERVER['REQUEST_URI'], 2) ?? '/';     Cambiar cuando se despliega
        $method = $_SERVER['REQUEST_METHOD'];

      if ($method === 'GET') {
          $fn = $this->getRoutes[$urlActual] ?? null;
      } else {
          $fn = $this->postRoutes[$urlActual] ?? null;
      }

      if ( $fn ) {                                      // Call user fn va a llamar una función cuando no sabemos cual sera
          call_user_func($fn, $this);                   // This es para pasar argumentos
      } else {
          echo "Página no encontrada o ruta no valida";
      }
    }

    // Muestra las paginas
    public function render($view, $datos = []){
        foreach ($datos as $key => $value) {
            $$key = $value;  
        }

        ob_start();                                     // Almacenamiento en memoria durante un momento...
        include_once __DIR__ . "/views/$view.php";      // entonces incluimos la vista en la pagina master
        $contenido = ob_get_clean();                    // Limpia el Buffer
        include_once __DIR__ . '/views/master.php';     // Pagina maestra que muestra el contenido de la variable contenido
    }

    // Muestra las paginas del dashboard
    public function renderDash($view, $datos = []){
        foreach ($datos as $key => $value) {
            $$key = $value;  
        }

        ob_start();                                     
        include_once __DIR__ . "/views/admin/$view.php";          
        $contenidoDash = ob_get_clean();                        
        include_once __DIR__ . '/views/admin/master.php';     
    }

    // Muestra las paginas de los clientes
    public function renderClientes($view, $datos = []){
        foreach ($datos as $key => $value) {
            $$key = $value;  
        }

        ob_start();
        
        include_once __DIR__ . "/views/app/$view.php";             
        $contenidoClientes = ob_get_clean();                                                    
        include_once __DIR__ . '/views/app/master.php'; 
    }
    
    public function renderClientesConfiguracion($view, $datos = []){
        foreach ($datos as $key => $value) {
            $$key = $value;  
        }

        ob_start();

        include_once __DIR__ . "/views/app/configuracion/$view.php"; 
        $contenidoClientesConfiguracion = ob_get_clean();                                                    
        include_once __DIR__ . "/views/app/configuracion/configuracion.php";
    }

    public function renderClientesGestion($view, $datos = []){
        foreach ($datos as $key => $value) {
            $$key = $value;  
        }

        ob_start();

        include_once __DIR__ . "/views/app/gestion/$view.php"; 
        $contenidoClientesGestion = ob_get_clean();                                                    
        include_once __DIR__ . "/views/app/gestion/gestion.php";
    }

}
