
<?php 
    $idclienteS = $_SESSION['id'];
    $orden; 
    $totalht = 0;
    $totalhm = 0;
    $totalcp = 0;
    $T = 0;
    $M = 0;
    $P = 0;

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
            </div>
                
            <div class="contenedorBusquedas">
                <div class="campo finicio">
                    <label for="">Fecha inicio</label>
                    <input type="date" id="fechainicio" name="partes[fechainicio]" value="<?php echo $fechainicio; ?>">
                </div>
                
                <div class="campo ffin">
                    <label for="">Fecha fin</label>
                    <input type="date" id="fechafin" name="partes[fechafin]" value="<?php echo $fechafin; ?>">
                </div>
                
                <div class="campo client">
                    <label for="clientes">Clientes</label>
                    <select id="clientes" name="partes[clientesApp]">
                        <?php if($clienteselect) { ?>
                            <option class="optionselect" value="<?php echo $clienteseleccionado[0]['id']; ?>"><?php echo $clienteseleccionado[0]['nombre']; ?></option>
                        <?php } else { ?>
                            <option>Seleccione cliente</option>
                        <?php } ?>

                        <?php foreach($clientes as $cliente ) {?>
                            <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nombre']; ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="campo finc">
                    <label for="fincas">Fincas</label>
                    <select id="idfinca" name="partes[fincas]">
                        <option class="fincaPlaceholder" value="">Seleccione cliente primero</option>
                    </select>
                </div>

                <div class="campo boton">
                    <input type="submit" class="botonGuardar" value="Enviar">
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
                    <input type="hidden" name="partes[orden]" class="imgoculto" value="<?php echo $orden?>">
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
                    <th>H. Tra.</th>
                    <th>H. Maq.</th>
                    <th>C. Pro.</th>
                    <th class="ver">Ver más</th>
                </tr>
            </thead>
            
            <tbody id="cuerpo" >  
                <?php if($alertas) { ?>
                    <p class="info"> <?php echo $alertas; ?></p>
                <?php } ?>
                <?php if($listadopartes){ ?>
                    <?php foreach($listadopartes as $parte ):?>
                        <tr>
                            <td class="id"><?php echo $parte['autonumero']; ?></td>
                            <td class="fecha"><?php echo $parte['fecha']; ?></td>
                            <td class="nombre"><?php echo $parte['nombre'] . ' ' . $parte['apellidos']; ?></td>
                            <td class="finca"><?php echo $parte['finca']; ?></td>
                            <td class="ht"><?php echo $parte['horastrabajo']; ?></td>
                            <td class="hm"><?php echo $parte['horasmaquina']; ?></td>
                            <td class="cp"><?php echo $parte['cantpro']; ?></td>
                            <td class="edit">
                                <a class="ver pulsacion2" href="partes/vermas?idparte=<?php echo $parte['idparte']; ?>">
                                    <img src="/build/img/mas.png" alt="">
                                </a>
                            </td>
                        </tr>

                        <?php $totalht = (float)$parte['horastrabajo']; $T += $totalht; ?>
                        <?php $totalhm = (float)$parte['horasmaquina']; $M += $totalhm; ?>
                        <?php $totalcp = (float)$parte['cantpro']; $P += $totalcp; ?>

                    <?php endforeach ?>
                <?php } ?>
                    <tr class='noSearch hide alerta'>
                        <td class="zonaAlerta" ></td>
                    </tr>
            </tbody>
        </table>

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

        <hr>

        <!-- Paginacion -->
        <div class="paginacion">
            <div class="campo">
                <?php echo $paginacion; ?>
            </div>
        </div>
    </div>

    <?php $script = '<script src="/build/js/orden.js"></script>'; ?>
    <?php $script .= '<script src="/build/js/buscador.js"></script>'; ?>
    <?php $script .= '<script src="/build/js/gestion/listados.js"></script>'; ?>