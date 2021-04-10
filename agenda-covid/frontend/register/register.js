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

let nombre = ""
let apellido = ""
let fechaNac = ""
let idGrupo = ""
onChange = () => {
    nombre = document.getElementById('input-nombre');
    apellido = document.getElementById('input-apellido');
    fechaNac = document.getElementById('input-fechaNac');
    idGrupo = document.getElementById('input-grupo');
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

let inpFechaNac = document.getElementById('input-fechaNac');
const data = new Date();
let anioMin = data.getUTCFullYear() - 65
let anio = data.getUTCFullYear() - 18
let mes = data.getUTCMonth() + 1
let dia = data.getUTCDate()
let mesActual
let diaActual
if (mes >= 1 && mes <= 9) {
    mesActual = "0" + mes
} else {
    mesActual = mes
}
if (dia >= 1 && dia <= 9) {
    diaActual = "0" + dia
} else {
    diaActual = dia
}
let fechaActual = anio + "-" + mesActual + "-" + diaActual
let fechaMin = anioMin + "-" + "01" + "-" + "01"
inpFechaNac.max = fechaActual
inpFechaNac.min = fechaMin

let urlCheck = "http://localhost/progweb/trabajo-prog/agenda-covid/backend/api/endpoints/register.php";
registrar = () => {
    mensaje.style.display = 'none';
    if (nombre.value == "" || apellido.value == "" || fechaNac.value == "" || idGrupo.value == "") {
        mensajeError.innerHTML = "Llena todos los campos";
        mensajeError.style.display = 'block';
    } else if (cedula == "") {
        mensajeError.innerHTML = "Escribe una cédula válida.";
        mensajeError.style.display = 'block';
    } else if (fechaNac.value > fechaActual) {
        mensajeError.innerHTML = "Solo mayores de 18 años";
        mensajeError.style.display = 'block';
    } else if (fechaNac.value < fechaMin) {
        mensajeError.innerHTML = "Solo menores de 65 años";
        mensajeError.style.display = 'block';
    } else {
        mensajeError.innerHTML = "";
        mensajeError.style.display = 'none';
        loading.style.display = 'block';
        axios.post(urlCheck, {
            idUsuario: cedula,
            nombre: nombre.value,
            apellido: apellido.value,
            fechaNacimiento: fechaNac.value,
            idGrupo: idGrupo.value
        })
            .then(res => {
                mensaje.style.display = 'block';
                if (res.data.message == "User was registered successfully.") {
                    mensaje.innerHTML = "Registrado correctamente.";
                    cedula = ""
                    inpCedula.value = ""
                    nombre.value = ""
                    apellido.value = ""
                    fechaNac.value = ""
                    idGrupo.value = ""
                } else if (res.data.message == "Could not register user.") {
                    mensaje.innerHTML = "Error de conexion con la base de datos.";
                } else {
                    mensaje.innerHTML = "Ya existe un usuario con esta cédula.";
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