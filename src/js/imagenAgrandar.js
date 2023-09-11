
document.addEventListener('DOMContentLoaded', function(){
    imagen();
});

function imagen(){
    cambia();

}


// Fincas
function cambia(){
    const imagen = document.querySelector('.imagen');
    imagen.addEventListener('click', function() {
        if( imagen.classList.contains('peque')){
            imagen.classList.remove('peque');
            imagen.classList.add('grande');
        }else{
            imagen.classList.remove('grande');
            imagen.classList.add('peque');
        }

    });
}
