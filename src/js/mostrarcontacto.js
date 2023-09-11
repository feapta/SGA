
document.addEventListener('DOMContentLoaded', function(){

    eventListener();
});

function eventListener(){
    const metodoContacto = document.querySelectorAll('input[name="informacion[comocontacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
};

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('.metodos');

    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
        <label class="contacto">Elija la fecha y la hora para que le llamamos</label>
        <div class="campo">
            <label for="fecha">Telefóno</label>
            <input type="tel" placeholder="Su telefóno" id="telefono" name="informacion[telefono]" pattern="[0-9]{9}">

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="informacion[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="20:00" name="informacion[hora]">
        </div>
        `;
    }else{
        contactoDiv.innerHTML =`
        <label class="contacto">Dejenos su email y le enviaremos la información</label>
        <div class="campo">
            <input type="email" placeholder="Su Email" id="email" name="informacion[email]" require>
        </div>
        `;
    }

};