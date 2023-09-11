// Ver el password cuando se esta escribiendo
document.addEventListener('DOMContentLoaded', function(){
    in_app();
});

function in_app(){
    oculta_pass();
    mostrar_pass()
}

function mostrar_pass(){
    const imagenOcuta = document.querySelector('#ima-2')
    imagenOcuta.addEventListener('click', function(e){

        const tipo = document.querySelector('#password');
        if (tipo.type = 'password'){
            tipo.type = 'text';
        }
        document.querySelector('#ima-1').classList.add('mostrarPass');
        document.querySelector('#ima-1').classList.remove('ocultarPass');

        document.querySelector('#ima-2').classList.add('ocultarPass');
        document.querySelector('#ima-2').classList.remove('mostrarPass');
    });
}

function oculta_pass(){
    const imagenMuestra = document.querySelector('#ima-1')
    imagenMuestra.addEventListener('click', function(e){
        
        const tipo = document.querySelector('#password');
        if (tipo.type = 'text'){
            tipo.type = 'password';
        }

        document.querySelector('#ima-1').classList.add('ocultarPass');
        document.querySelector('#ima-1').classList.remove('mostrarPass');

        document.querySelector('#ima-2').classList.add('mostrarPass');
        document.querySelector('#ima-2').classList.remove('ocultarPass');

    });

}