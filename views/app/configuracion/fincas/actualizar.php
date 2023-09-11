<?php  $idclienteS = $_SESSION['id']; ?>

<!-- Actualizar finca -->
    
    <div class="contenedorUno">
        <a href="/fincas?idclienteS=<?php echo $idclienteS; ?>" class="botonCerrar" type="submit">Cerrar</a>
        <h4>Editar finca</h4>
        <input type="submit" class="botonGuardar" value="Guardar">
    </div>
  
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
    </form>

<?php $script = '<script src="/build/js/imagenAgrandar.js"></script>' ?>