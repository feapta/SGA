////////////////////////////////////////////////////////

// CONTENIDO CREAR Y DE EDITAR


 // ID DE LA TABLA PARTES TRABAJOS
    function Id(id){
        const idfila = document.createElement('td');
            idfila.classList.add('ocultar');
            idfila.id = 'idpartetrabajo';
            idfila.value = id;
        return idfila;
    }

    // ID DE LA TABLA PARTE
    function Idparte(idpartes){
        const idparte = document.createElement('td');
            idparte.classList.add('ocultar');
            idparte.id = 'idparte';
            idparte.value = idpartes;
        return idparte;
    }
       
    // INDICE DE LA FILA
    function Indicefilas(indicefilas){
        const indicefila = document.createElement('td');
            indicefila.id = 'indicefila';
            indicefila.textContent = indicefilas;
            indicefila.value = indicefilas;
        return indicefila
    }
    
    // EMPLEADOS
    function Empleados(empleado_RE, idempleado, nombre, desactiva){

        const empleado = document.createElement('td');
            const selectempleado = document.createElement('select');
                selectempleado.classList.add('selectempleado');
                selectempleado.classList.add('cambiocolor');
                selectempleado.disabled = desactiva;
        
                // Seleciona una opcion por defecto
                const empleadoseleccionado = document.createElement('option');
                    empleadoseleccionado.classList.add('empleadoselecionado');
                    empleadoseleccionado.textContent = nombre;
                    empleadoseleccionado.value = idempleado;
                    empleadoseleccionado.selected = true;

                selectempleado.appendChild(empleadoseleccionado);

                empleado_RE.forEach((emple) => {
                    const {idempleados, nombreempleados} = emple;
        
                    const opcionempleado = document.createElement('option');
                        opcionempleado.classList.add('optionempleado');
                        opcionempleado.textContent = nombreempleados;
                        opcionempleado.value = idempleados;
        
                    selectempleado.appendChild(opcionempleado);
                });

            empleado.appendChild(selectempleado);
            return empleado;
    }

    // TRABAJOS        
    function Trabajos(trabajo_RE, idtrabajo, trabajos, desactiva ){
        const trabajo = document.createElement('td');
            const selecttrabajo = document.createElement('select');
                selecttrabajo.classList.add('selecttrabajo');
                selecttrabajo.classList.add('cambiocolor');
                selecttrabajo.disabled = desactiva;

            const trabajoseleccionado = document.createElement('option');
                trabajoseleccionado.classList.add('trabajoseleccionado');
                trabajoseleccionado.textContent = trabajos;
                trabajoseleccionado.value = idtrabajo;

                selecttrabajo.appendChild(trabajoseleccionado);
            
                trabajo_RE.forEach((traba) => {
                    const {idtrabajos, nombretrabajos} = traba;
    
                    const opciontrabajo = document.createElement('option');
                        opciontrabajo.classList.add('optiontrabajo');
                        opciontrabajo.textContent = nombretrabajos;
                        opciontrabajo.value = idtrabajos;
    
                    selecttrabajo.appendChild(opciontrabajo);
                });
        
    
        trabajo.appendChild(selecttrabajo);
        return trabajo;
    }
    // HORAS DE TRABAJO EMPLEADO
    function Horastrabajo(horastrabajo, desactiva){
        const htrabajo = document.createElement('td');
            const inputhtrabajo = document.createElement('input');
                inputhtrabajo.type= 'number';
                inputhtrabajo.classList.add('horastrabajo');
                inputhtrabajo.classList.add('cambiocolor');
                inputhtrabajo.textContent = horastrabajo;
                inputhtrabajo.value = horastrabajo;
                inputhtrabajo.disabled = desactiva;
                
            htrabajo.appendChild(inputhtrabajo);
        return htrabajo;
    }
    
    // MAQUINAS
    function Maquinas(maquina_RE, idmaquina, maquinas, desactiva){
        const maquina = document.createElement('td');
        const selectmaquina = document.createElement('select');
            selectmaquina.classList.add('selectmaquina');
            selectmaquina.classList.add('cambiocolor');
            selectmaquina.disabled = desactiva;
    
        const maquinaseleccionado = document.createElement('option');
            maquinaseleccionado.classList.add('maquinaselecionado');
            maquinaseleccionado.textContent = maquinas;
            maquinaseleccionado.value = idmaquina;
    
            selectmaquina.appendChild(maquinaseleccionado);
        
            maquina_RE.forEach((traba) => {
                const {idmaquinas, nombremaquinas} = traba;
    
                const opcionmaquinas = document.createElement('option');
                    opcionmaquinas.classList.add('optionmaquina');
                    opcionmaquinas.textContent = nombremaquinas;
                    opcionmaquinas.value = idmaquinas;
    
                selectmaquina.appendChild(opcionmaquinas);
            });
        
    
        maquina.appendChild(selectmaquina);
        return maquina;
    }
    
    // HORAS DE TRABAJO MAQUINA
    function Horasmaquinas(horasmaquina, desactiva){
    const hmaquina = document.createElement('td');
        const inputhmaquina = document.createElement('input');
            inputhmaquina.type= 'number';
            inputhmaquina.classList.add('horasmaquina');
            inputhmaquina.classList.add('cambiocolor');
            inputhmaquina.textContent = horasmaquina;
            inputhmaquina.value = horasmaquina;
            inputhmaquina.disabled = desactiva;
            
            hmaquina.appendChild(inputhmaquina);
            return hmaquina;
    }
    
    // PRODUCTOS
    function Productos(producto_RE, idproducto, productos, desactiva){
        const producto = document.createElement('td');
        const selectproducto = document.createElement('select');
            selectproducto.classList.add('selectproducto');
            selectproducto.classList.add('cambiocolor');
            selectproducto.disabled = desactiva;
    
        const productoseleccionado = document.createElement('option');
            productoseleccionado.classList.add('productoselecionado');
            productoseleccionado.textContent = productos;
            productoseleccionado.value = idproducto;
    
            selectproducto.appendChild(productoseleccionado);
        
            producto_RE.forEach((traba) => {
                const {idproductos, nombreproductos} = traba;
    
                const opcionproductos = document.createElement('option');
                    opcionproductos.classList.add('optionproducto');
                    opcionproductos.textContent = nombreproductos;
                    opcionproductos.value = idproductos;
    
                selectproducto.appendChild(opcionproductos);
            });
        
    
        producto.appendChild(selectproducto);
        return producto;
    }
    
    // CANTIDAD DE PRODUCTOS
    function Cantidadproductos(cantidadproducto, desactiva){
        const hproducto = document.createElement('td');
        const inputhproducto = document.createElement('input');
            inputhproducto.type= 'number';
            inputhproducto.classList.add('cantidadproducto');
            inputhproducto.classList.add('cambiocolor');
            inputhproducto.textContent = cantidadproducto;
            inputhproducto.value = cantidadproducto;
            inputhproducto.disabled = desactiva;
                        
            hproducto.appendChild(inputhproducto);
        
        return hproducto;
    }
    
    // IMAGEN OK
    function lapiz(imagen, clase){
        const celdaok = document.createElement('td');
            celdaok.classList.add('ok');
    
            const ok = document.createElement('img');
                ok.classList.add('imgok');
                ok.classList.add('pulsacion2');
                ok.classList.add(clase);
                ok.src = imagen;
    
        celdaok.appendChild(ok);
        return celdaok;
    }
    
    // IMAGEN ELIMINAR
    function papelera(){
        const celdaeliminar = document.createElement('td');
            celdaeliminar.classList.add('borrar');
    
            const eliminar = document.createElement('img');
                eliminar.classList.add('imgpapelera');
                eliminar.classList.add('pulsacion2');
                eliminar.src='/build/img/papelera.png';
    
        celdaeliminar.appendChild(eliminar);
        return celdaeliminar;
    }