<?php

    $idclienteS = $_SESSION['id'];
    
?>

<!-- Pagina master configuracion -->
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
                        <a href="/configuracion" id="config">Configuración</a>
                        <a href="/gestion" id="gestion">Gestión</a>
                    </div>
                </nav>
            </div>
        </header>
       
        <aside>
            <div class="navegaciones">
                <!-- paso 1 clientes -->
                <div data-paso_menu="1" class="menuDash">
                    <img  data-paso_menu="1" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                    <span data-paso_menu="1"> Clientes</span>
                </div>
                <nav class="navega-1">
                    <a href="/clientesApp?idclienteS=<?php echo $idclienteS; ?>"><img src="/build/img/flecha.png" alt="">   Clientes</a>
                    <a href="/clientesApp/crear"><img src="/build/img/flecha.png" alt="">   Crear</a>
                </nav>
                
                <!-- paso 2 fincas -->
                <div data-paso_menu="2" class="menuDash">
                    <img  data-paso_menu="2" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                    <span data-paso_menu="2"> Fincas</span>
                </div>
                <nav class="navega-2">
                    <a href="/fincas?idclienteS=<?php echo $idclienteS; ?>"><img src="/build/img/flecha.png" alt="">   Fincas</a>
                    <a href="/fincas/crear?idclienteS=<?php echo $idclienteS;?>"><img src="/build/img/flecha.png" alt="">   Crear</a>
                </nav>

                <!-- paso 3  maquinas -->
                <div data-paso_menu="3" class="menuDash">
                    <img data-paso_menu="3" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                    <span data-paso_menu="3"> Maquinas</span>
                </div>
                <nav class="navega-3">
                    <a href="/maquinas?idclienteS=<?php echo $idclienteS; ?>"><img src="/build/img/flecha.png" alt="">   Maquinas</a>
                    <a href="/maquinas/crear"><img src="/build/img/flecha.png" alt="">   Crear</a>
                </nav>

                <!-- paso 4  productos -->
                <div data-paso_menu="4" class="menuDash">
                    <img  data-paso_menu="4" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                    <span data-paso_menu="4"> Productos</span>
                </div>
                <nav class="navega-4">
                    <a href="/productos?idclienteS=<?php echo $idclienteS; ?>"><img src="/build/img/flecha.png" alt="">   Productos</a>
                    <a href="/productos/crear"><img src="/build/img/flecha.png" alt="">   Crear</a>
                </nav>
                
                <!-- paso 5 empleados -->
                <div data-paso_menu="5" class="menuDash">
                    <img data-paso_menu="5" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                    <span data-paso_menu="5"> Empleados</span>
                </div>
                <nav class="navega-5">
                    <a href="/empleados?idclienteS=<?php echo $idclienteS; ?>"><img src="/build/img/flecha.png" alt="">   Empleados</a>
                    <a href="/empleados/crear"><img src="/build/img/flecha.png" alt="">   Crear</a>
                </nav>
                    
                <!-- paso 6 trabajos -->
                <div data-paso_menu="6" class="menuDash">
                    <img data-paso_menu="6" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                    <span data-paso_menu="6"> Trabajos</span>
                </div>
                <nav class="navega-6">
                    <a href="/trabajos?idclienteS=<?php echo $idclienteS; ?>"><img src="/build/img/flecha.png" alt="">   Trabajos</a>
                    <a href="/trabajos/crear"><img src="/build/img/flecha.png" alt="">   Crear</a>
                </nav>

                <!-- paso Navegacion web 7 -->
                <div  data-paso_menu="7" class="menuDash">
                    <img data-paso_menu="7" class="img_navega" src="/build/img/barras.svg" alt="Icono">
                    <span data-paso_menu="7"> Navegación</span>
                </div>
                <nav class="navega-7">
                    <a href="/app"><img src="/build/img/flecha.png" alt="">   Inicio</a>
                    <a href="/configuracion"><img src="/build/img/flecha.png" alt="">   Configuracón</a>
                    <a href="/gestion"><img src="/build/img/flecha.png" alt="">   Gestión</a>
                    <a href=""></a>
                    <img class="dark_mode_boton" src="/build/img/dark-mode.svg" alt="">
                </nav>

                <div class="buzon">
                    <a class="boton_verde" href="https://email.ionos.es/appsuite/?tl=y#!!&app=io.ox/mail&folder=default0/INBOX">Buzón correo</a>
                </div>

            </div>
        </aside>
            
        <article class="main">
            <div class="contenidoApp">
                <div class="contenedorImagenMenu">
                    <img class="imagenmenu" src="/build/img/menu.png" alt="">
                </div>
            
                <div class="contenedor">
                    <div class="titulo">
                        <h5>Configuración</h5>
                    </div>

                    <div class="contenido">
                        <?php echo $contenidoClientesConfiguracion; ?>
                    </div>
                </div>
            </div>
        </article>
        
        <footer>
            <div class="contenedor">
                <nav class="nav">
                    <a href="/app" id="inicio">Inicio</a>
                    <a href="/congiguracion" id="config">Configuración</a>
                    <a href="/gestion" id="config">Gestión</a>

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

    <script src="/build/js/eliminar.js"></script>
    <script src="/build/js/asideNavegacion.js"></script>
    <script src="/build/js/asideMostrarOcultar.js"></script>
    <script src="/build/js/paginaAltura.js"></script>
    
  

    <?php echo $script ?? ''; ?>

</body>
</html>