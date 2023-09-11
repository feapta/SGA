
<!-- Pagina del formulario de fincas -->

    <input type="hidden" name="fincas[idclientesistemar]" value="<?php echo $idclienteS; ?>">
    
    <!-- Imagen -->
    <?php  if($fincas->imagen) { ?>
        <img src="/imagenesFincas/<?php echo $fincas->imagen ?>" class="imagen peque">
    <?php } ?>

    <!-- Nombre de la finca -->
    <div class="campos">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="fincas[nombre]" placeholder="Nombre" value="<?php  if( $fincas->id ){ echo s( $fincas->nombre ); }; ?>">
        </div>
    </div>

    <!-- Propietario -->
    <div class="campos">
        <div class="campo">
            <label for="idclienteapp">Propietario</label>
            <select id="idclienteapp" name="fincas[datos]">
                <?php if(!$fincas->id) { ?>
                    <option value="">-- Seleccione --</option>
                    <?php foreach($propietarios as $propietario) { ?>
                        <option value="<?php echo s($propietario->id.','.$propietario->nombre . ' ' . $propietario->apellidos); ?>"> <?php echo $propietario->nombre . ' ' . $propietario->apellidos; ?></option>
                    <?php }?>
                <?php }else { ?>
                    <!-- Actualizar -->
                    <option value="<?php echo s($fincas->id . ',' . $fincas->propietario); ?>"> <?php echo $fincas->propietario; ?></option>
                    
                    <?php foreach($propietarios as $propietario) { ?>
                        <option value="<?php echo s($propietario->id.','.$propietario->nombre . ' ' . $propietario->apellidos); ?>"> <?php echo $propietario->nombre . ' ' . $propietario->apellidos; ?></option>
                    <?php }?>
                <?php }?>

            </select>
        </div>
    </div>

    <!-- Latitud Longitud y Tamaño -->
    <div class="campos">
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
    </div>
    
    <!-- Añadir imagen -->
    <div class="campo">
        <label for="imagen">Imagen</label>
    </div>

    

