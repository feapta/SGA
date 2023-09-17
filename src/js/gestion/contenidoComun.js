
// ARCHIVO DE FUNCIONES COMUNES EN GESTION
var arraytrabajos = [];
var cambio = 0;
var jsonrecibido = [];
var idparte = document.querySelector('#idparte').value;
var indicefila = -1;
var arrayfilas = [];
var totalhorastrabajo = 0;
var totalhorasmaquina = 0;
var totalcantpro = 0;

const Objetotrabajo = {
    id: '',
    idparte: '',
    indicefila: '',
    idempleado: '',
    idtrabajo: '',
    horastrabajo: '',
    idmaquina: '',
    horasmaquina: '',
    idproducto: '',
    cantpro: ''
}


// Clientes
function clientesCabecera(numero){
    // Option seleccionada por defecto
        const clienteseleccionado = document.createElement('option');
        clienteseleccionado.classList.add('empleadoselecionado');
        clienteseleccionado.textContent = jsonrecibido[0][0]['nombreclienteapp'] ?? 'Selecione un cliente';
        clienteseleccionado.value =jsonrecibido[0][0]['idclienteapp'] ?? null;
        clienteseleccionado.selected = true;
    document.querySelector('#idclienteapp').appendChild(clienteseleccionado);

    // Select de empleados
    jsonrecibido[numero].forEach((client) => {
        const {idclienteapp, nombrecliente} = client;

        const opcionclienteapp = document.createElement('option');
            opcionclienteapp.classList.add('optionclienteapp');
            opcionclienteapp.textContent = nombrecliente;
            opcionclienteapp.value = idclienteapp;

        document.querySelector('#idclienteapp').appendChild(opcionclienteapp);
    });

    // Escucha los cambios en el select de fincas
    const selectfincas = document.querySelector('#idclienteapp');
        selectfincas.addEventListener('change', fincas);

}

// Fincas
async function fincas(idfinca, nombrefinca){
    const idclienteapp = document.querySelector('#idclienteapp').value;
    
    const datos = new FormData();
    datos.append('idclienteapp', idclienteapp);
    try {
        const url = '/partes/fincas';
        const envio = await fetch(url, {
            method: 'POST',
            body: datos
        });
        const fincasrecibidas = await envio.json();
        if(fincasrecibidas){
            creafinca(fincasrecibidas, idfinca, nombrefinca);
        }
    }
catch (error) {
            console.log(error);
    }
}

// Llena el select dependiendo del cliente, por si lo cambia en el parte
function creafinca(fincasrecibidas, idfinca, nombrefinca){
    $('.fincaPlaceholder').remove();
    $("#idfinca").find('option').not(':first').remove();

    // Option seleccionada por defecto
    const fincaseleccionado = document.createElement('option');
        fincaseleccionado.classList.add('fincaselecionado');
        fincaseleccionado.textContent = 'Selecione una finca' ?? nombrefinca;
        fincaseleccionado.value = idfinca ?? null;
        fincaseleccionado.selected = true;
        
        document.querySelector('#idfinca').appendChild(fincaseleccionado);

    fincasrecibidas.forEach((fincas) => {
        const {id, nombre} = fincas;

        const optionfinca = document.createElement("option");
            optionfinca.value = id;
            optionfinca.textContent = nombre;
        
        document.querySelector('#idfinca').appendChild(optionfinca);
    });

}


// Empleados
function empleadosCabecera(numero){
    // Option seleccionada por defecto
    const empleadoseleccionado = document.createElement('option');
        empleadoseleccionado.classList.add('empleadoselecionado');
        empleadoseleccionado.textContent = 'Selecione empleado para añadir nuevo trabajo';
        empleadoseleccionado.selected = true;
    document.querySelector('#selectEmpleadoCabecera').appendChild(empleadoseleccionado);

    // Llena el select con los empleados
    jsonrecibido[numero].forEach((empleados) => {
        const {idempleados, nombreempleados} = empleados;
            
        const optionempleados = document.createElement("option");
            optionempleados.classList.add('empleadoselecionado');
            optionempleados.textContent = nombreempleados;
            optionempleados.value = idempleados;
    document.querySelector('#selectEmpleadoCabecera').appendChild(optionempleados);
    
    });

}


