let loading = document.getElementById('loading');
let mensaje = document.getElementById('mensaje-schedule');
let mensajeError = document.getElementById('error-message');

let form = document.getElementById('form');
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

let urlDelete = "http://localhost/progweb/trabajo-prog/agenda-covid/backend/api/endpoints/scheduleDelete.php";
borrar = () => {
    mensaje.style.display = 'none';
    if (cedula == "") {
        mensajeError.innerHTML = "Escribe una cédula válida.";
        mensajeError.style.display = 'block';
    } else {
        mensajeError.innerHTML = "";
        mensajeError.style.display = 'none';
        loading.style.display = 'block';
        axios.post(urlDelete, {
            idUsuario: cedula
        })
            .then(res => {
                mensaje.style.display = 'block';
                if (res.data.message == "Schedule deleted successfully.") {
                    mensaje.innerHTML = "Agenda eliminada correctamente.";
                    inpCedula.value = ""
                } else {
                    mensaje.style.textAlign = "center";
                    mensaje.innerHTML = "No ha sido posible desagendarte, esto puede deberse a que no esta agendado, a que su cédula es incorrecta o a que ya transcurrio la primer fecha.";
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