
<!-- Pagina del formulario de registro -->
        <?php if($clientes->id) { ?>
            <input type="hidden" id="id" name="clientes[id]" value="<?php echo s($clientes->id); ?>">
        <?php } ?>

    <!-- Datos de facturación -->
    <fieldset class="uno">
        <legend>Datos personales</legend>

        <div class="campos">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="clientes[nombre]" placeholder="Nombre" value="<?php echo s($clientes->nombre); ?>">
            </div>

            <div class="campo">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="clientes[apellidos]" placeholder="Apellidos" value="<?php echo s($clientes->apellidos); ?>">
            </div>
        </div>
        
        <div class="campos">
            <div class="campo">
                <label for="direccion">Dirección </label>
                <input type="text" id="direccion" name="clientes[direccion]" placeholder="Dirección" value="<?php echo s($clientes->direccion); ?>">
            </div>

            <div class="campo">
                <label for="numero">Nº </label>
                <input type="number" id="numero" name="clientes[numero]" placeholder="Nº" value="<?php echo s($clientes->numero); ?>">
            </div>
        </div>

        <div class="campos">
            <div class="campo">
                <label for="codigopostal">CP </label>
                <input type="number" id="codigopostal" name="clientes[codigopostal]" placeholder="Codigo postal" value="<?php echo s($clientes->codigopostal); ?>">
            </div>

            <div class="campo">
                <label for="poblacion">Población </label>
                <input type="text" id="poblacion" name="clientes[poblacion]" placeholder="Poblacion" value="<?php echo s($clientes->poblacion); ?>">
            </div>
        </div>

        <div class="campos">
            <div class="campo">
                <label for="provincia">Provincia </label>
                <input type="text" id="provincia" name="clientes[provincia]" placeholder="Provincia" value="<?php echo s($clientes->provincia); ?>">
            </div>
            <div class="campo">
                <label for="pais">Pais </label>
                <input type="text" id="pais" name="clientes[pais]" placeholder="Pais" value="<?php echo s($clientes->pais); ?>">
            </div>
        </div>


        <div class="campos">
            <div class="campo">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="clientes[telefono]" placeholder="Teléfono" value="<?php echo s($clientes->telefono); ?>">
            </div>
            <div class="campo">
                <label for="dni_nif">DNI/NIF </label>
                <input type="text" id="dni_nif" name="clientes[dni_nif]" placeholder="DNI o NIF" value="<?php echo s($clientes->dni_nif); ?>">
            </div>
        </div>

    </fieldset>
 
    <!-- Datos de acceso -->
    <fieldset class="dos">
        <legend>Datos de acceso</legend>
            <div class="campos">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="clientes[email]" placeholder="Email" value="<?php echo s($clientes->email); ?>">
            </div>
            <!-- Muestra el campo de password si no hay un ID -->
            <?php if(!$clientes->id) { ?>
                <div class="campo">
                    <label for="password">Password</label>
                    <div class="mostrarPassword">
                        <input type="password" id="password" name="clientes[password]" placeholder="Password">
                        <img id="ima-1" class="ocultarPass"src="/build/img/mostrar.webp" alt="">
                        <img id="ima-2" src="/build/img/esconder.webp" alt="">
                    </div>
                </div>
                <div class="campo">
                    <label for="password2">Repetir</label>
                    <div class="mostrarPassword">
                        <input type="password" id="password2" name="clientes[password2]" placeholder="Password">
                        <img id="ima-3" class="ocultarPass"src="/build/img/mostrar.webp" alt="">
                        <img id="ima-4" src="/build/img/esconder.webp" alt="">
                    </div>
                </div>

            <?php }?>
        </div>
    </fieldset>
 
    <!-- Datos de pago -->
    <fieldset class="tres">
        <legend>Datos de pago</legend>
            <!-- PAGO -->
            
        <div class="campos">
            <div class="campo">
                <label for="pago">Forma de pago </label>
                <select id="pago" name='clientes[formaPago]'>
                    <option value="">-- Elija metodo --</option>
                    <option value="Bizun">Bizun</option>
                    <option value="Ingreso en cuenta">Ingreso en cuenta</option>
                    <option value="Transferencia">Transferencia</option>
                </select>
            </div>
            <div class="campo">
                <label for="fecha">Fecha pago</label>
                <input
                    id="fecha"
                    type="number"
                    name="clientes[diapago]"
                    min="1"
                    max="31"
                />
            </div>
        </div>
    </fieldset>
    
    <!-- Imagen -->
    <fieldset class="cuatro">
        <legend>Imagen</legend>
            <!-- IMAGEN -->
        <div class="campos">
            <div class="campo">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="clientes[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
            </div>

            <div class="contenedor_imagen">
                <?php if($clientes->id) { ?>
                    <img class="imagen" src="/imagenesClientes/<?php echo $clientes->imagen ?>" alt="Imagen">
                <?php } ?>
            </div>
        </div>
    </fieldset>




