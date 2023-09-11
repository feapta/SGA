
<!-- Solicitud de informacion -->

<div class="contenedor informacion">
    <h4>Solicitud de información</h4>
    <p>Rellene el formulario y en breve nos pondremos en contacto con uste. Gracias</p>

    <div class="contiene contenido_centrado">
        <form  class="contenedorFormulario" method="POST" enctype="multipart/form-data">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="informacion[nombre]" placeholder="Nombre" value="<?php echo s($informacion->nombre); ?>">
            </div>
            
            <div class="campo">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="informacion[apellidos]" placeholder="Apellidos" value="<?php echo s($informacion->apellidos); ?>">
            </div>

            <label class="contacto">Como desea que nos pongamos en contacto con usted.</label>
            <div class="radios">
                <div class="campo portelefono">
                    <label for="portelefono">Telefóno</label>
                    <input type="radio" value="telefono" id="contactar_telefono" name="informacion[comocontacto]" require>
                </div>

                <div class="campo poremail">
                    <label for="poremail">Email</label>
                    <input type="radio" value="email" id="contactar_email" name="informacion[comocontacto]" require>
                </div>
            </div>
           
            <div class="metodos"></div>

            <div class="campo">
                <label for="mensaje">Mensaje</label>
                <textarea name="informacion[mensaje]" id="mensaje"></textarea>
            </div>

            <div class="contenedorBotones">
                <input class="boton_verde" type="submit" value="Enviar">
                <input class="boton_verde" type="submit" value="Enviar">
            </div>
        </form>
    </div>
    
    <div class="acciones">
        <a href="/acceso">Acceso clientes</a>
        <a href="/">Inicio</a>
    </div>
</div>

<?php $script = '   <script src="/build/js/mostrarcontacto.js"></script>   '; ?>