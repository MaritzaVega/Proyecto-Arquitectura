function frmLogin(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    
    if (usuario.value == ""){
        usuario.classList.add("is-invalid");
        
    }else if (clave.value == ""){
        clave.classList.add("is-invalid");
    }
}