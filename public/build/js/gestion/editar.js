function edicionApp(){datos_cabecera(),botonDescactiva()}async function datos_cabecera(){const a=document.querySelector("#idparte").value,e=document.querySelector("#idclienteS").value,o=new FormData;o.append("idparte",a),o.append("idclienteS",e);try{const a="/partes/edicion",e=await fetch(a,{method:"POST",body:o});jsonrecibido=await e.json(),jsonrecibido&&cabeceraParte()}catch(a){console.log(a)}}function cabeceraParte(){document.querySelector("#autonumero").value=jsonrecibido[0][0].autonumero,document.querySelector("#fecha").value=jsonrecibido[0][0].fecha,clientesCabecera(2);const a=jsonrecibido[0][0].idfinca,e=jsonrecibido[0][0].finca;fincas(a,e),empleadosCabecera(3),compruebaFilas()}function compruebaFilas(){jsonrecibido[1]&&(jsonrecibido[1].forEach(a=>{arrayfilas.push(a.indicefila)}),indicefila=arrayfilas.at(-1)),indicefila>-1?mostrarContenidoTabla():escuchas()}function mostrarContenidoTabla(){const a=jsonrecibido[3],e=jsonrecibido[4],o=jsonrecibido[5],i=jsonrecibido[6];jsonrecibido[1].forEach(d=>{const{id:n,idparte:c,indicefila:r,idempleado:t,nombre:s,idtrabajo:p,trabajos:u,horastrabajo:l,idmaquina:b,maquinas:h,horasmaquina:m,idproducto:j,productos:f,cantidadproducto:C}=d,q=Id(n),y=Idparte(c),E=Indicefilas(r),S=Empleados(a,t,s,!0),v=Trabajos(e,p,u,!0),O=Horastrabajo(l,!0),g=Maquinas(o,b,h,!0),P=Horasmaquinas(m,!0),T=Productos(i,j,f,!0),w=Cantidadproductos(C,!0),B=lapiz("/build/img/lapiz.png","verde"),D=papelera(),F=document.createElement("tr");F.appendChild(q),F.appendChild(y),F.appendChild(E),F.appendChild(S),F.appendChild(v),F.appendChild(O),F.appendChild(g),F.appendChild(P),F.appendChild(T),F.appendChild(w),F.appendChild(B),F.appendChild(D),document.querySelector("#cuerpo").appendChild(F)}),crearObjeto()}function crearObjeto(){jsonrecibido[1].forEach(a=>{const{id:e,idparte:o,indicefila:i,idempleado:d,idtrabajo:n,horastrabajo:c,idmaquina:r,horasmaquina:t,idproducto:s,cantidadproducto:p}=a,u={id:e,idparte:o,indicefila:i,idempleado:d,idtrabajo:n,horastrabajo:c,idmaquina:r,horasmaquina:t,idproducto:s,cantpro:p};arraytrabajos=[...arraytrabajos,u]}),escuchas()}function escuchas(){document.querySelector("#selectEmpleadoCabecera").addEventListener("change",(function(){filaObjeto(3,4,5,6)})),escuchaBotonOk(),escuchaBotonEliminar(),escuchaBotonGuardar()}document.addEventListener("DOMContentLoaded",(function(){edicionApp()}));