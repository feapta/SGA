

document.addEventListener('DOMContentLoaded', function(){

    i();
});


function i(){
    darkMode();
}


// Funcion cambio de color de la web
function darkMode(){

    // Para cambiar segun el usuario tenga el tema oscuro o claro
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark_mode');
        }
        else{
            document.body.classList.remove('dark_mode');
        }

        prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark_mode');
        }
        else{
            document.body.classList.remove('dark_mode');
        }
    });
    const botonDarkMode = document.querySelector('.dark_mode_boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark_mode');
    });
};
