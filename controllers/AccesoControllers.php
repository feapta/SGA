<?php

// Registro de Clientes

namespace Controllers;

use Classes\Email;
use Model\ClienteSistemar;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class AccesoControllers{
    
    // Registro de Clientes
    public static function compra(Router $router){
        $clientes = new ClienteSistemar;
        $alertas = [];
        $carpeta = CARPETA_IMAGEN_CLIENTES;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $clientes = new ClienteSistemar($_POST['clientes']);
 
            $clientes->sincronizar($_POST);
            
            $alertas = $clientes->validarNuevaCuenta();

            if(empty($alertas)){                                        // Si no hay alertas
                $resultado = $clientes->existeUsuario();                // Verificar que el usuario no este registrado
                
                if($resultado->num_rows){
                    $alertas = ClienteSistemar::getAlertas();                  // Si esta resgistrado
                }
                else {                                                  // No esta registrado
                    $clientes->hashPassword();

                    $clientes->crearToken();
                    
                    $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; 
                                                    
                    if($_FILES['clientes']['tmp_name']['imagen']){
                        $imagen = Image::make($_FILES['clientes']['tmp_name']['imagen'])->resize(200, 100);
                        $clientes->setImagen($nombreImagen, $carpeta);                                   
                    }
               
                    $imagen->save($carpeta . $nombreImagen);                                            // Guarda la imagen en el disco duro con la libreria intervention
                    
                    $email = new Email($clientes->email, $clientes->nombre, $clientes->token);          // Envio email
                    $email->enviarConfirmacion();

                    $resultado = $clientes->guardar();                                                  // Crear usuario

                    if($resultado){
                        header("Location: /clientes/mensaje");
                    }
                }
            }
        }

        $router->render('clientes/compra', [
            'clientes' => $clientes,
            'alertas' => $alertas
        ]);
    }
    // Acceso a clientes
    public static function acceso(Router $router){
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new ClienteSistemar($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                $clientes =  ClienteSistemar::whereValor('email', $auth->email);

                if($clientes){
                    if($clientes->comprobaciones($auth->password)){    // Comprueba el password y que el usuario este confirmado

                        session_start();
                        $_SESSION['id'] = $clientes->id;
                        $_SESSION['imagen'] = $clientes->imagen;
                        $_SESSION['nombre'] = $clientes->nombre . " " . $clientes->apellidos;

                        $rol = $clientes->rol;
                        switch ($rol) {
                            case 0:
                                header("Location: /dashboard");
                            break;
                            case 1:
                                if ($clientes->pagook){
                                    header("Location: /app");
                                }
                            break;
                            case 2:
                                if ($clientes->pagook){
                                    header ('Location: /app/usuarioGestiona');
                                }
                            break;
                            case 3:
                                if ($clientes->pagook){
                                    header ('Location: /app/usuarioNormal');
                                }
                            break;
                        };
                    }
                }
            } else {
                ClienteSistemar::setAlerta('error', 'Usuario no encontrado');
            }
        }   

        $alertas = ClienteSistemar::getAlertas();
        
        $router->render('paginas/acceso',[
            'alertas' => $alertas
        ]);
    }    

    // Password olvidado
    public static function olvidado(Router $router){    
        $inicio = false;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new clienteSistemar($_POST);
           
            $alertas = $auth->validarEmail();
            if(empty($alertas)) {
                $usuario = ClienteSistemar::whereValor('email', $auth->email);

                if($usuario && $usuario->confirmado === "1") {
                     
                    $usuario->crearToken();                                                     // Generar un token
                    $usuario->guardar();                                                        // Guardar el token

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);     //  Envia el email
                    $email->enviarInstrucciones();

                    ClienteSistemar::setAlerta('exito', 'Revisa su email');                            // Alerta de exito
                 } else {
                     ClienteSistemar::setAlerta('error', 'El Usuario no existe o no esta confirmado'); // Alerta de error
                 }
            } 
        }

        $alertas = ClienteSistemar::getAlertas();

        $router->render('clientes/olvidado', [
            'inicio' => $inicio,
            'alertas' => $alertas
        ]);
        
    }
    // Recuperar password
    public static function recuperar(Router $router) {
        $token = s($_GET['token']);
        $mostrar = true;

        if(!$token) header('Location: /');

        $usuario = ClienteSistemar::whereValor('token', $token);                 // Identificar el usuario con este token

        if(empty($usuario)) {
            ClienteSistemar::setAlerta('error', 'Token No Válido');
            $mostrar = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);                                  // Añadir el nuevo password
            $alertas = $usuario->validarPassword();                         // Validar el password

            if(empty($alertas)) {
                $usuario->hashPassword();                                   // Hashear el nuevo password
                
                $usuario->token = null;                                     // Eliminar el Token

                $resultado = $usuario->guardar();                           // Guardar el usuario en la BD
                
                if($resultado) {                                            // Redireccionar
                    header('Location: /');
                }
            }
        }

        $alertas = ClienteSistemar::getAlertas();

        $router->render('clientes/recuperar', [
            'titulo' => 'Reestablecer Password',
            'alertas' => $alertas,
            'mostrar' => $mostrar
        ]);
    }
    // Mensaje para confirmar cuenta
    public static function mensaje(Router $router){
        $inicio = false;

        $router->render('clientes/mensaje', [
            'inicio' => $inicio,
        ]);
    }
    // Confirmacion de cuenta eliminando el token
    public static function confirmar(Router $router){
        $alertas = [];
        $token = s($_GET['token']);
        $clientes = ClienteSistemar::whereValor('token', $token);
        
        if(empty($clientes)){
            ClienteSistemar::setAlerta('error', 'Token no valido');    // Mostrar mensaje de error porque no hay usuario
        }
        else {
            $clientes->confirmado = '1';                    //Modificar el valor de confirmado
            $clientes->token = null;
            $clientes->guardar();

            ClienteSistemar::setAlerta('exito', 'Cuenta confirmada');
        }

       
        $alertas = ClienteSistemar::getAlertas();                   // Crea la alerta

        // Renderizar la vista
        $router->render('clientes/confirmar', [
            'alertas' => $alertas
        ]);
        
    }
    // Cierra la sesion del usuario
    public static function logout(){
        session_start();

        $_SESSION = [];
        
        header("Location: /");

    }

}

?>