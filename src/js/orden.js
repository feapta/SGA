

// Ordena los registros hacia arria o hacia abajo

document.addEventListener('DOMContentLoaded', ordenIncio);

function ordenIncio(){
    const imgflecha = document.querySelector('.flecha');
   
    if (imgflecha.classList.contains('DESC')){
        imgflecha.src = "/build/img/flecha-abajo.png";

    } else if (imgflecha.classList.contains('ASC')){
        imgflecha.src = "/build/img/flecha-arriba.png";
    }

    const imgfl = document.querySelector('.flecha');
        imgfl.addEventListener('click', orden);
}


function orden(e){
    e.preventDefault();
    const imgflecha = document.querySelector('.flecha');
    const imgflechaoculto = document.querySelector('.imgoculto'); // para enviar por post porque no funciona name en input type image
    
    if (imgflecha.classList.contains('DESC')){
        imgflechaoculto.value="ASC";
        imgflecha.src="/build/img/flecha-arriba.png";
        document.querySelector('.formRegistros').submit();

    } else if (imgflecha.classList.contains('ASC')) {
        imgflechaoculto.value="DESC";
        imgflecha.src="/build/img/flecha-abajo.png";
        document.querySelector('.formRegistros').submit();
    }
}