
<html lang="es">


<head>
    <meta charset="utf-8">
    <title>Sistemar</title>
    <meta name="description" content="sistema gestion agraria" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="/build/img/logoSM.svg">
    <meta name="apple-mobile-web-app-title" content="">

    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="/build/img/logoSM.svg">
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    
    <!-- Estilos -->
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>


    <header>
        <div class="contenedor">
            <nav>
                <div class="logo pulsacion">
                    <a href="/"> <img src="/build/img/logoSM.svg" alt="" width="50" height="50"> </a>
                </div>

                <div class="enlaces">
                    <a href="/contacto" id="inicio">Contacto</a>
                    <a href="/nosotros" id="acceso">Nosotros</a>
                    <a href="/acceso" id="acceso">Acceso</a>
                    <a href="/precios" id="acceso">Precios</a>
                    <a href="/demo" id="acceso">Demo</a>
                </div>
            </nav>
        </div>
    </header>
    
    <main class="contenidoMaster">
        <?php echo $contenido; ?>
    </main>


    <footer>
        <div class="contenedor">
            <nav class="nav">
                <a href="/">Inicio</a>
                <a href="/contacto" id="inicio">Contacto</a>
                <a href="/nosotros" id="acceso">Nosotros</a>
                <a href="/acceso" id="acceso">Acceso</a>
                <a href="/precios" id="acceso">Precios</a>
                <a href="/demo" id="acceso">Demo</a>
            </nav>

            <div class="cop">
                <?php    $fecha = date('Y');     // Agregamos automaticamente el año ?>
                <p class="copyright">Todos los derechos reservados, Sistemar - <?php echo $fecha ?> &copy;</p>
            </div>
        </div>
    </footer>

    <script src="/build/js/libs/modernizr.js"></script>
    
    <?php echo $script ?? ''; ?>

</body>
</html>