var input = document.getElementById('input-cedula');
var loading = document.getElementById('loading');
var mensaje = document.getElementById('mensaje');
var form = document.getElementById('form');

form.addEventListener('submit', function (e) {
    e.preventDefault();
})

let url = "http://localhost/progweb/trabajo-prog/agenda-covid/backend/api/endpoints/verifyID.php";
verificar = () => {
    loading.style.display = 'block';
    axios.post(url, {
        idUsuario: 12345678
    })
        .then(function (res) {
            if (res.status == 200) {
                mensaje.innerHTML = "Welcome "+res.data.nombre+" have a nice day";
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