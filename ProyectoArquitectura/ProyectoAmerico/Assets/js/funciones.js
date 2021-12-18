let tblUsuarios;
document.addEventListener("DOMContentLoaded", function(){
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
        ]
        
    });
})

function frmLogin(e){ // detiene que la página se cargue de nuevo
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    //Valida campos vacio
    if(usuario.value ==""){
        //alertas para llenar datos en los campos y si son los mismo de la bd
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    }else if(clave.value ==""){
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    }else{
        //peticion ajax
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){//se ejecutara cada vez que cambia
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if(res == "ok"){
                    window.location = base_url + "Usuarios";
                }else{
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }
            } 
        }
            
    }

}

//abre le modal de los usuarios
function frmUsuario(){
<<<<<<< HEAD
        document.getElementById("title").innerHTML = "Registrar Nuevo Usuario";
        document.getElementById("btnAccion").innerHTML = "Registrar";
        document.getElementById("claves").classList.remove("d-none");
        document.getElementById("frmUsuario").reset();
        $("#nuevo-usuario").modal("show"); 
        document.getElementById("id").value="";
=======
    document.getElementById("title").innerHTML = "Registrar Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo-usuario").modal("show"); 
    document.getElementById("id").value="";
>>>>>>> Marlene
}
//esta funcion trabaja con ->Usuarios.php
function registrarUser(e){ // detiene que la página se cargue de nuevo
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const clave = document.getElementById("clave");
    const confirmar = document.getElementById("confirmar");
    const documentos = document.getElementById("documentos");
    const numDocumento = document.getElementById("numDocumento");
    //Valida campos vacio
    if(usuario.value == "" || nombre.value == "" || documentos =="" || numDocumento.value == ""){
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
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
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
                        title: 'Usuario registrado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    frm.reset();
                    $("#nuevo-usuario").modal("hide");
                    tblUsuarios.ajax.reload();
                }else if(res=="Modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Usuario modificado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo-usuario").modal("hide");
                    tblUsuarios.ajax.reload();
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



