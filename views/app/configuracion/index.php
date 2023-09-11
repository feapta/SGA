
<?php    $idclienteS = $_SESSION['id']; ?>

<!-- contenido Index de configuracion -->

<div class="contenidoIndexApp">
<div class="configuracion">
        <div class="informe pulsacion">
            <a href="/clientesApp?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Clientes</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/clientes.png" alt="">
                    </div>
                    <div class="der">
                        <?php foreach($clientesapp as $clienteapp) { ?>
                            <p><?php echo $clienteapp; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="informe pulsacion">
            <a href="/fincas?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Fincas</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/fincas.png" alt="">
                    </div>
                    <div class="der">
                        <?php foreach($fincas as $finca) { ?>
                            <p><?php echo $finca; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="informe pulsacion">
            <a href="/maquinas?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Maquinas</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/maquinas.png" alt="">
                    </div>
                    <div class="der">
                        <?php foreach($maquinas as $maquina) { ?>
                            <p><?php echo $maquina; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="informe pulsacion">
            <a href="/productos?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Productos</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/productos.png" alt="">
                    </div>
                    <div class="der">
                        <?php foreach($productos as $producto) { ?>
                            <p><?php echo $producto; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="informe pulsacion">
            <a href="/empleados?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Empleados</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/empleados.png" alt="">
                    </div>
                    <div class="der">
                        <?php foreach($empleados as $empleado) { ?>
                            <p><?php echo $empleado; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="informe pulsacion">
            <a href="/trabajos?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Trabajos</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/trabajos.png" alt="">
                    </div>
                    <div class="der">
                        <?php foreach($trabajos as $trabajo) { ?>
                            <p><?php echo $trabajo; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>