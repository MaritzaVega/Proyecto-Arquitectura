let tblUsuarios,tblClientes, tblProductos,tblProductosReporte;
document.addEventListener("DOMContentLoaded", function(){
    $('#cliente').select2();
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc:''
        },
        columns:[
            {
            'data' : 'id'
            },
            {
            'data' : 'usuario'
            },
            {
            'data' :'nombre'
            },
            {
            'data' :'numdoc'
            },
            {
            'data' : 'estado'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        }
        
    });
    //Fin de tabla ususarios
    tblClientes = $('#tblClientes').DataTable({
        ajax: {
            url: base_url + "Clientes/listar",
            dataSrc:''
        },
        columns:[
            {
            'data' : 'id'
            },
            {
            'data' : 'dni'
            },
            {
            'data' :'nombre'
            },
            {
            'data' :'telefono'
            },
            {
            'data' :'direccion'
            },
            {
            'data' : 'estado'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        }
        
    });
    //Fin de tabla clientes
    tblProductos = $('#tblProductos').DataTable({
        ajax: {
            url: base_url + "Productos/listar",
            dataSrc:''
        },
        columns:[
            {
            'data' : 'id'
            },
            {
            'data' : 'imagen'
            },
            {
            'data' : 'codigo'
            },
            {
            'data' :'descripcion'
            },
            {
            'data' :'precio_venta'
            },
            {
            'data' : 'cantidad'
            },
            {
            'data' : 'nivel'
            },
            {
            'data' : 'estado'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        }
    });
    //Fin de Producto
    //REPORTES COMPRAS
    $('#t_reporte_c').DataTable({
        ajax: {
            url: base_url + "Compras/listar_reporte",
            dataSrc:''
        },
        columns:[
            {
            'data' : 'id'
            },
            {
            'data' : 'total'
            },
            {
            'data' : 'fecha'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-3 text-center'B><'col-sm-4'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
             
        buttons : [
            //Botón para Excel
            {
                extend: 'excelHtml5',
                footer: true,
                title: 'Reporte de Compra',
                filename: 'Reporte_Compra',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                },
                //Aquí es donde generas el botón personalizado
                text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
            },
            //Botón para PDF
            {
                extend: 'pdfHtml5',
                download: 'open',
                footer: true,
                title: 'Reporte de Compra',
                filename: 'Reporte_Compra',
                text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            //Botón para copiar
            {
                extend: 'copyHtml5',
                footer: true,
                title: 'Reporte de Compra',
                filename: 'Reporte_Compra',
                text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            //Botón para print
            {
                extend: 'print',
                footer: true,
                title: 'Reporte de Compra',
                filename: 'Reporte_Compra',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                },
                text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
            },
            //Botón para cvs
            {
                extend: 'csvHtml5',
                footer: true,
                title: 'Reporte de Compra',
                filename: 'Reporte_Compra',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                },
                text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
            },
            /*{
                extend: 'colvis',
                text: '<span class="badge badge-info"><i class="fas fa-columns"></i></span>',
                postfixButtons: ['colvisRestore']
            }*/
        ]
        
    });
    //

    ////REPORTES VENTA
    $('#t_reporte_v').DataTable({
        ajax: {
            url: base_url + "Compras/listar_reporte_venta",
            dataSrc:''
        },
        columns:[
            {
            'data' : 'id'
            },
            {
            'data' : 'nombre'
            },
            {
            'data' : 'total'
            },
            {
            'data' : 'fecha'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-3 text-center'B><'col-sm-4'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
             
        buttons : [
            //Botón para Excel
            {
                extend: 'excelHtml5',
                footer: true,
                title: 'Reporte de Venta',
                filename: 'Reporte_Venta',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                },
                //Aquí es donde generas el botón personalizado
                text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
            },
            //Botón para PDF
            {
                extend: 'pdfHtml5',
                download: 'open',
                footer: true,
                title: 'Reporte de Venta',
                filename: 'Reporte_Venta',
                text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            //Botón para copiar
            {
                extend: 'copyHtml5',
                footer: true,
                title: 'Reporte de Venta',
                filename: 'Reporte_Venta',
                text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            //Botón para print
            {
                extend: 'print',
                footer: true,
                title: 'Reporte de Venta',
                filename: 'Reporte_Venta',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                },
                text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
            },
            //Botón para cvs
            {
                extend: 'csvHtml5',
                footer: true,
                title: 'Reporte de Venta',
                filename: 'Reporte_Venta',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                },
                text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
            },
            /*{
                extend: 'colvis',
                text: '<span class="badge badge-info"><i class="fas fa-columns"></i></span>',
                postfixButtons: ['colvisRestore']
            }*/
        ]
        
    });
    //Fin de tabla ususarios
    tblProductosReporte = $('#tblProductosReporte').DataTable({
        ajax: {
            url: base_url + "ProductosReporte/listar",
            dataSrc:''
        },
        columns:[
            {
            'data' : 'id'
            },
            {
            'data' : 'imagen'
            },
            {
            'data' : 'codigo'
            },
            {
            'data' :'descripcion'
            },
            {
            'data' :'precio_venta'
            },
            {
            'data' : 'cantidad'
            },
            {
            'data' : 'nivel'
            },
            {
            'data' : 'estado'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-3 text-center'B><'col-sm-4'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
             
        buttons : [
            //Botón para Excel
            {
                extend: 'excelHtml5',
                footer: true,
                title: 'Reporte de Inventario',
                filename: 'Reporte_Inventario',
 
                //Aquí es donde generas el botón personalizado
                text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
            },
            //Botón para PDF
            {
                extend: 'pdfHtml5',
                download: 'open',
                footer: true,
                title: 'Reporte de Inventario',
                filename: 'Reporte_Inventario',
                text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para copiar
            {
                extend: 'copyHtml5',
                footer: true,
                title: 'Reporte de Inventario',
                filename: 'Reporte_Inventario',
                text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para print
            {
                extend: 'print',
                footer: true,
                title: 'Reporte de Inventario',
                filename: 'Reporte_Inventario',
                text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
            },
            //Botón para cvs
            {
                extend: 'csvHtml5',
                footer: true,
                title: 'Reporte de Inventario',
                filename: 'Reporte_Inventario',
                text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
            }
            /*,{
                extend: 'colvis',
                text: '<span class="badge badge-info"><i class="fas fa-columns"></i></span>',
                postfixButtons: ['colvisRestore']
            }*/
        ]
           
    });    


})

//Cambiar password perfil
function frmCambiarPass(e){
    e.preventDefault();
    const actual = document.getElementById('clave_actual').value;
    const nueva = document.getElementById('clave_nueva').value;
    const confirmar = document.getElementById('confirmar_clave').value;
    if(actual=='' || nueva=='' || confirmar==''){
        alertas('Todos los campos son obligatorios', 'warning');
        return false;
    }else{
        if (nueva != confirmar) {
            alertas('Las contraseñas no coinciden', 'warning');
            return false;
        }else{
            const url = base_url + "Usuarios/cambiarPass";
            const frm = document.getElementById("frmCambiarPass");
            const http = new XMLHttpRequest();
            http.open("POST", url, true); //ejecutar de forma asincrona
            http.send(new FormData(frm));
            http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    $("#cambiarPass").modal("hide");
                    frm.reset();
                } 
            }
        }
    }

}
//abre le modal de los usuarios
function frmUsuario(){
    document.getElementById("title").innerHTML = "Registrar Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo-usuario").modal("show"); 
    document.getElementById("id").value="";
}
//esta funcion trabaja con ->Usuarios.php
function registrarUser(e){ // detiene que la página se cargue de nuevo
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const documentos = document.getElementById("documentos"); //id
    const numDocumento = document.getElementById("numDocumento"); //valor
    //Valida campos vacio
    if(usuario.value == "" || nombre.value == "" || documentos =="" || numDocumento.value == ""){
       //SwetAlert
       
       alertas('Todos los campos son obligatorios','warning');

    }else if(documentos.value == 1 && numDocumento.value.toString().length != 8){
        alertas('El Dni no coincide','warning');
    }else if((documentos.value == 2 && numDocumento.value.toString().length != 12)){
        alertas('El Pasaporte no coincide','warning');
    }else{
        //peticion
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true); //ejecutar de forma asincrona
        http.send(new FormData(frm));
        http.onreadystatechange = function(){//se ejecutara cada vez que cambia
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                $("#nuevo-usuario").modal("hide");
                alertas(res.msg, res.icono);
                tblUsuarios.ajax.reload();
            } 
        }
            
    }

}  

function btnEditarUser(id){ // detiene que la página se cargue de nuevo
   document.getElementById("title").innerHTML = "Actualizar Usuario";
   document.getElementById("btnAccion").innerHTML = "Modificar";

    //mostrar los datos en el modal
    const url = base_url + "Usuarios/editar/"+id;
    const frm = document.getElementById("frmUsuario");
    const http = new XMLHttpRequest();
    http.open("GET", url, true); //ejecutar de forma asincrona
    http.send();
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);

            document.getElementById("id").value = res.id;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("documentos").value = res.id_numdoc;
            document.getElementById("numDocumento").value = res.numdoc;
            document.getElementById("claves").classList.add("d-none");
            $("#nuevo-usuario").modal("show");
        } 
    }

} 


