
<!-- Ver todas las fincass-->

<div class="contenedor fincasListado tablas">
    <h5>Listado fincas</h5>
    
    <div class="contenedoBotones">
        <a href="/fincas/crear" class="boton_light-green-400">Crear</a>
    </div>

    <table id="fincas">
        <thead class="cabeceras">
            <tr>
                <th class="caId">Id</th>
                <th class="caIm">Imagen</th>
                <th class="caNo">Nombre</th>
                <th class="capr">Propietario</th>
                <th class="cala">Latitud</th>
                <th class="calo">Longiud</th>
                <th class="cahe">Hectareas</th>
                <th class="cacr">Creada</th>
                <th class="caed">Edicion</th>
            </tr>
        </thead>
        
        <tbody id="cuerpo">
            <?php foreach($fincas as $finca ): ?>
                <tr>
                    <td><?php echo $finca->id; ?></td>
                    <td><img src="/imagenesFincas/<?php echo $finca->imagen; ?>" alt="Imagen" class="imagenfincas"></td>
                    <td><?php echo $finca->nombre; ?></td>
                    <td><?php echo $finca->propietario; ?></td>
                    <td><?php echo $finca->lati; ?></td>
                    <td><?php echo $finca->longi; ?></td>
                    <td><?php echo $finca->hectareas; ?></td>
                    <td><?php echo $finca->creada; ?></td>
                    <td class="edicion">
                        <a href="fincas/actualizar?id=<?php echo $finca->id; ?>">
                            <img src="/build/img/lapiz.svg" alt="">
                        </a>

                        <input type="image" onclick="confirmarEliminar()"src="/build/img/papelera.webp" alt="">
                        <input type="hidden" id="id" name="id" value="<?php echo $finca->id; ?>">
                        <input type="hidden" id="tipo" name="tipo" value="fincas">
                        <input type="hidden" id="tabla" name="tabla" value="fincas">
                        <input type="hidden" id="direccionRecibida" name="direccionRecibida" value="fincas?idcliente=<?php echo $finca->idcliente;?>">
                        <input type="hidden" id="numero" name="numero" value="3">
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

