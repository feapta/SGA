<?php $idclienteS = $_SESSION['id']; ?>

<!-- Actualizar maquina -->

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="contenedorUno">
            <a href="/clientesApp?idclienteS=<?php echo $idclienteS; ?>" class="botonCerrar" type="submit">Cerrar</a>
            <h4>Actualizar cliente</h4>
            <input type="submit" class="botonGuardar" value="Guardar">
        </div>
        
        
        <?php include __DIR__ . '/formulario.php'; ?>
    </form>

<?php $script = '<script src="/build/js/imagenAgrandar.js"></script>' ?>
