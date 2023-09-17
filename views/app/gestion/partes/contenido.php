  
  <!-- CONTENIDO COMUN DE CREAR Y EDITAR PARTE -->
  
  <!-- Autonumero, Fecha y Clientes --> 
    <div class="campos Fecha">
        <!-- Autonumero -->
        <div class="campo">
            <label for="id">Id</label>
            <input type="text" id="autonumero" disabled>
        </div>

        <!-- Fecha -->
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" value="<?php echo $fecha = date('Y-m-d'); ?>">
        </div>
        
        <!-- Clientes -->
        <div class="campo">
            <label for="idclienteapp">Cliente</label>
            <select id="idclienteapp" >
            </select>
        </div>

        <div class="campo">
            <img src="/build/img/mas.png" alt="" onclick="nuevo('/clientesApp/crear')">
        </div>
    </div>

    <!-- Fincas -->
    <div class="campos Finca">
        <div class="campo">
                <label for="idfincas">Finca</label>
                <select id="idfinca" >
                </select>
        </div>
        <div class="campo">
            <img src="/build/img/mas.png" alt="" onclick="nuevo('/fincas/crear')">
        </div>
    </div>

    <!-- Empleados -->
    <div class="campos Empleado">
        <div class="campo">
            <label for="empleado">Empleado</label>
            <select id="selectEmpleadoCabecera"> </select>
        </div>

        <div class="campo">
            <img src="/build/img/mas.png" alt="" onclick="nuevo('/empleados/crear')">
        </div>
    </div>
    
    <!-- Tabla -->
    <div class="campos Tabla">
        <table id="parte" class="tablas" >
            <thead class="cabeceraTabla">
                <tr>
                    <!-- <th class="CA">i-PT</th> -->
                    <th class="CAfila">Id</th>
                    <th class="CAnombreEmpleado">Empleados</th>
                    <th class="CAselectTrabajos">Trabajos</th>
                    <th class="CAcantTra">Horas</th>
                    <th class="CAselectMaquinas">Maquinas</th>
                    <th class="CAcantMaq">Horas</th>
                    <th class="CAselectProductos">Productos</th>
                    <th class="CAcantPro">Cant.</th>
                    <th colspan="2">Edicion</th>
                </tr>
            </thead>

            <tbody id="cuerpo">
              
            </tbody>
        </table>
    </div>

    <!-- totales -->
    <div class="campos totales">
        <div class="campo">
            <label for="totalhorastrabajo">T. Ht</label>
            <input type="text" id="totalhotastrabajo" name="partes[totalhorastrabajo]" class="totalhorastrabajo">
        </div>
        <div class="campo">
            <label for="totalhorasmaquina">T. Hm</label>
            <input type="text" id="totalhotasmaquina" name="partes[totalhorasmaquina]" class="totalhorasmaquina">
        </div>
        <div class="campo">
            <label for="totalcantidadproducto">T. Cp</label>
            <input type="text" id="totalcantidadproducto" name="partes[totalcantidadproducto]" class="totalcantidadproducto">
        </div>
    </div>