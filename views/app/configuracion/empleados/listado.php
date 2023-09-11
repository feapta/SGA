
<!-- Ver todas las empleadoss-->
    
    
    <div class="contenedorUno">
        <a href="/empleados/crear" class="botonCrear">Crear</a>
        <h4>Listado empleados</h4>
    </div>

    <table id="empleados" class="tablas">
        <thead class="cabeceraTabla">
            <tr>
                <th>Id</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Tlf.</th>
                <th>Categoria</th>
                <th>Precio hora</th>
                <th>Creado</th>
                <th>Ver más</th>
            </tr>
        </thead>
        
        <tbody id="cuerpo">
            <?php foreach($empleados as $empleado ): ?>
                <tr>
                    <td><?php echo $empleado->autonumero; ?></td>
                    <td><img src="/imagenesEmpleados/<?php echo $empleado->imagen; ?>" alt="Imagen" class="imagen peque"></td>
                    <td><?php echo $empleado->nombre . ' ' . $empleado->apellidos; ?></td>
                    <td><?php echo $empleado->telefono; ?></td>
                    <td><?php echo $empleado->categoria; ?></td>
                    <td><?php echo $empleado->preciohora; ?></td>
                    <td><?php echo $empleado->creado; ?></td>
                    <td class="edicion">
                        <a class="vermas" href="/empleados/completo?id=<?php echo $empleado->id; ?> "><img src="build/img/mas.png" alt=""></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

