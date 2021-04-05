var input = document.getElementById('input-cedula');
var loading = document.getElementById('loading');
var mensaje = document.getElementById('mensaje');
var form = document.getElementById('form');

form.addEventListener('submit', function (e) {
    e.preventDefault();
})

let url = "http://localhost/trabajo-prog/agenda-covid/backend/api/endpoints/schedule.php";
verificar = () => {
    loading.style.display = 'block';
    axios.get(url, {
        headers: {
            'Content-Type': 'application/json'
        },
        "idUsuario": "12345678"
    })
        .then(function (res) {
            if (res.status == 200) {
                mensaje.innerHTML = res.data;
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