// Escucha el click en el boton ok
function escuchaBotonOk(){
    const botonok = document.querySelectorAll('.ok');
    botonok.forEach(boton => {
        boton.addEventListener("click", cambioBoton);
    });
}

// Cambia el color del boton ok a rojo y modifica el objeto
function cambioBoton(e){
    // Selecciona el elemento que ha echo click
    const part = e.target.parentElement.parentElement; 
    const boton = part.querySelector('.imgok');       

    // Para hacer cambios cada vez que se hace click en el boton
    if(boton.classList.contains('rojo')){
            boton.src="/build/img/lapiz.png";
            boton.classList.add('verde');
            boton.classList.remove('rojo');

            // Desactiva todas las celdas de la fila
            const valor = part.querySelectorAll('.cambiocolor');
                valor.forEach(ok => {
                    ok.disabled = true;
                });

            modificarObjeto(e);
        } else {
            boton.classList.remove('verde');
            boton.classList.add('rojo');
            boton.src="/build/img/ok_rojo.png";

            // Activa todas las celdas de la fila
            const valor = part.querySelectorAll('.cambiocolor');
            valor.forEach(ok => {
                ok.disabled = false;
            });
            botonDescactiva();
        }
        
}


// Crea una nueva fila y objeto
function filaObjeto( em, tr, ma, pr){
    indicefila++;
    
    let id = '';
    let idempleado = document.querySelector('#selectEmpleadoCabecera').value;
    let nombre = $('#selectEmpleadoCabecera option:selected').text();
    let desactiva = false;

    let idtrabajo = '';
    let trabajos = '';
    let horastrabajo = '';
    let idmaquina = '';
    let maquinas = '';
    let horasmaquina = '';
    let idproducto = '';
    let productos = '';
    let cantidadproducto = '';
    let imagen = '/build/img/ok_rojo.png';
    let clase = 'rojo';

    const empleado_RE = jsonrecibido[em]; // 3 editar
    const trabajo_RE = jsonrecibido[tr]; // 4
    const maquina_RE = jsonrecibido[ma]; // 5
    const producto_RE = jsonrecibido[pr]; // 6

    const nombreEmpleado = $('#selectEmpleadoCabecera option:selected').text();
    const idEmpleado = document.querySelector('#selectEmpleadoCabecera').value;

    // Crea la fila con el nuevo empleado
    const empleados = document.createElement('td');
        const selectempleado = document.createElement('select');
            selectempleado.classList.add('selectempleado');
            selectempleado.classList.add('cambiocolor');

            const empleadoseleccionado = document.createElement('option');
                empleadoseleccionado.classList.add('empleadoselecionado');
                empleadoseleccionado.textContent = nombreEmpleado;
                empleadoseleccionado.value = idEmpleado;

                selectempleado.appendChild(empleadoseleccionado);

    empleados.appendChild(selectempleado);

        const ids = Id(id);
        const indicefilas = Indicefilas(indicefila);
        const idpartes = Idparte(idparte);
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


    // Añade los datos al objeto
    const Objetotrabajo = {
        id: '',
        idparte: '',
        indicefila: indicefila,
        idempleado: idEmpleado,
        idtrabajo: '',
        horastrabajo: '',
        idmaquina: '',
        horasmaquina: '',
        idproducto: '',
        cantpro: ''
    }


    arraytrabajos = [...arraytrabajos, Objetotrabajo];
    

    // Volvemos a escuchar estos botones para que se activen en la fila nueva
    escuchaBotonOk();
    escuchaBotonEliminar();
    escuchaBotonGuardar();

}

