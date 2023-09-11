
// Dashboard

document.addEventListener('DOMContentLoaded', function(){
    eventListener();
});


// Ocultar el dashboar
function eventListener(){
    const mobileMenu = document.querySelector('.imagenmenu');
    mobileMenu.addEventListener('click', navegacionResposive);
};

function navegacionResposive(){
    const navegacion = document.querySelector('.aside');
    navegacion.classList.toggle('asideVisible');         
};
