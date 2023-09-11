
// CREAR PARTE NUEVO

document.addEventListener('DOMContentLoaded', function(){
    crearApp();
});

function crearApp(){
    pedirDatos();
    botonDescactiva();
}

async function pedirDatos(){
    const idclienteS = document.querySelector('#idclienteS').value;
    
    const datos = new FormData();
    datos.append('idclienteS', idclienteS);
    
    try {
        const url = '/partes/datos';
        const envio = await fetch(url, {
            method: 'POST',
            body: datos
        });
        jsonrecibido = await envio.json();
        
        if(jsonrecibido){
            inciar()
        }
    }

catch (error) {
            console.log(error);
    }
}

function inciar(){
    clientesCabecera(0);

    // Option seleccionada por defecto
    const fincaseleccionado = document.createElement('option');
    fincaseleccionado.classList.add('fincaPlaceholder');
    fincaseleccionado.textContent = 'Selecione un cliente primero';
    fincaseleccionado.selected = true;
    
    document.querySelector('#idfinca').appendChild(fincaseleccionado);

    empleadosCabecera(1);
    escuchas();
}

// Funcion para poner en marcha los eventListener
function escuchas(){
    // Si se selecciona un empleado añade un objeto nuevo y una fila
    const selectempleado = document.querySelector('#selectEmpleadoCabecera');
    selectempleado.addEventListener('change', function(){
        let em = 1;
        let tr = 2;
        let ma = 3;
        let pr = 4;
        
        filaObjeto(em, tr, ma, pr);
    });

    escuchaBotonOk();
    escuchaBotonEliminar();
}