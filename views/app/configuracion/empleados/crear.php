
<?php $idclienteS = $_SESSION['id']; ?>

    <!-- Crear empleado nuevo -->

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <div class="contenedorUno">
            <a href="/empleados?idclienteS=<?php echo $idclienteS; ?>" class="botonCerrar" type="submit">Cerrar</a>
            <h4>Crear empleado</h4>
            <input type="submit" class="botonGuardar" value="Guardar">
        </div>

        <?php include __DIR__ . '/formulario.php'; ?>
    </form>