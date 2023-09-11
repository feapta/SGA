<?php    $idclienteS = $_SESSION['id']; ?>

<!-- contenido Index -->
<div class="contenidoIndexApp">
    <div class="gestion">
        <div class="informe pulsacion">
            <a href="/partes?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Partes de trabajo</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/partes.png" alt="">
                    </div>
                    <div class="der">
                        <?php foreach($partes as $parte) { ?>
                            <p><?php echo $parte; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>

        <div class="informe pulsacion">
            <a href="/partes?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Control de gastos</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/gastos.png" alt="">
                    </div>
                    <div class="der">
                        <?php foreach($partes as $parte) { ?>
                            <p><?php echo $parte; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>

        <div class="informe pulsacion">
            <a href="/listados?idclienteS=<?php echo $idclienteS; ?>">
                <h4>Listados</h4>
                <div class="contenido_etiqueta">
                    <div class="izq">
                        <img src="/build/img/informes.png" alt="">
                    </div>
                    <div class="der">
                        <p>Listados personalizados</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>