function btnEliminarUser(id ){
    Swal.fire({
        title: 'Está seguro de eliminar?',
        text: "El usuario no se eliminará de forma permanente, solo cambiará su estado a INACTIVO!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
                //mostrar los datos en el modal
                const url = base_url + "Usuarios/eliminar/"+id;
                const frm = document.getElementById("frmUsuario");
                const http = new XMLHttpRequest();
                http.open("GET", url, true); //ejecutar de forma asincrona
                http.send();
                http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                    if(this.readyState == 4 && this.status == 200){
                        const res = JSON.parse(this.responseText);
                        alertas(res.msg, res.icono);
                        tblUsuarios.ajax.reload();
                    } 
                }
                
        }
      })

}

function btnReingresarUser(id ){
    Swal.fire({
        title: 'Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
                //mostrar los datos en el modal
                const url = base_url + "Usuarios/reingresar/"+id;
                const frm = document.getElementById("frmUsuario");
                const http = new XMLHttpRequest();
                http.open("GET", url, true); //ejecutar de forma asincrona
                http.send();
                http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                    if(this.readyState == 4 && this.status == 200){
                        const res = JSON.parse(this.responseText);
                        tblUsuarios.ajax.reload();
                        alertas(res.msg, res.icono);
                    } 
                }
                
        }
      })

}
//Fin usuario

