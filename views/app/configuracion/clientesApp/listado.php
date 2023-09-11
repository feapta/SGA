
<?php $idcliente = $_SESSION['id']; ?>

<!-- Ver todas las clientesApps-->
    
    <div class="contenedorUno">
        <a href="/clientesApp/crear" class="botonCrear">Crear</a>
        <h4>Listado clientes</h4>
    </div>

    <table id="clientesApp" class="tablas">
        <thead class="cabeceraTabla">
            <tr>
                <th >Id</th>
                <th >Imagen</th>
                <th >Nombre</th>
                <th class="" >Tlf.</th>
                <th class="" >Email</th>
                <th class="" >Notas</th>
                <th>Ver mas</th>
            </tr>
        </thead>
        
        <tbody id="cuerpo">
            <?php foreach($clientesApp as $clienteApp ): ?>
                <tr>
                    <td class="Ids" ><?php echo $clienteApp->autonumero; ?></td>
                    <td class="Imagenes"><img src="/imagenesclientesapp/<?php echo $clienteApp->imagen; ?>" alt="Imagen" class="imagen peque"></td>
                    <td class="Nombre" ><?php echo $clienteApp->nombre . ' ' . $clienteApp->apellidos; ?></td>
                    <td class="telefono" ><?php echo $clienteApp->telefono; ?></td>
                    <td class="email" ><?php echo $clienteApp->email; ?></td>
                    <td class="notas" ><?php echo $clienteApp->notas; ?></td>
                    <td class="mas">
                        <a class="vermas" 
                            href="/clientesApp/completo?id=<?php echo $clienteApp->id; ?> ">
                            <img src="/build/img/mas.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>