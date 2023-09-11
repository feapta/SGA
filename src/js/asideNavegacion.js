
// Javascript del dashboard

document.addEventListener('DOMContentLoaded', function(){
    menu_dashboard();

});

let paso_menu;

// Dashboard
function menu_dashboard(){
    const menu = document.querySelectorAll('.menuDash');
    menu.forEach( boton => {
        boton.addEventListener('click', function(e){
            e.preventDefault();
            paso_menu = parseInt(e.target.dataset.paso_menu);
            navegaDashboard(paso_menu);
        });
    });
};

function navegaDashboard(paso_menu, e){
    const navega = document.querySelector(`.navega-${paso_menu}`);
    navega.classList.toggle('mostrar_navega');
};