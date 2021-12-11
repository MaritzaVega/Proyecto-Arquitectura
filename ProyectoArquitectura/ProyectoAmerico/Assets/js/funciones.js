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