

<!-- Pagina del formulario -->
<div class="contenedorUno">
    <a href="/clientesApp?idclienteS=<?php echo $clientesApp->idclientesistemar; ?>" class="botonCerrar" type="submit">Cerrar</a>
    <h4>Datos del cliente</h4>
    <div class="edicion">
        <a class="vermas" href="/clientesApp/actualizar?id=<?php echo $clientesApp->id; ?>"> 
            <img src="/build/img/lapiz.png" alt=""> 
        </a>
        <input class="vermas" type="image" onclick="confirmarEliminar(<?php echo $clientesApp->id; ?>, 
                                                                'clientesApp', 
                                                                'clientesApp', 
                                                                'clientesApp?idclienteS=<?php echo $clientesApp->idclientesistemar;?>', 
                                                                2)"
                                                                src="/build/img/papelera.png" alt="">
    </div>
</div>

<div class="contenedorGlobal">
    <?php  if($clientesApp->imagen) { ?>
        <img src="/imagenesclientesApp/<?php echo $clientesApp->imagen ?>" class="imagen peque">
    <?php } ?>
    
    <!-- Nombrer y apellidos -->
    <div class="campos nombre">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="clientesApp[nombre]" placeholder="Nombre" value="<?php echo s($clientesApp->nombre); ?>" disabled>
        </div>
        
        <div class="campo">
            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="clientesApp[apellidos]" placeholder="Apellidos" value="<?php echo s($clientesApp->apellidos); ?>" disabled>
        </div>
    </div>

    <!-- Direccion -->
    <div class="campos direccion">
        <div class="campo dire">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="clientesApp[direccion]" placeholder="Dirección" value="<?php echo s($clientesApp->direccion); ?>" disabled> 
        </div>

        <div class="campo nume">
            <label for="numero">Nº</label>
            <input type="number" id="numero" name="clientesApp[numero]" placeholder="Nº" value="<?php echo s($clientesApp->numero); ?>"disabled>
        </div>
    </div>

        <!-- Codigo Postal y poblacion -->
    <div class="campos">
        <div class="campo">
            <label for="codigopostal">CP</label>
            <input type="number" id="codigopostal" name="clientesApp[codigopostal]" placeholder="Codigo postal" value="<?php echo s($clientesApp->codigopostal); ?>" disabled>
        </div>

        <div class="campo">
            <label for="poblacion">Población</label>
            <input type="text" id="poblacion" name="clientesApp[poblacion]" placeholder="Población" value="<?php echo s($clientesApp->poblacion); ?>" disabled>
        </div>
    </div>

    <!-- Provincia y pais -->
    <div class="campos provincia">
        <div class="campo">
            <label for="provincia">Provincia</label>
            <input type="text" id="provincia" name="clientesApp[provincia]" placeholder="provincia" value="<?php echo s($clientesApp->provincia); ?>" disabled>
        </div>
        
        <div class="campo">
            <label for="provincia">Pais</label>
            <input type="text" id="pais" name="clientesApp[pais]" placeholder="pais" value="<?php echo s($clientesApp->pais); ?>"disabled>
        </div>
    </div>

        <!-- Email -->
    <div class="campos email">
        <div class="campo">
            <label for="email">Email</label>
            <input type="text" id="email" name="clientesApp[email]" placeholder="Email" value="<?php echo s($clientesApp->email); ?>" disabled>
        </div>
    </div>

    <!-- DNI Telefono IVA -->
    <div class="campos dni">
        <div class="campo">
            <label for="dninif">DNI/NIF</label>
            <input type="text" id="dninif" name="clientesApp[dninif]" placeholder="Dni/Nif" value="<?php echo s($clientesApp->dninif); ?>" disabled>
        </div>

        <div class="campo">
            <label for="telefono">TLF.</label>
            <input type="text" id="telefono" name="clientesApp[telefono]" placeholder="Teléfono" value="<?php echo s($clientesApp->telefono); ?>" disabled>
        </div>

        <div class="campo">
            <label for="tipoiva">Tipo IVA</label>
            <input type="text" id="tipoiva" name="clientesApp[tipoiva]" placeholder="Tipo IVA" value="<?php echo s($clientesApp->tipoiva); ?>" disabled>
        </div>
    </div>

    <div class="campos tablaFincas">
        <table id="clientesApp" class="tablas">
            <thead class="cabeceraTabla">
                <tr>
                    <th >Id</th>
                    <th >Imagen</th>
                    <th >Nombre</th>
                    <th >Localización</th>
                    <th >Ha</th>

                </tr>
            </thead>
            
            <tbody id="cuerpo">
                <?php foreach($fincas as $finca ): ?>
                    <tr disabled>
                        <td class="Ids" ><?php echo $finca->autonumero; ?></td>
                        <td class="Imagenes" ><img src="/imagenesFincas/<?php echo $finca->imagen; ?>" alt="Imagen" class="imagen peque"></td>
                        <td class="Nombre" ><?php echo $finca->nombre; ?></td>
                        <td class="localizacion"><?php echo $finca->lati . ' - ' . $finca->longi ; ?></td>
                        <td class="hectareas" ><?php echo $finca->hectareas . ' Ha'  ; ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div class="campos">
        <div class="campo">
            <label for="notas">Notas</label>
            <input type="textarea" id="notas" name="clientesApp[notas]" value="<?php echo s($clientesApp->notas); ?>" disabled>
        </div>
    </div>
</div>


<?php $script = '<script src="/build/js/imagenAgrandar.js"></script>' ?>