// Modifica el contenido de la filaObjeto que se ha creado
function modificarObjeto(e){
    const part = e.target.parentElement.parentElement;
    const indice = part.querySelector('#indicefila').value;

    arraytrabajos[indice] = {
        id: part.querySelector('#idpartetrabajo').value,                                                    // id de la tabla partestrabajos
        idparte: part.querySelector('#idparte').value,           // idparte es el id de la tabla partes
        indicefila: part.querySelector('#indicefila').value,
        idempleado: part.querySelector('.selectempleado').value,
        idtrabajo: part.querySelector('.selecttrabajo').value,
        horastrabajo: part.querySelector('.horastrabajo').value,
        idmaquina: part.querySelector('.selectmaquina').value,
        horasmaquina: part.querySelector('.horasmaquina').value,
        idproducto: part.querySelector('.selectproducto').value,
        cantpro: part.querySelector('.cantidadproducto').value
    }

const totalhorastr = arraytrabajos.reduce( (totaltr, arraytrabajos) => Number(totaltr) + Number(arraytrabajos.horastrabajo) , 0);
const totalhorasma = arraytrabajos.reduce( (totalma, arraytrabajos) => Number(totalma) + Number(arraytrabajos.horasmaquina) , 0);
const totalpr = arraytrabajos.reduce( (totalpr, arraytrabajos) => Number(totalpr) + Number(arraytrabajos.cantpro) , 0);

console.log(totalhorastr);
console.log(totalhorasma);
console.log(totalpr);

document.querySelector('.totalhorastrabajo').value = totalhorastr;
document.querySelector('.totalhorasmaquina').value = totalhorasma;
document.querySelector('.totalcantidadproducto').value = totalpr;

    botonActiva();
}





// Par ir a la pagina de crear nuevo registro de clienteapp finca y empleado
function nuevo(nuevo){
    location.href = nuevo;
}

// Escucha el boton eliminar
function escuchaBotonEliminar(){
    const botonborrar = document.querySelectorAll('.imgpapelera');
    botonborrar.forEach(botone => {
        botone.addEventListener("click", eliminarfila);
    });
}

// Elimina una fila
function eliminarfila(e){
    const part = e.target.parentElement.parentElement; 
    let indice = part.querySelector('#indicefila').value

    arraytrabajos.splice(indice, 1); 
    $(part).closest('tr').remove();

    console.log(arraytrabajos);
    indicefila--;
}

    
    
// Guardar parte
async function guardarParte(){
    const idparte = document.querySelector('#idparte').value;
    const idclienteS = document.querySelector('#idclienteS').value
    const autonumero = document.querySelector('#autonumero').value
    const fecha = document.querySelector('#fecha').value
    const idclienteapp = document.querySelector('#idclienteapp').value
    const idfinca = document.querySelector('#idfinca').value
    const horastrab = document.querySelector('.totalhorastrabajo').value;
    const horasmaqu = document.querySelector('.totalhorasmaquina').value;
    const cantprodu = document.querySelector('.totalcantidadproducto').value;

    const datos = new FormData();
    if (idparte){
        datos.append('id', idparte);  // ID del parte
    }
        datos.append('idclienteapp', idclienteapp);
        datos.append('idclientesistemar', idclienteS);
        datos.append('autonumero', autonumero);
        datos.append('fecha', fecha);
        datos.append('idfinca', idfinca);
        datos.append('horastrabajo', horastrab);
        datos.append('horasmaquina', horasmaqu);
        datos.append('cantpro', cantprodu);
        datos.append('trabajos', JSON.stringify(arraytrabajos));
        
        try {
            const url = '/partes/guardar';
            const envio = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const recibido = await envio.json();
            
            if(recibido){
                Swal.fire({
                    icon: 'success',
                    title: 'Parte actualizado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }); 

                setTimeout(() => { 
                    window.location.href = `/partes?idclienteS=${idclienteS}`;
                }, 1500);
            }
            
        }
      
        catch (error) {
                console.log(error);
        }
        
}


// Funciones para desactivar y activar el boton de guardar
function escuchaBotonGuardar(){
    const btn = document.querySelector('.cambiocolor');
        btn.addEventListener('change', botonDescactiva);
}

function botonDescactiva(){
    const botonguardar = document.querySelector('.botonGuardar');
        botonguardar.disabled = true;
        botonguardar.classList.add('botonOscuro');
}
function botonActiva(){
    const botonguardar = document.querySelector('.botonGuardar');
        botonguardar.disabled = false;
        botonguardar.classList.remove('botonOscuro');
}