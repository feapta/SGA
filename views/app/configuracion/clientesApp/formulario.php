
<!-- Pagina del formulario -->

    <input type="hidden" id="idclienteApp" name="clientesApp[idclientesistemar]" value="<?php echo $idclienteS; ?>">
    
    <div class="campo">
        <?php  if($clientesApp->imagen) { ?>
            <img src="/imagenesclientesApp/<?php echo $clientesApp->imagen ?>" class="imagen peque">
        <?php } ?>
    </div>
    
    <!-- Nombrer y apellidos -->
    <div class="campos nombre">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="clientesApp[nombre]" placeholder="Nombre" value="<?php echo s($clientesApp->nombre); ?>">
        </div>
        
        <div class="campo">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="clientesApp[apellidos]" placeholder="Apellidos" value="<?php echo s($clientesApp->apellidos); ?>">
        </div>
    </div>

    <!-- Direccion -->
    <div class="campos direccion">
        <div class="campo">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="clientesApp[direccion]" placeholder="Dirección" value="<?php echo s($clientesApp->direccion); ?>">
        </div>

        <div class="campo">
            <label for="numero">Nº</label>
            <input type="number" id="numero" name="clientesApp[numero]" placeholder="Nº" value="<?php echo s($clientesApp->numero); ?>">
        </div>
    </div>

    <!-- Codigo Postal y poblacion -->
    <div class="campos">
        <div class="campo">
        <label for="codigopostal">CP</label>
        <input type="number" id="codigopostal" name="clientesApp[codigopostal]" placeholder="Codigo postal" value="<?php echo s($clientesApp->codigopostal); ?>">
        </div>

        <div class="campo">
        <label for="poblacion">Población</label>
        <input type="text" id="poblacion" name="clientesApp[poblacion]" placeholder="Población" value="<?php echo s($clientesApp->poblacion); ?>">
        </div>
    </div>

    <!-- Provincia y pais -->
    <div class="campos provincia">
        <div class="campo">
            <label for="provincia">Provincia</label>
            <input type="text" id="provincia" name="clientesApp[provincia]" placeholder="provincia" value="<?php echo s($clientesApp->provincia); ?>">
        </div>
        <div class="campo">
            <label for="provincia">Pais</label>
            <input type="text" id="pais" name="clientesApp[pais]" placeholder="pais" value="<?php echo s($clientesApp->pais); ?>">
        </div>
    </div>

    <!-- Email -->
    <div class="campos email">
        <div class="campo">
            <label for="email">Email</label>
            <input type="text" id="email" name="clientesApp[email]" placeholder="Email" value="<?php echo s($clientesApp->email); ?>">
        </div>
    </div>

    <!-- DNI Telefono IVA -->
    <div class="campos dni">
        <div class="campo">
            <label for="dninif">DNI/NIF</label>
            <input type="text" id="dninif" name="clientesApp[dninif]" placeholder="Dni/Nif" value="<?php echo s($clientesApp->dninif); ?>">
        </div>

        <div class="campo">
            <label for="telefono">TLF.</label>
            <input type="text" id="telefono" name="clientesApp[telefono]" placeholder="Teléfono" value="<?php echo s($clientesApp->telefono); ?>">
        </div>

        <div class="campo">
            <label for="tipoiva">Tipo IVA</label>
            <input type="text" id="tipoiva" name="clientesApp[tipoiva]" placeholder="Tipo IVA" value="<?php echo s($clientesApp->tipoiva); ?>">
        </div>
    </div>
   
    <!-- Imagen -->
    <div class="campos ima">
        <div class="campo">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="clientesApp[imagen]" accept="image/jpeg, image/png">
        </div>
    </div>

    <!-- Notas -->
    <div class="campos notas">
        <div class="campo">
            <label for="notas">Notas</label>
            <input type="textarea" id="notas" name="clientesApp[notas]" value="<?php echo s($clientesApp->notas); ?>">
        </div>
    </div>

