function Id(e){const t=document.createElement("td");return t.classList.add("ocultar"),t.id="idpartetrabajo",t.textContent=e,t.value=e,t}function Idparte(e){const t=document.createElement("td");return t.classList.add("ocultar"),t.id="idparte",t.textContent=e,t.value=e,t}function Indicefilas(e){const t=document.createElement("td");return t.id="indicefila",t.textContent=e,t.value=e,t}function Empleados(e,t,a,n){const d=document.createElement("td"),o=document.createElement("select");o.classList.add("selectempleado"),o.classList.add("cambiocolor"),o.disabled=n;const c=document.createElement("option");return c.classList.add("empleadoselecionado"),c.textContent=a,c.value=t,c.selected=!0,o.appendChild(c),e.forEach(e=>{const{idempleados:t,nombreempleados:a}=e,n=document.createElement("option");n.classList.add("optionempleado"),n.textContent=a,n.value=t,o.appendChild(n)}),d.appendChild(o),d}function Trabajos(e,t,a,n){const d=document.createElement("td"),o=document.createElement("select");o.classList.add("selecttrabajo"),o.classList.add("cambiocolor"),o.disabled=n;const c=document.createElement("option");return c.classList.add("trabajoseleccionado"),c.textContent=a,c.value=t,o.appendChild(c),e.forEach(e=>{const{idtrabajos:t,nombretrabajos:a}=e,n=document.createElement("option");n.classList.add("optiontrabajo"),n.textContent=a,n.value=t,o.appendChild(n)}),d.appendChild(o),d}function Horastrabajo(e,t){const a=document.createElement("td"),n=document.createElement("input");return n.type="number",n.classList.add("horastrabajo"),n.classList.add("cambiocolor"),n.textContent=e,n.value=e,n.disabled=t,a.appendChild(n),a}function Maquinas(e,t,a,n){const d=document.createElement("td"),o=document.createElement("select");o.classList.add("selectmaquina"),o.classList.add("cambiocolor"),o.disabled=n;const c=document.createElement("option");return c.classList.add("maquinaselecionado"),c.textContent=a,c.value=t,o.appendChild(c),e.forEach(e=>{const{idmaquinas:t,nombremaquinas:a}=e,n=document.createElement("option");n.classList.add("optionmaquina"),n.textContent=a,n.value=t,o.appendChild(n)}),d.appendChild(o),d}function Horasmaquinas(e,t){const a=document.createElement("td"),n=document.createElement("input");return n.type="number",n.classList.add("horasmaquina"),n.classList.add("cambiocolor"),n.textContent=e,n.value=e,n.disabled=t,a.appendChild(n),a}function Productos(e,t,a,n){const d=document.createElement("td"),o=document.createElement("select");o.classList.add("selectproducto"),o.classList.add("cambiocolor"),o.disabled=n;const c=document.createElement("option");return c.classList.add("productoselecionado"),c.textContent=a,c.value=t,o.appendChild(c),e.forEach(e=>{const{idproductos:t,nombreproductos:a}=e,n=document.createElement("option");n.classList.add("optionproducto"),n.textContent=a,n.value=t,o.appendChild(n)}),d.appendChild(o),d}function Cantidadproductos(e,t){const a=document.createElement("td"),n=document.createElement("input");return n.type="number",n.classList.add("cantidadproducto"),n.classList.add("cambiocolor"),n.textContent=e,n.value=e,n.disabled=t,a.appendChild(n),a}function lapiz(e,t){const a=document.createElement("td");a.classList.add("ok");const n=document.createElement("img");return n.classList.add("imgok"),n.classList.add(t),n.src=e,a.appendChild(n),a}function papelera(){const e=document.createElement("td");e.classList.add("borrar");const t=document.createElement("img");return t.classList.add("imgpapelera"),t.src="/build/img/papelera.png",e.appendChild(t),e}