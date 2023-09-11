

<!-- Registro de usuarios-->

<div class="contenedor clientesCompra">
    <p>Introduzca todos los datos para adquirir una licencia</p>

    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    
    <form  class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>


    <div class="contenedoUno">
            <input type="submit" class="boton_verde" value="Enviar">
        </div>
    </form>
    
    <div class="acciones">
        <a href="/acceso">Acceso clientes</a>
        <a href="/">Inicio</a>
    </div>
</div>

<?php  $script = '<script src="/build/js/mostrar_pass.js"></script>'; ?>