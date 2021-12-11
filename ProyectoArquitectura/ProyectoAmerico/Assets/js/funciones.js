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

function frmUsuario(){
    $("#nuevo-usuario").modal("show"); 
}

function registrarUser(e){ // detiene que la página se cargue de nuevo
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const clave = document.getElementById("clave");
    const confirmar = document.getElementById("confirmar");
    const documentos = document.getElementById("documentos");
    const numDocumento = document.getElementById("numDocumento");
    //Valida campos vacio
    if(usuario.value == "" || nombre.value == ""|| clave.value == "" || documentos =="" || numDocumento.value == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000,
            position: 'center'
            
          })
    }else if(clave.value != confirmar.value){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Las contraseñas no coinciden',
            showConfirmButton: false,
            timer: 3000,
            position: 'center'
            
          })
    }else{
        //peticion ajax
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true); //ejecutar de forma asincrona
        http.send(new FormData(frm));
        http.onreadystatechange = function(){//se ejecutara cada vez que cambia
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                /*const res = JSON.parse(this.responseText);
                if(res == "ok"){
                    window.location = base_url + "Usuarios";
                }else{
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }*/
            } 
        }
            
    }

}   



