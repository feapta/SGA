
<?php 
    $idclienteS = $_SESSION['id']; 
    $orden; 
?>

<!-- Listado de partes -->
    
    <div class="partesListado">
        <div class="contenedorSeleccion">
            <div class="partes pulsacion2">
                <h4>Partes</h4>
            </div>

            <div class="gastos pulsacion2">
                <h4>Gastos</h4>
            </div>
        </div>

        <div class="formPartes">
            <form method="post" action="/listados/listadosPartes">
                <input type="hidden" value="<?php echo $idclienteS; ?>" name="partes[idclientesistemar]">
                <h4>Listados de partes</h4>
            
                <div class="contenedorSelectores">
                    <div class="contenedorPrimero">
                        <div class="campo fechainicio">
                            <label for="">Fecha inicio</label>
                            <input type="date" id="fechainicio" name="partes[fechainicio]" value="<?php echo $fechainicio; ?>">
                        </div>
                        
                        <div class="campo fechafin">
                            <label for="">Fecha fin</label>
                            <input type="date" id="fechafin" name="partes[fechafin]" value="<?php echo $fechafin; ?>">
                        </div>

                        <div class="campo">
                            <label for="clientes">Clientes</label>
                            <select id="clientes" name="partes[clientesApp]">
                                <option value="">Selecione un cliente</option>
                                <?php foreach($clientes as $cliente) { ?>
                                    <option value="<?php echo s($cliente->id); ?>"> <?php echo $cliente->nombre . ' ' . $cliente->apellidos; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="contenedorSegundo">
                        <div class="campo">
                            <label for="fincas">Fincas</label>
                            <select name="partes[fincas]" id="idfinca">
                                <option value="">Seleccione primero un cliente</option>

                            </select>
                        </div>

                        <div class="campo">
                            <label for="empleados">Empleados</label>
                            <select id="empleados" name="partes[empleados]">
                                <option value="">Selecione un empleado</option>
                                <?php foreach($empleados as $empleado) { ?>
                                    <option value="<?php echo s($empleado->id); ?>"> <?php echo $empleado->nombre . ' ' . $empleado->apellidos; ?></option>
                                <?php }?>
                            </select>
                        </div>

                        <input type="submit" value="Enviar" class="botonGuardar">
                    </div>
                </div>

                <div class="contenedorTres">
                    <div class="campoUno">
                        <label for="">Nº Regis.</label>
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
                        <th class="">Fecha</th>
                        <th class="">Cliente</th>
                        <th class="">Finca</th>
                        <th class="">Empleado</th>
                        <th class="">Horas</th>
                        <th class="">Maquinas</th>
                        <th class="">Horas</th>
                        <th class="">Productos</th>
                        <th class="">Cant.</th>
                    </tr>
                </thead>
                
                <tbody id="cuerpo" >
                </tbody>
            </table>

            <div class="paginacion">
                <div class="campo">
                    <?php echo $paginacion; ?>
                </div>
            </div>
        </div>
        


        <div class="formGastos ocultar">
            <form action="/listados/listadosGastos" method="post">
                <input type="hidden" value="<?php echo $idclienteS; ?>" name="partes[idclientesistemar]">
                <h4>Listados de gastos</h4>
                
                <div class="contenedorSelectores">
                    <div class="contenedorPrimero">
                        <div class="campo fechainicio">
                            <label for="">Fecha inicio</label>
                            <input type="date" id="fechainicio" name="partes[fechainicio]" value="<?php echo $fechainicio; ?>">
                        </div>
                        
                        <div class="campo fechafin">
                            <label for="">Fecha fin</label>
                            <input type="date" id="fechafin" name="partes[fechafin]" value="<?php echo $fechafin; ?>">
                        </div>
                    </div>

                    <div class="contenedorSegundo">
                        <div class="campo">
                            <label for="tipo">Tipo</label>
                            <input type="text" id="tipo" name="partes[tipo]">
                        </div>

                        <div class="campo">
                            <label for="empleados">Empleados</label>
                            <input type="text" id="empleados" name="partes[empleados]">
                        </div>
                        
                        <input type="submit" value="Enviar" class="botonGuardar">
                    </div>
                </div>

                <div class="contenedorTres">
                    <div class="campoUno">
                        <label for="">Nº Regis.</label>
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
                        <th class="">Fecha</th>
                        <th class="">Concepto</th>
                        <th class="">Tipo</th>
                        <th class="">Empleado</th>
                        <th class="">Importe</th>
                    </tr>
                </thead>
                
                <tbody id="cuerpo" >
                </tbody>
            </table>

            <div class="paginacion">
                <div class="campo">
                    <?php echo $paginacion; ?>
                </div>
            </div>
        
        </div>
    </div>


    <?php $script .= '<script src="/build/js/gestion/listados.js"></script>'; ?>
    <?php $script .= '<script src="/build/js/orden.js"></script>'; ?>