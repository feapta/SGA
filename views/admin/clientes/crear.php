
<!-- Crear clientes-->

<div class="contenedor contenido_centrado ver">

    <div class="contiene contenido_centrado">

    <div class="contenedorCabecera">
        <div class="contenedorBotones">
            <a href="/clientes/listado" class="boton_light-green-400 volver" type="submit">Cerrar</a>
        </div>

        <div class="titulo">
            <h3>Crear cliente</h3>
        </div>
    </div>


        <form  class="contenedorFormulario" method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>

            <div class="contenedoBotones">
                <input type="submit" class="boton_verde" value="Guardar">
            </div>
        </form>
    </div>

</div>
