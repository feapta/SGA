
// Funcion para elimnar un parte completo

// Pide confimarcion para eliminar parte completo
function eliminarParte(idclienteS, idparte){
    console.log('llegando');
    Swal.fire({
        title: 'Seguro que desea eliminar?',
        text: "No podra deshacer los cambios",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Confirmar'
    }).then((result) => {
        
        if (result.isConfirmed) {
        eliminar(idclienteS, idparte);
        }

    });
}

// Elimina el partes de trabajo
async function eliminar(idclienteS, idparte){
    const datos = new FormData();

    datos.append('idclienteS', idclienteS);
    datos.append('idparte', idparte);

    try {
        const url = '/partes/eliminar';
        const envio = await fetch(url, {
            method: 'POST',
            body: datos
        });

        const recibido = await envio.json();

        if(recibido){
            Swal.fire({
            icon: 'success',
            title: 'Elimado correctamente',
            showConfirmButton: false,
            timer: 1500
            }) 

            setTimeout(() => { 
            window.location.href = `/partes?idclienteS=${idclienteS}`;
            }, 1500);
        }
    }

    catch (error) {
            console.log(error);
    }
}