
<!-- Pagina del formulario de registro -->

    <fieldset>
        <div class="variosId">
            <div class="campo">
                <label for="id">Id</label>
                <input type="number" id="id" name="clientes[id]" value="<?php echo s($clientes->id); ?>">
            </div>

            <div class="campo">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="clientes[imagen]" placeholder="Imagen" accept="image/jpeg, image/png">
                <?php if($clientes->id) {?>
                    <img class="imagen" src="/imagenesClientes/<?php echo $clientes->imagen ?>">
                <?php } ?>
            </div>
        </div>
    </fieldset>

    <!-- Datos de facturación -->
    <fieldset>
        <legend>Datos personales</legend>
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="clientes[nombre]" placeholder="Nombre" value="<?php echo s($clientes->nombre); ?>">
        </div>

        <div class="campo">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="clientes[apellidos]" placeholder="Apellidos" value="<?php echo s($clientes->apellidos); ?>">
        </div>
        
        <div class="campo">
            <label for="direccion">Dirección </label>
            <input type="text" id="direccion" name="clientes[direccion]" placeholder="Dirección" value="<?php echo s($clientes->direccion); ?>">
        </div>

        <div class="varios">
            <div class="campo numero">
                <label for="numero">Nº </label>
                <input type="number" id="numero" name="clientes[numero]" placeholder="Nº" value="<?php echo s($clientes->numero); ?>">
            </div>
            <div class="campo codigo">
                <label for="codigopostal">CP </label>
                <input type="number" id="codigopostal" name="clientes[codigopostal]" placeholder="Codigo postal" value="<?php echo s($clientes->codigopostal); ?>">
            </div>
        </div>

        <div class="varios">
            <div class="campo poblacion">
                <label for="poblacion">Población </label>
                <input type="text" id="poblacion" name="clientes[poblacion]" placeholder="Poblacion" value="<?php echo s($clientes->poblacion); ?>">
            </div>
            <div class="campo provincia">
                <label for="provincia">Provincia </label>
                <input type="text" id="provincia" name="clientes[provincia]" placeholder="Provincia" value="<?php echo s($clientes->provincia); ?>">
            </div>
        </div>

        <div class="varios">
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
    <fieldset>
        <legend>Datos de acceso</legend>
        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" name="clientes[email]" placeholder="Email" value="<?php echo s($clientes->email); ?>">
        </div>
    </fieldset>
 
    <!-- Datos de pago -->
    <fieldset>
        <legend>Datos de pago</legend>         
        <div class="varios">
            <div class="campo">
                <label for="pago">Forma de pago </label>
                <input id="pago" type="text" name="clientes[formapago]" value="<?php echo s($clientes->formapago); ?>">
            </div>
            
            <div class="campo">
                <label for="fecha">Dia pago</label>
                <input id="fecha" type="number" name="clientes[diapago]" min="1" max="31" value="<?php echo s($clientes->diapago); ?>">
            </div>
            
            <div class="campo">
                <label for="pagook">Pagado</label>
                <select name="clientes[pagook]" id="pagook" >
                    <option value=""><?php echo s($clientes->pagook); ?></option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>
    </fieldset>

    <!-- Datos App -->
    <fieldset>
        <legend>Datos App</legend>
        <div class="campo">
            <label for="db_user">DB_USER</label>
            <input type="text" id="db_user" name="clientes[db_user]" placeholder="db_user" value="<?php echo s($clientes->db_user); ?>">
        </div>
        <div class="campo">
            <label for="db_pass">DB_PASS</label>
            <input type="text" id="db_pass" name="clientes[db_pass]" placeholder="db_pass" value="<?php echo s($clientes->db_pass); ?>">
        </div>
        <div class="campo">
            <label for="db_bd">DB_BD</label>
            <input type="text" id="db_bd" name="clientes[db_bd]" placeholder="db_bd" value="<?php echo s($clientes->db_bd); ?>">
        </div>
        <div class="campo">
            <label for="direccionapp">Direccion App</label>
            <input type="text" id="direccionapp" name="clientes[direccionapp]" placeholder="Direccion app" value="<?php echo s($clientes->direccionapp); ?>">
        </div>
    </fieldset>

    <!-- Varios -->
    <fieldset>
        <legend>Varios</legend>
        <div class="campo">
            <label for="token">Token</label>
            <input type="text" id="token" name="clientes[token]" placeholder="Token" value="<?php echo s($clientes->token); ?>">
        </div>
        <div class="campo">
            <label for="confirmado">Confirmado</label>
            <input type="text" id="confirmado" name="clientes[confirmado]" placeholder="confirmado" value="<?php echo s($clientes->confirmado); ?>">
        </div>
        <div class="campo">
            <label for="rol">Rol</label>
            <input type="text" id="rol" name="clientes[rol]" placeholder="rol" value="<?php echo s($clientes->rol); ?>">
        </div>
        <div class="campo">
            <label for="creado">Creado</label>
            <input type="date" id="creado" name="clientes[creado]" placeholder="creado" value="<?php echo s($clientes->creado); ?>">
        </div>
    </fieldset>




