
<!-- Pagina del formulario -->
    
    <div class="contenedorUno">
        <a href="/empleados?idclienteS=<?php echo $empleados->idclientesistemar; ?>" class="botonCerrar" type="submit">Cerrar</a>
        <h4>Datos del empleado</h4>
        <div class="edicion">
            <a class="vermas" href="/empleados/actualizar?id=<?php echo $empleados->id; ?>"> 
                <img src="/build/img/lapiz.png" alt=""> 
            </a>
            <input class="vermas" type="image" onclick="confirmarEliminar(<?php echo $empleados->id; ?>, 
                                                                    'empleados', 
                                                                    'empleados', 
                                                                    'empleados?idclienteS=<?php echo $empleados->idclientesistemar;?>', 
                                                                    2)"
                                                                    src="/build/img/papelera.png" alt="">
        </div>
    </div>
  
        <input type="hidden" name="empleados[idclienteS]" value="<?php echo s($empleados->idclientesistemar); ?>">
        
        <?php  if($empleados->imagen) { ?>
            <img src="/imagenesEmpleados/<?php echo $empleados->imagen ?>" class="imagen peque">
        <?php } ?>
        
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="empleados[nombre]" placeholder="Nombre" value="<?php echo s($empleados->nombre); ?>" disabled>
        </div>
        
        <div class="campo">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="empleados[apellidos]" placeholder="Apellidos" value="<?php echo s($empleados->apellidos); ?>" disabled>
        </div>
        
        <div class="campo">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="empleados[direccion]" placeholder="Dirección" value="<?php echo s($empleados->direccion); ?>" disabled>
        </div>

        <div class="campo">
            <label for="numero">Nº</label>
            <input type="number" id="numero" name="empleados[numero]" placeholder="Nº" value="<?php echo s($empleados->numero); ?>" disabled>
        </div>
    
        <div class="campo">
            <label for="codigopostal">CP</label>
            <input type="number" id="codigopostal" name="empleados[codigopostal]" placeholder="Codigo postal" value="<?php echo s($empleados->codigopostal); ?>" disabled>
        </div>

        <div class="campo">
            <label for="poblacion">Población</label>
            <input type="text" id="poblacion" name="empleados[poblacion]" placeholder="Población" value="<?php echo s($empleados->poblacion); ?>" disabled>
        </div>

        <div class="campo">
            <label for="provincia">Provincia</label>
            <input type="text" id="provincia" name="empleados[provincia]" placeholder="provincia" value="<?php echo s($empleados->provincia); ?>" disabled>
        </div>

        <div class="campo">
            <label for="dninif">DNI</label>
            <input type="text" id="dninif" name="empleados[dni]" placeholder="Dni" value="<?php echo s($empleados->dni); ?>" disabled>
        </div>

        <div class="campo">
            <label for="telefono">TLF.</label>
            <input type="text" id="telefono" name="empleados[telefono]" placeholder="Teléfono" value="<?php echo s($empleados->telefono); ?>" disabled>
        </div>
    
        <div class="campo">
            <label for="email">Email</label>
            <input type="text" id="email" name="empleados[email]" placeholder="Email" value="<?php echo s($empleados->email); ?>" disabled>
        </div>
    
        <div class="campo">
            <label for="categoria">Categoría</label>
            <input type="text" id="categoria" name="empleados[categoria]" placeholder="Categoría" value="<?php echo s($empleados->categoria); ?>" disabled>
        </div>
        
        <div class="campo">
            <label for="preciohora">Precio hora</label>
            <input type="text" id="preciohora" name="empleados[preciohora]" placeholder="Precio hora" value="<?php echo s($empleados->preciohora); ?>" disabled>
        </div>
