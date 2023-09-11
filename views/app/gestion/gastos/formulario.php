
<!-- Pagina del formulario de registro -->

    <input type="hidden" id="idcliente" name="fincas[idcliente]" value="<?php echo s($idcliente); ?>">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="fincas[nombre]" placeholder="Nombre" value="<?php echo s($fincas->nombre); ?>">
    </div>

    <div class="campo">
        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="fincas[imagen]" accept="image/jpeg, image/png">
    </div>

    <?php  if($fincas->imagen) { ?>
        <img src="/imagenesFincas/<?php echo $fincas->imagen ?>" class="imagen">
    <?php } ?>
    
    <div class="campo">
        <label for="propietario">Propietario</label>
        <input type="text" id="propietario" name="fincas[propietario]" placeholder="Propietario" value="<?php echo s($fincas->propietario); ?>">
    </div>

    <div class="campo">
        <label for="latitud">Latitud</label>
        <input type="text" id="latitud" name="fincas[lati]" placeholder="Latitud" value="<?php echo s($fincas->lati); ?>">
    </div>

    <div class="campo">
        <label for="longitud">Longitud</label>
        <input type="text" id="longitud" name="fincas[longi]" placeholder="Longitud" value="<?php echo s($fincas->longi); ?>">
    </div>

    <div class="campo">
        <label for="hectareas">Hectareas</label>
        <input type="text" id="hectareas" name="fincas[hectareas]" placeholder="hectareas" value="<?php echo s($fincas->hectareas); ?>">
    </div>

    <div class="contenedorBotones">
        <input type="submit" class="boton_verde" value="Guardar">
    </div>
    

