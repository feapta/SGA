
// EDICION DE PARTES

document.addEventListener('DOMContentLoaded', function(){
    edicionApp();
});

function edicionApp(){
    datos_cabecera();
    botonDescactiva();
}

async function datos_cabecera(){
    const idparte = document.querySelector('#idparte').value;
    const idclienteS = document.querySelector('#idclienteS').value;
    
    const datos = new FormData();
    datos.append('idparte', idparte);
    datos.append('idclienteS', idclienteS);
    
    try {
        const url = '/partes/edicion';
        const envio = await fetch(url, {
            method: 'POST',
            body: datos
        });
        jsonrecibido = await envio.json();
        
        if(jsonrecibido){
            cabeceraParte()
        }
    }

catch (error) {
            console.log(error);
    }
}


////////////////// SECCION CABECERA DEL PARTE
    function cabeceraParte() {
        document.querySelector('#autonumero').value = jsonrecibido[0][0]['autonumero'];
        document.querySelector('#fecha').value = jsonrecibido[0][0]['fecha'];
  
        // Clientes de la app
        clientesCabecera(2);

        // Fincas
        const idfinca = jsonrecibido[0][0]['idfinca'];
        const nombrefinca = jsonrecibido[0][0]['finca'];
        fincas(idfinca, nombrefinca);

        // Empleados
        empleadosCabecera(3);

        // Compreba las filas
        compruebaFilas();
    }


////////////////// FIN 


// Comprueba que halla filas en la tabla
function compruebaFilas(){
    // Crea el array con las filas que llegan si el jsonrecibido tiene filas
    if (jsonrecibido[1]){
        jsonrecibido[1].forEach((fila) => {
            arrayfilas.push(fila['indicefila']);
        });

        // Asigna el valor de la ultima fila al indice de las filas
        indicefila = arrayfilas.at(-1)
    }
    
    // Si hay filas las muestra en la tabla
    if (indicefila > -1){
        mostrarContenidoTabla();

    // Si no hay filas espera por si se crean nuevas
    } else {
        escuchas();
    }
}

// Muestra las filas de la tabla
function mostrarContenidoTabla(){
    const empleado_RE = jsonrecibido[3];
    const trabajo_RE = jsonrecibido[4];
    const maquina_RE = jsonrecibido[5];
    const producto_RE = jsonrecibido[6];
    const imagen = '/build/img/lapiz.png';
    const clase = 'verde';

    jsonrecibido[1].forEach((datos) => {
        const desactiva = true;
       
        const {id, idparte, indicefila, idempleado, nombre, idtrabajo, trabajos, horastrabajo, idmaquina, maquinas, horasmaquina, 
                idproducto, productos, cantidadproducto} = datos;

            const ids = Id(id);
            const idpartes = Idparte(idparte);
            const indicefilas = Indicefilas(indicefila);
            const empleado = Empleados(empleado_RE, idempleado, nombre, desactiva);
            const trabajo = Trabajos(trabajo_RE, idtrabajo, trabajos, desactiva);
            const htrabajo = Horastrabajo(horastrabajo, desactiva);
            const maquina = Maquinas(maquina_RE, idmaquina, maquinas, desactiva);
            const hmaquina = Horasmaquinas(horasmaquina, desactiva);
            const producto = Productos(producto_RE, idproducto, productos, desactiva);
            const hproducto = Cantidadproductos(cantidadproducto, desactiva);
            const celdaok = lapiz(imagen, clase);
            const celdaeliminar = papelera();
        
    const fila = document.createElement('tr');

            fila.appendChild(ids);
            fila.appendChild(idpartes);
            fila.appendChild(indicefilas);
            fila.appendChild(empleado);
            fila.appendChild(trabajo);
            fila.appendChild(htrabajo);
            fila.appendChild(maquina);
            fila.appendChild(hmaquina);
            fila.appendChild(producto);
            fila.appendChild(hproducto);
            fila.appendChild(celdaok);
            fila.appendChild(celdaeliminar);
    
            document.querySelector('#cuerpo').appendChild(fila);

        });

        crearObjeto();
}

// Crear el objeto con el contenido que nos llega
function crearObjeto(){
    jsonrecibido[1].forEach((datos) => {
        const { id, idparte, indicefila, idempleado, idtrabajo, horastrabajo, idmaquina, 
            horasmaquina, idproducto, cantidadproducto } = datos;

            const Objetotrabajo = {
                id: id,
                idparte: idparte,
                indicefila: indicefila,
                idempleado: idempleado,
                idtrabajo: idtrabajo,
                horastrabajo: horastrabajo,
                idmaquina: idmaquina,
                horasmaquina: horasmaquina,
                idproducto: idproducto,
                cantpro: cantidadproducto
            }
        arraytrabajos = [...arraytrabajos, Objetotrabajo];
    });

    escuchas();
}

// Funcion para poner en marcha los eventListener
function escuchas(){
    // Si se selecciona un empleado añade un objeto nuevo y una fila
    const selectempleado = document.querySelector('#selectEmpleadoCabecera');
    selectempleado.addEventListener('change', function(){
        let em = 3;
        let tr = 4;
        let ma = 5;
        let pr = 6;
        
        filaObjeto(em, tr, ma, pr);
    });

    escuchaBotonOk();
    escuchaBotonEliminar();
    escuchaBotonGuardar();
}



