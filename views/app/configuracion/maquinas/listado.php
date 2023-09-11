
<!-- Ver todas las maquinas-->

    <div class="contenedorUno">
        <a href="/maquinas/crear" class="botonCrear">Crear</a>
        <h4>Listado maquinas</h4>
    </div>

    <table id="maquinas" class="tablas">
        <thead class="cabeceraTabla">
            <tr>
                <th class="caId">Id</th>
                <th class="caIm">Imagen</th>
                <th class="caNo">Nombre</th>
                <th class="capr">Precio</th>
                <th class="cacr">Creada</th>
                <th class="caed">Edicion</th>
            </tr>
        </thead>
        
        <tbody id="cuerpo">
            <?php foreach($maquinas as $maquina ): ?>
                <tr>
                    <td><?php echo $maquina->autonumero; ?></td>
                    <td><img src="/imagenesMaquinas/<?php echo $maquina->imagen; ?>" alt="Imagen" class="imagen peque"></td>
                    <td><?php echo $maquina->nombre; ?></td>
                    <td><?php echo $maquina->precioHora; ?>&nbsp;€</td>
                    <td><?php echo $maquina->creada; ?></td>
                    <td class="edicion">
                        <a href="maquinas/actualizar?id=<?php echo $maquina->id; ?>">
                            <img src="/build/img/lapiz.png" alt="">
                        </a>
                        <input type="image" onclick="confirmarEliminar(<?php echo $maquina->id; ?>, 
                                                                       'maquinas', 
                                                                       'maquinas', 
                                                                       'maquinas?idcliente=<?php echo $maquina->idcliente;?>', 
                                                                       4)"
                                                                       src="/build/img/papelera.png" alt="">
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
