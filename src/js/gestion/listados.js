


// LISTADOS DE GASTOS Y PARTES

document.addEventListener('DOMContentLoaded', function(){
    const selectClientes = document.querySelector('#clientes');
        selectClientes.addEventListener('change', function(){
            fincas();
        });
});



// Fincas
async function fincas(){
    const idclienteapp = document.querySelector('#clientes').value;
    
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
            creafinca(fincasrecibidas);
        }
    }
catch (error) {
            console.log(error);
    }
}

// Llena el select dependiendo del cliente, por si lo cambia en el parte
function creafinca(fincasrecibidas){
    $('.fincaPlaceholder').remove();
    $("#idfinca").find('option').not(':first').remove();

    fincasrecibidas.forEach((fincas) => {
        const {id, nombre} = fincas;

        const optionfinca = document.createElement("option");
            optionfinca.value = id;
            optionfinca.textContent = nombre;
        
        document.querySelector('#idfinca').appendChild(optionfinca);
    });

}




/*
window.addEventListener("beforeunload", function (e) {
        sessionStorage.clear(); 
  });



function listadosApp(){
    const partes = document.querySelector('.partes');
    const gastos = document.querySelector('.gastos');
        partes.style.background = '#80deea';
        document.querySelector('.partes h4').style.color = '#fff';
    partes.addEventListener('click', cambioPartes);
    gastos.addEventListener('click', cambioGastos);
}
function cambioPartes(){
    const formuP = document.querySelector('.formPartes');
    const formuG = document.querySelector('.formGastos');
        formuG.classList.add('ocultar');
        formuP.classList.remove('ocultar');

        document.querySelector('.partes').style.background = '#80deea';
        document.querySelector('.partes h4').style.color = '#fff';
        document.querySelector('.gastos').style.background='transparent';
}
function cambioGastos(){
    const formuP = document.querySelector('.formPartes');
    const formuG = document.querySelector('.formGastos');
        formuP.classList.add('ocultar');
        formuG.classList.remove('ocultar');

        document.querySelector('.gastos').style.background='#ffcdd2';
        document.querySelector('.gastos h4').style.color = '#fff';
        document.querySelector('.partes').style.background='transparent';
}

   window.addEventListener("beforeunload", function (e) {
  var confirmationMessage = "\o/";

  (e || window.event).returnValue = confirmationMessage; //Gecko + IE
  return confirmationMessage;                            //Webkit, Safari, Chrome
});                       //Webkit, Safari, Chrome

*/