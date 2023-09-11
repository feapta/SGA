

        <input type="hidden" name="empleados[idclientesistemar]" value="<?php echo s($idclienteS); ?>">
        
        <?php  if($empleados->imagen) { ?>
            <img src="/imagenesEmpleados/<?php echo $empleados->imagen ?>" class="imagen peque">
        <?php } ?>
        
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="empleados[nombre]" placeholder="Nombre" value="<?php echo s($empleados->nombre); ?>">
        </div>
        
        <div class="campo">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="empleados[apellidos]" placeholder="Apellidos" value="<?php echo s($empleados->apellidos); ?>">
        </div>
        
        <div class="campo">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="empleados[direccion]" placeholder="Dirección" value="<?php echo s($empleados->direccion); ?>">
        </div>

        <div class="campo">
            <label for="numero">Nº</label>
            <input type="number" id="numero" name="empleados[numero]" placeholder="Nº" value="<?php echo s($empleados->numero); ?>">
        </div>
    
        <div class="campo">
            <label for="codigopostal">CP</label>
            <input type="number" id="codigopostal" name="empleados[codigopostal]" placeholder="Codigo postal" value="<?php echo s($empleados->codigopostal); ?>">
        </div>

        <div class="campo">
            <label for="poblacion">Población</label>
            <input type="text" id="poblacion" name="empleados[poblacion]" placeholder="Población" value="<?php echo s($empleados->poblacion); ?>">
        </div>

        <div class="campo">
            <label for="provincia">Provincia</label>
            <input type="text" id="provincia" name="empleados[provincia]" placeholder="provincia" value="<?php echo s($empleados->provincia); ?>">
        </div>

        <div class="campo">
            <label for="dni">DNI</label>
            <input type="text" id="dni" name="empleados[dni]" placeholder="Dni" value="<?php echo s($empleados->dni); ?>">
        </div>

        <div class="campo">
            <label for="telefono">TLF.</label>
            <input type="text" id="telefono" name="empleados[telefono]" placeholder="Teléfono" value="<?php echo s($empleados->telefono); ?>">
        </div>
    
        <div class="campo">
            <label for="email">Email</label>
            <input type="text" id="email" name="empleados[email]" placeholder="Email" value="<?php echo s($empleados->email); ?>">
        </div>
    
        <div class="campo">
            <label for="categoria">Categoría</label>
            <input type="text" id="categoria" name="empleados[categoria]" placeholder="Categoría" value="<?php echo s($empleados->categoria); ?>">
        </div>
        
        <div class="campo">
            <label for="preciohora">Precio hora</label>
            <input type="text" id="preciohora" name="empleados[preciohora]" placeholder="Precio hora" value="<?php echo s($empleados->preciohora); ?>">
        </div>
    
        <div class="campo">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="empleados[imagen]" accept="image/jpeg, image/png">
        </div>
        
        <!-- Imagen -->
        <?php  if($fincas->imagen) { ?>
            <img src="/imagenesEmpleados/<?php echo $empleados->imagen ?>" class="imagen peque">
        <?php } ?>