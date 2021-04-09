var loading = document.getElementById('loading');
var mensaje = document.getElementById('mensaje');
var mensaje2 = document.getElementById('mensaje2');
var mensaje3 = document.getElementById('mensaje3');

var form = document.getElementById('form');
form.addEventListener('submit', function (e) {
    e.preventDefault();
})

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

let urlAge = "http://localhost/progweb/trabajo-prog/agenda-covid/backend/api/endpoints/countByAge.php";
consultar = () => {
    axios.post(urlAge, {})
        .then(res => {
            mensaje.style.display = 'block';
            mensaje2.style.display = 'block';
            mensaje3.style.display = 'block';
            mensaje.innerHTML = "Entre los 18 y 30 años hay " + res.data.Entre_18_y_30 + " personas."
            mensaje2.innerHTML = "Entre los 31 y 50 años hay " + res.data.Entre_31_y_50 + " personas."
            mensaje3.innerHTML = "Entre los 51 y 65 años hay " + res.data.Entre_51_y_65 + " personas."
            console.log(res);
        })
        .catch(function (err) {
            mensaje.innerText = 'Error de conexión ' + err;
        })
        .then(function () {
            loading.style.display = 'none';
        });
}