//abre le modal de los Clientes
function frmCliente(){
    document.getElementById("title").innerHTML = "Registrar Nuevo Cliente";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmCliente").reset();
    $("#nuevo-cliente").modal("show"); 
    document.getElementById("id").value="";
}
//esta funcion trabaja con ->Clientes.php
function registrarCli(e){ // detiene que la página se cargue de nuevo
    e.preventDefault();
    const numDocumento = document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");
    //Valida campos vacio
    if(numDocumento.value == "" || nombre.value == "" || telefono.value =="" || direccion.value == ""){
       //SwetAlert 
       alertas('Todos los campos son obligatorios','warning');
    }else if(numDocumento.value.toString().length !=8 &&  numDocumento.value.toString().length !=12 ){
        alertas('Número de  documento ingresado no es valido','warning');
    }else if(telefono.value.toString().length !=7 &&  telefono.value.toString().length !=9){
        alertas('Número de teléfono ingresado no es valido','warning');
    }
    else{
        //peticion
        const url = base_url + "Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST", url, true); //ejecutar de forma asincrona
        http.send(new FormData(frm));
        http.onreadystatechange = function(){//se ejecutara cada vez que cambia
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                $("#nuevo-cliente").modal("hide");
                alertas(res.msg, res.icono);
                tblClientes.ajax.reload();
            } 
        }
            
    }

}  

