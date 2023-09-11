<?php $idclienteS = $_SESSION['id']; ?>

<!-- Ver todas las fincass-->
    
    <div class="contenedorUno">
        <a href="/fincas/crear?idclienteS=<?php echo $idclienteS; ?>" class="botonCrear">Crear</a>
        <h4>Listado fincas</h4>
    </div>

    <table id="fincas" class="tablas">
        <thead class="cabeceraTabla">
            <tr>
                <th>Id</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Propietario</th>
                <th>Latitud</th>
                <th>Longiud</th>
                <th>Hectareas</th>
                <th>Creada</th>
                <th>Edicion</th>
            </tr>
        </thead>
        
        <tbody id="cuerpo">
            <?php foreach( $fincas as $finca ) : ?>
                <tr>
                    <td><?php echo $finca->autonumero; ?></td>
                    <td><img src="/imagenesFincas/<?php echo $finca->imagen; ?>" alt="Imagen" class="imagen peque"></td>
                    <td><?php echo $finca->nombre; ?></td>
                    <td><?php echo $finca->propietario; ?></td>
                    <td><?php echo $finca->lati; ?></td>
                    <td><?php echo $finca->longi; ?></td>
                    <td><?php echo $finca->hectareas; ?></td>
                    <td><?php echo $finca->creada; ?></td>
                    <td class="edicion">
                        <a href="fincas/actualizar?id=<?php echo $finca->id; ?>&idclienteS=<?php echo $idclienteS; ?>">
                            <img src="/build/img/lapiz.png" alt="">
                        </a>
                        <input type="image" onclick="confirmarEliminar(<?php echo $finca->id; ?>, 
                                                                       'fincas', 
                                                                       'fincas', 
                                                                       'fincas?idclienteS=<?php echo $idclienteS; ?>', 
                                                                       3)"
                                                                       src="/build/img/papelera.png" alt="">
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<?php $script = '<script src="/build/js/imagenAgrandar.js"></script>' ?>