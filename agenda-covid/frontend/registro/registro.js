var loading = document.getElementById('loading');
var mensaje = document.getElementById('mensaje-schedule');
var mensajeError = document.getElementById('error-message');

var form = document.getElementById('form');
form.addEventListener('submit', function (e) {
    e.preventDefault();
})

let cedula = ""
let inpCedula = document.getElementById('input-cedula');
inpCedula.addEventListener("input", function (e) {
    if (this.value.length > 8) {
        this.value = cedula
    }
    if (this.value.length === 8) {
        cedula = this.value
    } else {
        cedula = ""
    }
});

let inpNombre = ""
let inpApellido = ""
let inpFechaNac = ""
let inpIdGrupo = ""
onChange = () => {
    inpNombre = document.getElementById('input-nombre').value;
    inpApellido = document.getElementById('input-apellido').value;
    inpFechaNac = document.getElementById('input-fechaNac').value;
    inpIdGrupo = document.getElementById('input-grupo').value;
}

let body = document.getElementById('body')
let divContForm = document.getElementById('container-form')
let menu = document.getElementById('header')
showMenu = () => {
    if (menu.style.display == 'none') {
        menu.style.display = 'block'
        divContForm.className = 'container-form-menu'
        body.className = 'body-form-menu'
    } else {
        menu.style.display = 'none'
        divContForm.className = 'container-form'
        body.className = 'body-form'
    }

}


let urlCheck = "http://localhost/progweb/trabajo-prog/agenda-covid/backend/api/endpoints/scheduleCheck.php";
registrar = () => {
    mensaje.style.display = 'none';
    if (inpNombre == "" || inpApellido == "" || inpFechaNac == "" || inpIdGrupo == "") {
        mensajeError.innerHTML = "Llena todos los campos";
        mensajeError.style.display = 'block';
    } else if (cedula == "") {
        mensajeError.innerHTML = "Escribe una cédula válida.";
        console.log(inpNombre + inpApellido + inpFechaNac + inpIdGrupo)
        mensajeError.style.display = 'block';
    } else {
        mensajeError.innerHTML = "";
        mensajeError.style.display = 'none';
        loading.style.display = 'block';
        axios.post(urlCheck, {
            idUsuario: cedula
        })
            .then(res => {
                mensaje.style.display = 'block';
                if (res.data.message == "User schedule not found.") {
                    mensaje.innerHTML = "No estas agendado.";
                } else {
                    mensaje.innerHTML = "Usted tiene que vacunarse el " + res.data.fechaV1 + " y el " + res.data.fechaV2 + ".";
                }
                console.log(res);
            })
            .catch(function (err) {
                mensaje.innerText = 'Error de conexión ' + err;
            })
            .then(function () {
                loading.style.display = 'none';
            });
    }
}