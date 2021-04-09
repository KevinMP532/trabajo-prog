
let btnUp = document.getElementById("btn-up")
let btnDown = document.getElementById("btn-down")
let btn1 = document.getElementById("btn1")
let btn2 = document.getElementById("btn2")
let btn3 = document.getElementById("btn3")
let btn4 = document.getElementById("btn4")
let btn5 = document.getElementById("btn5")

var controller = new ScrollMagic.Controller();
var scene
scene = new ScrollMagic.Scene({ triggerElement: '.sec-home' }).setClassToggle('.logo-id', 'logo-activo').addTo(controller);

scene = new ScrollMagic.Scene({ triggerElement: '.sec-1' }).setClassToggle('.logo-id', 'logo').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-1' }).setClassToggle(btn1, 'activo').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-1' }).setClassToggle(btnDown, 'btn-home-r').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-1' }).setClassToggle(btnUp, 'btn-home-l').addTo(controller);

scene = new ScrollMagic.Scene({ triggerElement: '.sec-2' }).setClassToggle(btn1, 'inactivo').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-2' }).setClassToggle(btn2, 'activo').addTo(controller);

scene = new ScrollMagic.Scene({ triggerElement: '.sec-3' }).setClassToggle(btn2, 'inactivo').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-3' }).setClassToggle(btn3, 'activo').addTo(controller);

scene = new ScrollMagic.Scene({ triggerElement: '.sec-4' }).setClassToggle(btn3, 'inactivo').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-4' }).setClassToggle(btn4, 'activo').addTo(controller);

scene = new ScrollMagic.Scene({ triggerElement: '.sec-5' }).setClassToggle(btn4, 'inactivo').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-5' }).setClassToggle(btn5, 'activo').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-5' }).setClassToggle(btnDown, 'inactivo-btn').addTo(controller);
scene = new ScrollMagic.Scene({ triggerElement: '.sec-5' }).setClassToggle(btnUp, 'btn-home-up').addTo(controller);

let num = 0;

function carusel(numero) {
    num = numero
    switch (numero) {
        case 0:
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#home";
            break;

        case 1:
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#schedule";
            break;

        case 2:
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#scheduleCheck";
            break;

        case 3:
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#scheduleDelete";
            break;

        case 4:
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#countByGroup";
            break;

        case 5:
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#countByAge"
            break;
    }
}

down = () => {
    if (btn1.className == "activo") {
        num = 1
    } else if (btn2.className == "activo") {
        num = 2
    } else if (btn3.className == "activo") {
        num = 3
    } else if (btn4.className == "activo") {
        num = 4
    } else if (btn5.className == "activo") {
        num = 5
    }

    num = num + 1
    if (num === 6) {
        num = 5
    }
    carusel(num);
}

up = () => {
    if (btn1.className == "activo") {
        num = 1
    } else if (btn2.className == "activo") {
        num = 2
    } else if (btn3.className == "activo") {
        num = 3
    } else if (btn4.className == "activo") {
        num = 4
    } else if (btn5.className == "activo") {
        num = 5
    }
    if (num === 0) {
        num = 4
    } else {
        num = num - 1
    }
    if (num === -1) {
        num = 0
    }
    carusel(num);
}