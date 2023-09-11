
// Ver el password cuando se esta escribiendo
document.addEventListener('DOMContentLoaded', function(){
    iniciar_app();
});

function iniciar_app(){
    oculta_pass();
    mostrar_pass()
    oculta_pass2();
    mostrar_pass2()
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

function mostrar_pass2(){
    const imagenOcuta = document.querySelector('#ima-4')
    imagenOcuta.addEventListener('click', function(e){

        const tipo = document.querySelector('#password2');
        if (tipo.type = 'password'){
            tipo.type = 'text';
        }
        document.querySelector('#ima-3').classList.add('mostrarPass');
        document.querySelector('#ima-3').classList.remove('ocultarPass');

        document.querySelector('#ima-4').classList.add('ocultarPass');
        document.querySelector('#ima-4').classList.remove('mostrarPass');
    });
}

function oculta_pass2(){
    const imagenMuestra = document.querySelector('#ima-3')
    imagenMuestra.addEventListener('click', function(e){
        
        const tipo = document.querySelector('#password2');
        if (tipo.type = 'text'){
            tipo.type = 'password';
        }

        document.querySelector('#ima-3').classList.add('ocultarPass');
        document.querySelector('#ima-3').classList.remove('mostrarPass');

        document.querySelector('#ima-4').classList.add('mostrarPass');
        document.querySelector('#ima-4').classList.remove('ocultarPass');

    });
}