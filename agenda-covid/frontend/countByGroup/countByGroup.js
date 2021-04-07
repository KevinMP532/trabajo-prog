var loading = document.getElementById('loading');
var mensaje = document.getElementById('mensaje');
var mensaje2 = document.getElementById('mensaje2');
var mensaje3 = document.getElementById('mensaje3');
var mensaje4 = document.getElementById('mensaje4');
var mensaje5 = document.getElementById('mensaje5');
var mensaje6 = document.getElementById('mensaje6');
var mensaje7 = document.getElementById('mensaje7');

var form = document.getElementById('form');
form.addEventListener('submit', function (e) {
    e.preventDefault();
})

let menu = document.getElementById('header')
showMenu = () => {
    if (menu.style.display == 'none') {
        menu.style.display = 'block'
    } else {
        menu.style.display = 'none'
    }

}

let urlAge = "http://localhost/progweb/trabajo-prog/agenda-covid/backend/api/endpoints/countByGroup.php";
consultar = () => {
    axios.post(urlAge, {})
        .then(res => {
            mensaje.style.display = 'block';
            mensaje2.style.display = 'block';
            mensaje3.style.display = 'block';
            mensaje4.style.display = 'block';
            mensaje5.style.display = 'block';
            mensaje6.style.display = 'block';
            mensaje7.style.display = 'block';
            mensaje.innerHTML = "Bomberos hay "+res.data.Bomberos+"."
            mensaje2.innerHTML = "Hisopadores hay "+res.data.Hisopadores+"."
            mensaje3.innerHTML = "Personal CTI hay "+res.data.Personal_CTI+"."
            mensaje4.innerHTML = "Personal Educacion hay "+res.data.Personal_Educacion+"."
            mensaje5.innerHTML = "Personal Residencia hay "+res.data.Personal_Residencia+"."
            mensaje6.innerHTML = "Personal Salud General hay "+res.data.Personal_Salud_General+"."
            mensaje7.innerHTML = "Policias "+res.data.Policia+"."
            console.log(res);
        })
        .catch(function (err) {
            mensaje.innerText = 'Error de conexión ' + err;
        })
        .then(function () {
            loading.style.display = 'none';
        });
}