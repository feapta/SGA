
document.addEventListener('DOMContentLoaded', function(){
    eventListener();

});

// Navegacion
function eventListener(){
    const mobileMenu = document.querySelector('.mobile_dash');
    mobileMenu.addEventListener('click', navegacionResposive);
};

function navegacionResposive(){
    const navegacion = document.querySelector('.contenedor_aside');
    navegacion.classList.toggle('mostrar_contenedor_aside');         
};