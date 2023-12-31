
<!-- Pagina de olvido su password -->

<div class="contenedor contenido_centrado olvidado">
    <h1>Olvidó su password</h1>
    <p> Reestablezca su password escribiendo su email</p>

    <?php include_once __DIR__ . "/../templates/alertas.php" ?>

    <form class="contenedorFormulario" method="POST" action="/usuarios/olvidado">
        <div class="campo">
            <label for="email">Email</label>
            <input 
                type="email" 
                id="email" 
                placeholder="Su email" 
                name="email"
                >
        </div>    

        <div class="contenedorBotones">
            <input type="submit" class="boton_light-green-400" value="Restablecer">
        </div>
    </form>

    <div class="acciones">
        <a href="/login">¿Ya tiene una cuenta? -> Inicie sesión</a>
        <a href="/usuarios/registro">¿Aún no tiene una cuenta? -> Cree una</a>
    </div>
</div>