function btnEditarCli(id){ // detiene que la página se cargue de nuevo
   document.getElementById("title").innerHTML = "Actualizar Cliente";
   document.getElementById("btnAccion").innerHTML = "Modificar";

    //mostrar los datos en el modal
    const url = base_url + "Clientes/editar/"+id;
    const frm = document.getElementById("frmCliente");
    const http = new XMLHttpRequest();
    http.open("GET", url, true); //ejecutar de forma asincrona
    http.send();
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);

            document.getElementById("id").value = res.id;
            document.getElementById("dni").value = res.dni;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("direccion").value = res.direccion;
            $("#nuevo-cliente").modal("show");
        } 
    }

} 

function btnEliminarCli(id ){
    Swal.fire({
        title: 'Está seguro de eliminar?',
        text: "El cliente no se eliminará de forma permanente, solo cambiará su estado a INACTIVO!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
                //mostrar los datos en el modal
                const url = base_url + "Clientes/eliminar/"+id;
                const frm = document.getElementById("frmCliente");
                const http = new XMLHttpRequest();
                http.open("GET", url, true); //ejecutar de forma asincrona
                http.send();
                http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                    if(this.readyState == 4 && this.status == 200){
                        const res = JSON.parse(this.responseText);
                        alertas(res.msg, res.icono);
                        tblClientes.ajax.reload();
                    } 
                }
                
        }
      })

}

function btnReingresarCli(id ){
    Swal.fire({
        title: 'Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
                //mostrar los datos en el modal
                const url = base_url + "Clientes/reingresar/"+id;
                const frm = document.getElementById("frmCliente");
                const http = new XMLHttpRequest();
                http.open("GET", url, true); //ejecutar de forma asincrona
                http.send();
                http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                    if(this.readyState == 4 && this.status == 200){
                        const res = JSON.parse(this.responseText);
                        tblClientes.ajax.reload();
                        alertas(res.msg, res.icono);
                    } 
                }
                
        }
      })

}
//Fin Cliente

function frmProducto(){
    document.getElementById("title").innerHTML = "Nuevo Producto";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmProducto").reset();
    $("#nuevo-producto").modal("show"); 
    document.getElementById("id").value="";
    deleteImg();
}
//esta funcion trabaja con ->Usuarios.php
function registrarPro(e){ // detiene que la página se cargue de nuevo
    e.preventDefault();
    const codigo = document.getElementById("codigo");
    const nombre = document.getElementById("nombre");
    const precio_compra = document.getElementById("precio_compra");
    const precio_venta = document.getElementById("precio_venta");
    //const nivel = document.getElementById("nivel");
    //Valida campos vacio
    if(codigo.value == "" || nombre.value == "" || precio_compra =="" || precio_venta.value == ""){
       //SwetAlert 
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000,
            position: 'center'
            
          })
    }else{
        //peticion
        const url = base_url + "Productos/registrar";
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();
        http.open("POST", url, true); //ejecutar de forma asincrona
        http.send(new FormData(frm));
        http.onreadystatechange = function(){//se ejecutara cada vez que cambia
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
               if(res == "si")
                {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Producto registrado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    frm.reset();
                    $("#nuevo-producto").modal("hide");
                    tblProductos.ajax.reload();
                }else if(res=="Modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Producto modificado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo-producto").modal("hide");
                    tblProductos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            } 
        }
            
    }

}  

