
<!-- Ver todas las trabajoss-->
    
    <div class="contenedorUno">
        <a href="/trabajos/crear" class="botonCrear">Crear</a>
        <h4>Listado trabajos</h4>
    </div>

    <table id="trabajos" class="tablas">
        <thead class="cabeceraTabla">
            <tr>
                <th class="caId">Id</th>
                <th class="caIm">Imagen</th>
                <th class="caNo">Nombre</th>
                <th class="capr">Precio hora</th>
                <th class="cacr">Creada</th>
                <th class="caed">Edicion</th>
            </tr>
        </thead>
        
        <tbody id="cuerpo">
            <?php foreach($trabajos as $trabajo ): ?>
                <tr>
                    <td><?php echo $trabajo->autonumero; ?></td>
                    <td><img src="/imagenesTrabajos/<?php echo $trabajo->imagen; ?>" alt="Imagen" class="imagen peque"></td>
                    <td><?php echo $trabajo->nombre; ?></td>
                    <td><?php echo $trabajo->preciohora; ?></td>
                    <td><?php echo $trabajo->creada; ?></td>
                    <td class="edicion">
                        <a href="trabajos/actualizar?id=<?php echo $trabajo->id; ?>">
                            <img src="/build/img/lapiz.png" alt="">
                        </a>
                        <input type="image" onclick="confirmarEliminar(<?php echo $trabajo->id; ?>, 
                                                                       'trabajos', 
                                                                       'trabajos', 
                                                                       'trabajos?idcliente=<?php echo $trabajo->idcliente;?>', 
                                                                       7)"
                                                                       src="/build/img/papelera.png" alt="">
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
