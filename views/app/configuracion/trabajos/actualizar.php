
<?php $idclienteS = $_SESSION['id']; ?>

<!-- Actualizar trabajo nuevo -->

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="contenedorUno">
            <a href="/trabajos?idclienteS=<?php echo $idclienteS; ?>" class="botonCerrar" type="submit">Cerrar</a>
            <h4>Actualizar trabajo</h4>
            <input type="submit" class="botonGuardar" value="Guardar">
        </div>

        <?php include __DIR__ . '/formulario.php'; ?>
    </form>