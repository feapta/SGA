
<!-- Pagina del formulario de registro -->

    <input type="hidden"name="trabajos[idclientesistemar]" value="<?php echo s($idclienteS); ?>">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="trabajos[nombre]" placeholder="Nombre" value="<?php echo s($trabajos->nombre); ?>">
    </div>
    
    <div class="campo">
        <label for="preciohora">Precio hora</label>
        <input type="text" id="preciohora" name="trabajos[preciohora]" placeholder="Precio hora" value="<?php echo s($trabajos->preciohora); ?>">
    </div>
    
    <div class="campo">
        <label for="imagen">Imagen</label>
        <input type="file" id="imagen" name="trabajos[imagen]" accept="image/jpeg, image/png">
    </div>

    <?php  if($trabajos->imagen) { ?>
        <img src="/imagenesTrabajos/<?php echo $trabajos->imagen ?>" class="imagen peque">
    <?php } ?>
    

