
<?php $idclienteS = $_SESSION['id']; ?>

<!-- Crear parte  -->

<div class="partesEditar">

    <input type="hidden" id="idclienteS" value="<?php echo s( $idclienteS ); ?>">
    <input type="hidden" id="idparte" value="">

    <div class="contenedorUno">
        <a href="/partes?idclienteS=<?php echo $idclienteS; ?>" class="botonCerrar volver" type="submit">Cerrar</a>
        <h4>Crear parte</h4>
        <input class="botonGuardar" onclick="guardarParte()" value="Guardar">
    </div>
    
    <?php include __DIR__ . '/contenido.php'; ?>
</div>

<?php $script = '<script src="/build/js/gestion/crear.js"></script>'; ?>
<?php $script .= '<script src="/build/js/gestion/contenidoComun.js"></script>'; ?>
<?php $script .= '<script src="/build/js/gestion/contenido.js"></script>'; ?>