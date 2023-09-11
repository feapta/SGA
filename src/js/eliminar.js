

// Eliminar

// Confirmacion eliminar
function confirmarEliminar(uno, dos, tres, cuatro, cinco){ // Estos son los datos que se envian desde el formulario html
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
        eliminar(uno, dos, tres, cuatro, cinco);
      }
    })
}

  // Funcion eliminar
async function eliminar(uno, dos, tres, cuatro, cinco){
    const datos = new FormData();

      datos.append('id', uno);
      datos.append('tipo', dos);
      datos.append('tabla', tres);
      datos.append('numero', cinco);

    try {
        const url = '/eliminar';
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
              window.location.href = `/${cuatro}`;
            }, 1500);
          }
      }
  
    catch (error) {
              console.log(error);
      }
}
  