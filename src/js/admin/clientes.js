
// Datatable clientes

$(document).ready( function () { 
    dataClientes();
} );
    
    function dataClientes(){
        $('#clientes').DataTable({
            responsive: true,
            ajax: {
                url: "/clientes/listado_P",
                method: "POST"
            },
            columnDefs: [
                { className: "id", "targets": [ 0 ] },
                { className: "imagen", "targets": [ 1 ] },
                { className: "nombre", "targets": [ 2 ] },
                { className: "apellidos", "targets": [ 3 ] },
                { className: "email", "targets": [ 4 ] },
                { className: "telefono", "targets": [ 5 ] },
                { className: "diapago", "targets": [ 6 ] },
                { className: "pagook", "targets": [ 7 ] },
                { className: "ver", "targets": [ 8 ] },
                { className: "actualiza", "targets": [ 9 ] },
                { className: "elimina", "targets": [ 10 ] },
                ],
            columns:[
                {'data': "id"},
                {
                    'data': 'imagen',
                    'sortable': false,              // para quitar las flechas y que no se puedan ordenar
                    'searchable': false,
                    'render': function (Imagen) {
                        if (Imagen == 0) {
                            return 'N/A';
                        }
                        else {
                            var img = '/imagenesClientes/' + Imagen;
                            return '<img src="' + img + '"/>';
                        }
                    }
                },
                {data: "nombre"},
                {data: "apellidos"},
                {data: "email"},
                {data: "telefono"},
                {data: "diapago"},
                {data: "pagook"},
                {
                    'data': 'id',
                    'sortable': false,              
                    'searchable': false,
                    'render': function (id) {
                        return `<a href="/clientes/ver?id=${id}"><img class="P_ver" src="/build/img/mas.png"> </a>`;
                     }
                },
                {
                    'data': 'id',
                    'sortable': false,              
                    'searchable': false,
                    'render': function (id) {
                        return `<a href="/clientes/actualizar?id=${id}"><img class="P_actualizar" src="/build/img/lapiz.png"> </a>`;
                     }
                },
                {
                     'data': 'id',
                     'sortable': false,              
                     'searchable': false,
                     'render': function (id) {
                         return `<a onclick="abre_modal(${id}, 'cliente');" ><img class="P_eliminar" src="/build/img/papelera.png"></a>`;
                      }
                 },
                ],
            language: idioma
                
         });
    }
 