function btnEditarPro(id){ // detiene que la página se cargue de nuevo
   document.getElementById("title").innerHTML = "Actualizar Producto";
   document.getElementById("btnAccion").innerHTML = "Modificar";

    //mostrar los datos en el modal
    const url = base_url + "Productos/editar/"+id;
    const frm = document.getElementById("frmUsuario");
    const http = new XMLHttpRequest();
    http.open("GET", url, true); //ejecutar de forma asincrona
    http.send();
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);

            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("nombre").value = res.descripcion;
            document.getElementById("precio_compra").value = res.precio_compra;
            document.getElementById("precio_venta").value = res.precio_venta;
            //foto
            document.getElementById("img-preview").src = base_url + 'Assets/img/'+res.foto;
            document.getElementById("icon-cerrar").innerHTML = `<button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button>`;
            document.getElementById("icon-image").classList.add("d-none");
            document.getElementById("foto_actual").value = res.foto;

            //document.getElementById("nivel").value = res.nivel;
            $("#nuevo-producto").modal("show");
        } 
    }

    

} 

function btnEliminarPro(id ){
    Swal.fire({
        title: 'Está seguro de eliminar?',
        text: "El producto no se eliminará de forma permanente, solo cambiará su estado a INACTIVO!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
                //mostrar los datos en el modal
                const url = base_url + "Productos/eliminar/"+id;
                const frm = document.getElementById("frmUsuario");
                const http = new XMLHttpRequest();
                http.open("GET", url, true); //ejecutar de forma asincrona
                http.send();
                http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                    if(this.readyState == 4 && this.status == 200){
                        const res = JSON.parse(this.responseText);
                        if(res == "ok"){
                            Swal.fire(
                                'Mensaje!',
                                'Producto eliminado con éxito.',
                                'success'
                            )
                            tblProductos.ajax.reload();
                        }else{
                            Swal.fire(
                                'Mensaje!',
                                 res,
                                'error'
                            )
                        }
                    } 
                }
                
        }
      })

}

function btnReingresarPro(id ){
    Swal.fire({
        title: 'Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
                //mostrar los datos en el modal
                const url = base_url + "Productos/reingresar/"+id;
                const frm = document.getElementById("frmUsuario");
                const http = new XMLHttpRequest();
                http.open("GET", url, true); //ejecutar de forma asincrona
                http.send();
                http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                    if(this.readyState == 4 && this.status == 200){
                        const res = JSON.parse(this.responseText);
                        if(res == "ok"){
                            Swal.fire(
                                'Mensaje!',
                                'Producto reingresado con éxito.',
                                'success'
                            )
                            tblProductos.ajax.reload();
                        }else{
                            Swal.fire(
                                'Mensaje!',
                                 res,
                                'error'
                            )
                        }
                    } 
                }
                
        }
      })

}

function preview(e) {
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `<button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button> ${url["name"]}`;
}

function deleteImg() {
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src = '';
    document.getElementById("imagen").value = '';
    document.getElementById("foto_actual").value = '';
}

