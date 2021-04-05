var input = document.getElementById('input-cedula');
var loading = document.getElementById('loading');
var mensaje = document.getElementById('mensaje');
var form = document.getElementById('form');

form.addEventListener('submit', function (e) {
    e.preventDefault();
})

let url = "http://localhost/trabajoProg/trabajo-prog/agenda-covid/backend/api/endpoints/verifyID.php";
verificar = () => {
    loading.style.display = 'block';
    let body = {"idUsuario": "12345678"}
    axios.post(url, body)
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
