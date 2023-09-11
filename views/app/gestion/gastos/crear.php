
<?php
    session_start();
    $idcliente = $_SESSION['id'];
    
?>

<!-- Crear clientes-->

<div class="contenedor contenido_centrado">

    <div class="contenedorCabecera">
        <div class="contenedorBotones">
            <a href="/fincas?idcliente=<?php echo $idcliente; ?>" class="boton_light-green-400 volver" type="submit">Cerrar</a>
        </div>

        <div class="titulo">
            <h3>Crear finca</h3>
        </div>
    </div>
  
    <div class="contenedorFormulario">
        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
        </form>
    </div>

</div>
