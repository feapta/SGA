
<?php 
    $idclienteS = $_SESSION['id']; 
    $totalht = 0;
    $totalhm = 0;
    $totalcp = 0;
    $T = 0;
    $M = 0;
    $P = 0;
?>

<!-- Parte completo -->

    <div class="partesVermas">
        
        <div class="contenedorUno">
            <a href="/partes?idclienteS=<?php echo $idclienteS; ?>" class="botonCerrar volver" type="submit">Cerrar</a>
            <h4>Parte completo</h4>

            <div class="edicion">
                <a href="/partes/actualizar?idparte=<?php echo $partes[0]['idparte']; ?>&idclienteS=<?php echo $idclienteS;?>">  
                        <img src="/build/img/lapiz.png" alt="">  
                </a>
                <input type="image" onclick="eliminarParte('<?php echo $idclienteS;?>', <?php echo $idparte = $_GET['idparte']; ?>)" 
                        src="/build/img/papelera.png" alt="papelera">
            </div>
        </div>

        <!-- Fecha --> <!-- Clientes -->
        <div class="campos Fecha">
            <!-- Fecha -->
            <div class="campo">
                <label for="id">Id</label>
                <input type="text" id="id" value="<?php echo $partes[0]['autonumero']; ?>" disabled>
            </div>

            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" value="<?php echo $partes[0]['fecha']; ?>" disabled>
            </div>
            
            <!-- Clientes -->
            <div class="campo">
                <label for="idclienteapp">Cliente</label>
                <input type="text" id="idclienteapp" value="<?php echo $partes[0]['nombre'] . ' ' . $partes[0]['apellidos']; ?>" disabled>
            </div>
        </div>

        <!-- Fincas -->
        <div class="campos Finca">
            <label for="idfincas">Finca</label>
            <input type="text" id="idfinca" value="<?php echo s($partes[0]['finca']); ?>" disabled>
        </div>

        <!-- Tabla -->
        <div class="campos">
            <table id="parte" class="tablas" >
                <thead class="cabeceraTabla">
                    <tr>
                        <th class="CAnombreEmpleado">Empleados</th>
                        <th class="CAselectTrabajos">Trabajos</th>
                        <th class="CAcantTra">Horas</th>
                        <th class="CAselectMaquinas">Maquinas</th>
                        <th class="CAcantMaq">Horas</th>
                        <th class="CAselectProductos">Productos</th>
                        <th class="CAcantPro">Cant.</th>
                    </tr>
                </thead>

                <tbody id="cuerpo" >
                    <?php foreach($trabajos as $trabajo ): ?>
                        <tr>
                            <td class="nombre"><?php echo $trabajo['empleados']. ' ' .$trabajo['apellidos']; ?></td>
                            <td class="trabajo"><?php echo $trabajo['trabajos']; ?></td>
                            <td class="htrabajos"><?php echo $trabajo['horastrabajo']; ?></td>
                            <td class="maquinas"><?php echo $trabajo['maquinas']; ?></td>
                            <td class="hmaquinas"><?php echo $trabajo['horasmaquina']; ?></td>
                            <td class="productos"><?php echo $trabajo['productos']; ?></td>
                            <td class="cproductos"><?php echo $trabajo['cantidadproductos']; ?></td>
                            
                            <?php $totalht = (float)$parte['horastrabajo']; $T += $totalht; ?>
                            <?php $totalhm = (float)$parte['horasmaquina']; $M += $totalhm; ?>
                            <?php $totalcp = (float)$parte['cantpro']; $P += $totalcp; ?>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

         <!-- totales -->
         <div class="totales">
            <div class="campo">
                <label>Totales: </label>
            </div>
            <div class="campo">
                <label for="totalhorastrabajo">T. Ht</label>
                <input type="text"  value="<?php echo $T; ?>">
            </div>
            <div class="campo">
                <label for="totalhorasmaquina">T. Hm</label>
                <input type="text"  value="<?php echo $M; ?>">
            </div>
            <div class="campo">
                <label for="totalcantidadproducto">T. Cp</label>
                <input type="text" class="Tcantpro" value="<?php echo $P; ?>">
            </div>
        </div>

    </div>

<?php $script = '<script src="/build/js/gestion/eliminarParte.js"></script> '?>