//Buscar codigo
function buscarCodigo(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if(e.which == 13){
            const url = base_url + "Compras/buscarCodigo/"+cod;
            const http = new XMLHttpRequest();
            http.open("GET", url, true); //ejecutar de forma asincrona
            http.send();
            http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                 if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res){
                        document.getElementById("nombre").value = res.descripcion;
                    document.getElementById("precio").value = res.precio_compra;
                    document.getElementById("id").value = res.id;
                    document.getElementById("cantidad").removeAttribute('disabled');
                    document.getElementById("cantidad").focus();
                    }else{
                        alertas('Producto no existente', 'warning');
                        document.getElementById("codigo").value = '';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    } else{
        alertas('Ingrese el còdigo', 'warning');
    }

}
//Buscar codigoventa
function buscarCodigoVenta(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if(e.which == 13){
            const url = base_url + "Compras/buscarCodigo/"+cod;
            const http = new XMLHttpRequest();
            http.open("GET", url, true); //ejecutar de forma asincrona
            http.send();
            http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                 if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if(res){
                        document.getElementById("nombre").value = res.descripcion;
                    document.getElementById("precio").value = res.precio_venta;
                    document.getElementById("id").value = res.id;
                    document.getElementById("cantidad").removeAttribute('disabled');
                    document.getElementById("cantidad").focus();
                    }else{
                        alertas('Producto no existente', 'warning');
                        document.getElementById("codigo").value = '';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    } else{
        alertas('Ingrese el còdigo', 'warning');
    }

}
////vista compra
function calcularPrecio(e){

        e.preventDefault();
        const cant = document.getElementById("cantidad").value;
        const precio = document.getElementById("precio").value;
        document.getElementById("sub_total").value = precio * cant;

        if(e.which == 13){ //tecla ENTER = 13
            if(cant>0){
                const url = base_url + "Compras/ingresar/";
                const frm = document.getElementById("frmCompra");
                const http = new XMLHttpRequest();
                http.open("POST", url, true); //ejecutar de forma asincrona
                http.send(new FormData(frm));
                http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                    if(this.readyState == 4 && this.status == 200){
                        const res = JSON.parse(this.responseText);
                        alertas(res.msg, res.icono);
                        frm.reset();
                        cargarDetalle();
                        document.getElementById('cantidad').setAttribute('disabled','disabled');
                        document.getElementById('codigo').focus();
                        
                    }
                }

            }
        }

    
}
//
function calcularPrecioVenta(e){

    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("sub_total").value = precio * cant;

    if(e.which == 13){ //tecla ENTER = 13
        if(cant>0){
            const url = base_url + "Compras/ingresarVenta/";
            const frm = document.getElementById("frmVenta");
            const http = new XMLHttpRequest();
            http.open("POST", url, true); //ejecutar de forma asincrona
            http.send(new FormData(frm));
            http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargarDetalleVenta();
                    document.getElementById('cantidad').setAttribute('disabled','disabled');
                    document.getElementById('codigo').focus();
                    
                }
            }

        }
    }


}
if(document.getElementById('tblDetalle')){
    cargarDetalle();
}
if(document.getElementById('tblDetalleVenta')){
    cargarDetalleVenta();
}
function cargarDetalle(){
    const url = base_url + "Compras/listar/detalle";
    const http = new XMLHttpRequest();
    http.open("GET", url, true); //ejecutar de forma asincrona
    http.send();
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalle.forEach(row => {
                html += `<tr> 
                <td>${row['id']}</td>
                <td>${row['descripcion']}</td>
                <td>${row['cantidad']}</td>
                <td>${row['precio']}</td>
                <td>${row['sub_total']}</td>
                <td>
                <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 1)">
                <i class="fas fa-trash-alt"></i></button>
                </td>
                </tr>`;
            });
            document.getElementById("tblDetalle").innerHTML=html;
            document.getElementById("total").value=res.total_pagar.total;
        }
    }
       
}
function cargarDetalleVenta(){
    const url = base_url + "Compras/listar/detalle_temp";
    const http = new XMLHttpRequest();
    http.open("GET", url, true); //ejecutar de forma asincrona
    http.send();
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalle.forEach(row => {
                html += `<tr> 
                <td>${row['id']}</td>
                <td>${row['descripcion']}</td>
                <td>${row['cantidad']}</td>
                <td>${row['precio']}</td>
                <td>${row['sub_total']}</td>
                <td>
                <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 2)">
                <i class="fas fa-trash-alt"></i></button>
                </td>
                </tr>`;
            });
            document.getElementById("tblDetalleVenta").innerHTML=html;
            document.getElementById("total").value=res.total_pagar.total;
        }
    }
       
}
function deleteDetalle(id, accion){
    let url;
    if (accion == 1) {
        url = base_url + "Compras/delete/"+id;
    }else{
        url = base_url + "Compras/deleteVenta/"+id;
    }    
    const http = new XMLHttpRequest();
    http.open("GET", url, true); //ejecutar de forma asincrona
    http.send();
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            if (res == 'ok') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Producto eliminado',
                    showConfirmButton: false,
                    timer: 3000
                })
                if (accion == 1) {
                    cargarDetalle();
                }else{
                    cargarDetalleVenta();
                }  
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error al eliminar el producto',
                    showConfirmButton: false,
                    timer: 3000
                })
            }

        }
    }
}  
function procesar(accion){
    Swal.fire({
        title: 'Está seguro de realizar la compra?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
                let url;
                if (accion == 1) {
                    url = base_url + "Compras/registrarCompra/";
                }else{
                    const id_cliente = document.getElementById('cliente').value;
                    url = base_url + "Compras/registrarVenta/" + id_cliente;
                }
                //mostrar los datos en el modal                
                const http = new XMLHttpRequest();
                http.open("GET", url, true); //ejecutar de forma asincrona
                http.send();
                http.onreadystatechange = function(){//se ejecutara cada vez que cambia
                    if(this.readyState == 4 && this.status == 200){
                        const res = JSON.parse(this.responseText);
                        console.log(res);
                        if(res.msg == "ok"){
                            Swal.fire(
                                'Mensaje!',
                                'Compra generada.',
                                'success'
                            )
                            let ruta;
                            if (accion == 1) {
                                ruta = base_url + 'Compras/generarPdf/'+ res.id_compra;
                            }else{
                                ruta = base_url + 'Compras/generarPdfVenta/'+ res.id_venta;
                            }                            
                            window.open(ruta);
                            setTimeout(() => {
                                window.location.reload();
                            }, 300);

                        }else{
                            Swal.fire(
                                'Mensaje!',
                                 res,
                                'error'
                            )
                        }
                    } 
                }
                
        }
      })
}

