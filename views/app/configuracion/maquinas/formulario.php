
<!-- Pagina del formulario de registro -->

    <input type="hidden" name="maquinas[idclientesistemar]" value="<?php echo s( $idclienteS ); ?>">

    <!-- NOmbre de la maquina -->
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="maquinas[nombre]" placeholder="Nombre" value="<?php echo s($maquinas->nombre); ?>">
    </div>

    <!-- Precio hora -->
    <div class="campo">
        <label for="precioHora">Precio por Hora</label>
        <input type="text" id="precioHora" name="maquinas[precioHora]" placeholder="Precio por hora" value="<?php echo s($maquinas->precioHora); ?>">
    </div>

    <!-- Añadir imagen -->
    <div class="campo">
        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="maquinas[imagen]" accept="image/jpeg, image/png">
    </div>

    <!-- Imgen -->
    <?php  if($maquinas->imagen) { ?>
        <img src="/imagenesMaquinas/<?php echo $maquinas->imagen ?>" class="imagen peque">
    <?php } ?>
