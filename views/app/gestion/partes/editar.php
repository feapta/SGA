
<?php $idclienteS = $_SESSION['id']; ?>

<!-- Editar parte  -->

<div class="partesEditar">

    <input type="hidden" id="idclienteS" value="<?php echo s( $idclienteS ); ?>">
    <input type="hidden" id="idparte" value="<?php echo s( $_GET['idparte'] ); ?>">

    <div class="contenedorUno">
        <a href="/partes/vermas?idparte=<?php echo s( $_GET['idparte'] ); ?>" class="botonCerrar volver" type="submit">Cerrar</a>
        <h4>Editar parte</h4>
        <input class="botonGuardar" onclick="guardarParte()" value="Guardar">
    </div>
    
    <?php include __DIR__ . '/contenido.php'; ?>
</div>

<?php $script .= '<script src="/build/js/gestion/editar.js"></script>'; ?>
<?php $script .= '<script src="/build/js/gestion/contenido.js"></script>'; ?>
<?php $script .= '<script src="/build/js/gestion/contenidoComun.js"></script>'; ?>