function modificarEmpresa() {
    const frm = document.getElementById('frmEmpresa');
    const url = base_url + "Administracion/modificar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true); //ejecutar de forma asincrona
    http.send(new FormData(frm));
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            if(res == 'ok'){
                //alert('Modificado');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Modificado exitosamente',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        } 
    }
}
function alertas(mensaje, icono){
         Swal.fire({
             position: 'center',
             icon: icono,
             title: mensaje,
             showConfirmButton: false,
             timer: 3000
         })
}
//Reporte stock Minimo
reporteStock();
productosVendidos();
function reporteStock(){
    const url = base_url + "Administracion/reporteStock";
    const http = new XMLHttpRequest();
    http.open("POST", url, true); //ejecutar de forma asincrona
    http.send();
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['descripcion']);
                cantidad.push(res[i]['cantidad']);
                
            }
            // Grafico Circular
            var ctx = document.getElementById("stockMinimo");
            var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: nombre,
                datasets: [{
                data: cantidad,
                backgroundColor: ['#f44336', '#7e57c2', '#2196f3', '#009688','#99aa00','#ff9800','#707070','#e91e63','#3f51b5','#00bcd4'],
    }],
  },
});
        } 
    }
}

function productosVendidos(){
    const url = base_url + "Administracion/productosVendidos";
    const http = new XMLHttpRequest();
    http.open("POST", url, true); //ejecutar de forma asincrona
    http.send();
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['descripcion']);
                cantidad.push(res[i]['total']);  
            }
            // Grafico Corona 
            var ctx = document.getElementById("ProductosVendidos");
            
            var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: nombre,
                datasets: [{
                data: cantidad,
                backgroundColor: ['#f44336', '#7e57c2', '#2196f3', '#009688','#99aa00','#ff9800','#707070','#e91e63','#3f51b5','#00bcd4'], /**/
    }],
  },
});
        }
    }
}
   

function registrarPermisos(e) {
    e.preventDefault();
    const url = base_url + "Usuarios/registrarPermiso";
    const frm = document.getElementById('formulario'); 
    const http = new XMLHttpRequest();
    http.open("POST", url, true); //ejecutar de forma asincrona
    http.send(new FormData(frm));
    http.onreadystatechange = function(){//se ejecutara cada vez que cambia
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            if(res != ''){
                alertas(res.msg, res.icono)
            }else{
                alertas('Error no identificado','error');
            }
        }
    }
}
