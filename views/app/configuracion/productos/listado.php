
<!-- Ver todas las productosss-->

    
    
    <div class="contenedorUno">
        <a href="/productos/crear" class="botonCrear">Crear</a>
        <h4>Listado productos</h4>
    </div>

    <table id="productos" class="tablas">
        <thead class="cabeceraTabla">
            <tr>
                <th class="caId">Id</th>
                <th class="caIm">Imagen</th>
                <th class="caNo">Nombre</th>
                <th class="capr">Tipo</th>
                <th class="cala">Kilo/Litro</th>
                <th class="calo">Precio</th>
                <th class="cacr">Creada</th>
                <th class="caed">Edicion</th>
            </tr>
        </thead>
        
        <tbody id="cuerpo">
            <?php foreach($productos as $producto ): ?>
                <tr>
                    <td><?php echo $producto->autonumero; ?></td>
                    <td><img src="/imagenesproductos/<?php echo $producto->imagen; ?>" alt="Imagen" class="imagen peque"></td>
                    <td><?php echo $producto->nombre; ?></td>
                    <td><?php echo $producto->tipo; ?></td>
                    <td><?php echo $producto->kilolitro; ?></td>
                    <td><?php echo $producto->precio; ?></td>
                    <td><?php echo $producto->creada; ?></td>
                    <td class="edicion">
                        <a href="productos/actualizar?id=<?php echo $producto->id; ?>">
                            <img class="lapiz" src="/build/img/lapiz.png" alt="">
                        </a>
                        <input type="image" onclick="confirmarEliminar(<?php echo $producto->id; ?>, 
                                                                       'producto', 
                                                                       'producto', 
                                                                       'producto?idcliente=<?php echo $producto->idcliente;?>', 
                                                                       5)"
                                                                       src="/build/img/papelera.png" alt="">
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

