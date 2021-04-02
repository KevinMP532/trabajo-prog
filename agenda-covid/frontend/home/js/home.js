let title = document.getElementById("title")
let inicio = document.getElementById("inicio")
let btnPreview = document.getElementById("btn-prev")
let imagen1 = document.getElementById("inac1")
let imagen2 = document.getElementById("inac2")
let imagen3 = document.getElementById("inac3")
let imagen4 = document.getElementById("inac4")
let imagen5 = document.getElementById("inac5")

let num = 0;

var btns = document.getElementsByClassName("btns-opciones");




function carusel(numero) {
    num = numero
    inicio.className = "inactivo";
    btnPreview.disabled = false;
    for (var i = 0; i < btns.length; i++) {
        btns[i].style.backgroundColor = "white";
        btns[i].style.color = "black";
    }
    switch (numero) {
        case 1:
            title.innerHTML = "Agendarse con CI."
            imagen1.className = "activo";
            imagen2.className = "inactivo";
            imagen3.className = "inactivo";
            imagen4.className = "inactivo";
            imagen5.className = "inactivo";
            btns[0].style.backgroundColor = "rgb(81, 195, 125)";
            btns[0].style.color = "white";
            break;

        case 2:
            title.innerHTML = "Consultar agenda"
            imagen1.className = "inactivo";
            imagen2.className = "activo";
            imagen3.className = "inactivo";
            imagen4.className = "inactivo";
            imagen5.className = "inactivo";
            btns[1].style.backgroundColor = "rgb(81, 195, 125)";
            btns[1].style.color = "white";
            break;

        case 3:
            title.innerHTML = "Borrar agenda."
            imagen1.className = "inactivo";
            imagen2.className = "inactivo";
            imagen3.className = "activo";
            imagen4.className = "inactivo";
            imagen5.className = "inactivo";
            btns[2].style.backgroundColor = "rgb(81, 195, 125)";
            btns[2].style.color = "white";
            break;

        case 4:
            title.innerHTML = "Consultar cantidad de usuarios por grupo."
            imagen1.className = "inactivo";
            imagen2.className = "inactivo";
            imagen3.className = "inactivo";
            imagen4.className = "activo";
            imagen5.className = "inactivo";
            btns[3].style.backgroundColor = "rgb(81, 195, 125)";
            btns[3].style.color = "white";
            break;

        case 5:
            title.innerHTML = "Consultar cantidad de usuarios por grupo de edad."
            imagen1.className = "inactivo";
            imagen2.className = "inactivo";
            imagen3.className = "inactivo";
            imagen4.className = "inactivo";
            imagen5.className = "activo";
            btns[4].style.backgroundColor = "rgb(81, 195, 125)";
            btns[4].style.color = "white";
            break;
    }
}

adelante = () => {

    num = num + 1
    if (num === 6) {
        num = 1
    }
    carusel(num);
}

atras = () => {
    num = num - 1
    if (num === 0) {
        num = 5
    }
    carusel(num);
}