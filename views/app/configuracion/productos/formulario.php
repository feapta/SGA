
<!-- Pagina del formulario de registro -->

<input type="hidden" name="productos[idclientesistemar]" value="<?php echo s($idclienteS); ?>">

<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="productos[nombre]" placeholder="Nombre" value="<?php echo s($productos->nombre); ?>">
</div>

<div class="campo">
    <label for="tipo">Tipo</label>
    <input type="text" id="tipo" name="productos[tipo]" placeholder="Tipo" value="<?php echo s($productos->tipo); ?>">
</div>

<div class="campo">
    <label for="kilolitro">Kilo/Litro</label>
    <select name="productos[kilolitro]" id="kilolitro">
        <?php if(!$productos->id) { ?>
            <option value="">-- Seleccione --</option>
            <option value="1">Kilos</option>
            <option value="2">Litros</option>
            <option value="3">Tonelada</option>
        <?php }else { ?>
            <option value="<?php echo s($productos->kilolitro); ?>"><?php echo s($productos->kilolitro); ?></option>
            <option value="1">Kilos</option>
            <option value="2">Litros</option>
            <option value="3">Tonelada</option>
        <?php }?>
    </select>
</div>

<div class="campo">
    <label for="precio">Precio</label>
    <input type="text" id="precio" name="productos[precio]" placeholder="Precio" value="<?php echo s($productos->precio); ?>">
</div>

<div class="campo">
    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="productos[imagen]" accept="image/jpeg, image/png">
</div>

<?php  if($productos->imagen) { ?>
    <img src="/imagenesProductos/<?php echo $productos->imagen ?>" class="imagen peque">
<?php } ?>