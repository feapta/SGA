<?php
    session_start();
    $idcliente = $_SESSION['id'];
    
?>

<!-- Actualizar maquina -->

<div class="contenedor">
    <h5>Finca</h5>
    
    <div class="contenedoBotones">
        <a href="/fincas?idcliente=<?php echo $idcliente; ?>" class="boton_light-green-400">Volver</a>
    </div>
    
    <div class="contenedorFormulario">
        <form class="formulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
        </form>
    </div>

</div>