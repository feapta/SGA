
<?php 
    $idclienteS = $_SESSION['id']; 
    $orden; 
?>

<!-- Listado de partes -->
    
    <div class="partesListado">
        <form class="formRegistros" method="POST">

            <div class="contenedorDos">
                <input type="hidden" value="<?php echo $idclienteS; ?>" name="partes[idclientesistemar]">
                
                <div class="conuno">
                    <a href="/partes/crear?idclienteS=<?php echo $idclienteS; ?>" class="botonCrear">Crear</a>
                </div>

                <div class="condos">
                    <h4>Listado Partes</h4>
                </div>

                <div class="contres">
                    <div class="campo">
                        <label for="">Fecha inicio</label>
                        <input type="date" id="fechainicio" name="partes[fechainicio]" value="<?php echo $fechainicio; ?>">
                    </div>
                    
                    <div class="campo">
                        <label for="">Fecha fin</label>
                        <input type="date" id="fechafin" name="partes[fechafin]" value="<?php echo $fechafin; ?>">
                    </div>
                    
                    <div class="campo">
                        <input class="peticionfecha imgboton peque" type="image" src="/build/img/ok_verde.png" alt=""  onclick="this.form.submit()">
                    </div>
                </div>
            </div>

            <div class="contenedorTres">
                <div class="campoUno">
                    <label for="">Registros</label>
                    <select name="partes[numeroRegistros]" onchange="this.form.submit()">
                        <option value="<?php echo $limite?>"><?php echo $limite?></option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                
                <div class="campoDos">
                    <!-- Orden de los registros -->
                    <label for="orden">Orden</label>
                    <input type="image"class="flecha pulsacion <?php echo $orden; ?>">
                    <input type="hidden" name="partes[orden]" class="imgoculto" >
                </div>

                <div class="campoTres">
                    <label for="totalregistrosporpagina">Total</label>
                    <input type="text" value="<?php echo $cuenta?>">
                </div>

                <div class="campoCuatro">
                    <label for="busquedaRegistro">Buscar</label>
                    <input id="searchTerm" type="text" placeholder="Escriba para buscar" onkeyup="doSearch()" />
                </div>
            </div>
        </form>

        <table id="parte" class="tablas">
            <thead class="cabeceraTabla">
                <tr>
                    <th>Id</th>
                    <th class="Tfecha">Fecha</th>
                    <th class="">Cliente</th>
                    <th class="">Finca</th>
                    <th class="">Ver más</th>
                </tr>
            </thead>
            
            <tbody id="cuerpo" >
                
                <?php if($alertas) { ?>
                    <p class="info"> <?php echo $alertas; ?></p>
                <?php } ?>

                <?php foreach($nombrepartes as $parte ):?>
                    <tr>
                        <td><?php echo $parte['autonumero']; ?></td>
                        <td class="Tfecha"><?php echo $parte['fecha']; ?></td>
                        <td><?php echo $parte['nombre'] . ' ' . $parte['apellidos']; ?></td>
                        <td><?php echo $parte['finca']; ?></td>
                        <td class="edicion">
                            <a class="vermas" href="partes/vermas?idparte=<?php echo $parte['idparte']; ?>">
                                <img src="/build/img/mas.png" alt="">
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
                    <tr class='noSearch hide alerta'>
                        <td class="zonaAlerta" ></td>
                    </tr>
            </tbody>
        </table>

        <div class="paginacion">
            <div class="campo">
                <?php echo $paginacion; ?>
            </div>
        </div>
    </div>

    <?php $script .= '<script src="/build/js/orden.js"></script>'; ?>
    <?php $script .= '<script src="/build/js/buscador.js"></script>'; ?>