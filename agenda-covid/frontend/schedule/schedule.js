var loading = document.getElementById('loading');
var mensaje = document.getElementById('mensaje-schedule');
var mensajeError = document.getElementById('error-message');
var btnVerificar = document.getElementById('btn-verificar');
var btnAgendar = document.getElementById('btn-agendar');
var lblCedula = document.getElementById('lbl-cedula');
var lblTel = document.getElementById('lbl-tel');
let inpCedula = document.getElementById('input-cedula');
let inpTelefono = document.getElementById('input-telefono');

var form = document.getElementById('form');
form.addEventListener('submit', function (e) {
    e.preventDefault();
})

let cedula = ""
let telefono = ""
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
inpTelefono.addEventListener("input", function (e) {
    if (this.value.length > 8) {
        this.value = telefono
    }
    if (this.value.length === 8) {
        telefono = this.value
        console.log(telefono)
    } else {
        telefono = ""
    }
});

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

let URL = "http://localhost/progweb/trabajo-prog/agenda-covid/backend/api/endpoints/schedule.php";
verificar = () => {
    mensaje.style.display = 'none';
    if (cedula == "") {
        mensajeError.innerHTML = "Escribe una cédula válida.";
        mensajeError.style.display = 'block';
    } else {
        mensajeError.innerHTML = "";
        mensajeError.style.display = 'none';
        mensaje.innerHTML = "";
        loading.style.display = 'block';
        axios.post(URL, {
            idUsuario: cedula
        })
            .then(res => {
                mensaje.style.display = 'block';
                if (res.data.message == "User does not exist.") {
                    mensaje.innerHTML = "No estás registrado como usuario.";
                } else {
                    mensaje.innerHTML = "Bienvenido " + res.data.nombre + ", que tengas un lindo dia.";
                    inpCedula.style.display = 'none';
                    inpTelefono.style.display = 'block';
                    lblCedula.style.display = 'none';
                    lblTel.style.display = 'block';
                    btnVerificar.style.display = 'none';
                    btnAgendar.style.display = 'block';
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

agendarse = () => {
    mensaje.style.display = 'none';
    if (telefono == "") {
        mensajeError.innerHTML = "Escribe un número de teléfono válido.";
        mensajeError.style.display = 'block';
    } else {
        mensajeError.innerHTML = "";
        mensajeError.style.display = 'none';
        loading.style.display = 'block';
        axios.post(URL, {
            idUsuario: cedula,
            telefono: telefono
        })
            .then(res => {
                mensaje.style.display = 'block';
                if (res.data.message == "User scheduled successufully") {
                    mensaje.innerHTML = "Agendado correctamente.";
                    inpCedula.value = ""
                    cedula = ""
                    inpTelefono.value = ""
                    telefono = ""
                } else {
                    mensaje.innerHTML = "Ya estas agendado.";
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