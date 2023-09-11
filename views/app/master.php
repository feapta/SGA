

<!-- Paginas inicio app -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title class="titulo"></title>
    <meta name="description" content="sistema gestion agraria" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="/build/img/logoSM.svg">
    <meta name="apple-mobile-web-app-title" content="sistemar">

    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="/build/img/logoSM.svg">
   
    <!-- Estilos -->
    <link rel="stylesheet" href="/build/css/app.css">

</head>

<body>
    <div class="content">
       
        <header>
            <div class="vacio"></div>
            <div class="contenedor">
                <nav>
                    <a class="cerrarSesion pulsacion" href="/"> 
                        <img src="/build/img/logoSM.svg" alt="" width="50" height="50"> 
                        <h5>Cerrar sesión</h5>
                    </a>

                    <div class="enlaces">
                        <a href="/app" id="inicio">Inicio</a>
                        <a href="/gestion" id="gestion">Gestión</a>
                        <a href="/configuracion" id="config">Configuración</a>
                    </div>
                </nav>
            </div>
        </header>

        <aside>
            <div class="navegaciones">
                <!-- paso Inicio -->
                <div class="menuDash">
                    <a href="/app">
                        <img class="img_navega" src="/build/img/barras.svg" alt="Icono">
                        <span>Inicio</span>
                    </a>
                </div>
        
                <!-- paso Gestion -->
                <div class="menuDash">
                    <a href="/gestion">
                        <img class="img_navega" src="/build/img/barras.svg" alt="Icono">
                        <span>Gestión</span>
                    </a>
                </div>

                <!-- paso Configuracion -->
                <div class="menuDash">
                    <a href="/gestion" >
                        <img class="img_navega" src="/build/img/barras.svg" alt="Icono">
                        <span>Configuración</span>
                    </a>
                </div>

   

                <img class="dark_mode_boton" src="/build/img/dark-mode.svg" alt="">
                
                <a class="boton_verde" href="https://email.ionos.es/appsuite/?tl=y#!!&app=io.ox/mail&folder=default0/INBOX">Buzón correo</a>
            </div>
        </aside>
        
        <article class="main">
            <div class="contenidoApp"> 
                <div class="contenedorImagenMenu pulsacion">
                    <img class="imagenmenu" src="/build/img/menu.png" alt="">
                </div>

                <div class="contenedor">
                    <div class="titulo">
                        <h5>Inicio de la App</h5>
                    </div>

                    <div class="contenido">
                        <?php echo $contenidoClientes; ?>
                    </div>
                </div>
            </div>
        </article>

        <footer>
            <div class="contenedor">
                <nav class="nav">
                    <a href="/app" id="inicio">Inicio</a>
                    <a href="/gestion" id="config">Gestión</a>
                    <a href="/congiguracion" id="config">Configuración</a>

                </nav>

                <div class="cop">
                    <?php    $fecha = date('Y');     // Agregamos automaticamente el año ?>
                    <p class="copyright">Todos los derechos reservados, Sistemar - <?php echo $fecha ?> &copy;</p>
                </div>
            </div>
        </footer>
    
    </div>




    <script src="/build/js/libs/sweetalert2.js"></script>
    <script src="/build/js/libs/modernizr.js"></script>
    <script src="/build/js/libs/jquery-3-6-4.js"></script>
    
    <script src="/build/js/asideMostrarOcultar.js"></script>
    <script src="/build/js/paginaAltura.js"></script>


    <?php echo $script ?? ''; ?>

</body>
</html>