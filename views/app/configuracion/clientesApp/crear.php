<?php $idclienteS = $_SESSION['id']; ?>

<!-- Crear clientes-->
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="contenedorUno">
            <a href="/clientesApp?idclienteS=<?php echo $idclienteS; ?>" class="botonCerrar" type="submit">Cerrar</a>
            <h4>Crear nuevo cliente</h4>
            <input type="submit" class="botonGuardar" value="Guardar">
        </div>


        <?php include __DIR__ . '/formulario.php'; ?>
    </form>
