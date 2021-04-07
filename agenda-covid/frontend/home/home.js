
let btnUp = document.getElementById("btn-up")
let btnDown = document.getElementById("btn-down")
let btn1 = document.getElementById("btn1")
let btn2 = document.getElementById("btn2")
let btn3 = document.getElementById("btn3")
let btn4 = document.getElementById("btn4")
let btn5 = document.getElementById("btn5")

var controller = new ScrollMagic.Controller();
var scene
scene = new ScrollMagic.Scene({ triggerElement: '.sec-home' }).setClassToggle('.logo', 'logo-activo').addTo(controller);

scene = new ScrollMagic.Scene({ triggerElement: '.sec-1' }).setClassToggle('.logo', 'logo').addTo(controller);
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
            /*             btn1.className = "inactivo";
                        btn2.className = "inactivo";
                        btn3.className = "inactivo";
                        btn4.className = "inactivo";
                        btn5.className = "inactivo"; */
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#home";
            /*             btnUp.style.display = "none";
                        btnDown.className = "btn-home-down"; */
            break;

        case 1:
            /*             btn1.className = "activo";
                        btn2.className = "inactivo";
                        btn3.className = "inactivo";
                        btn4.className = "inactivo";
                        btn5.className = "inactivo"; */
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#schedule";
            /*             btnUp.style.display = "block";
                        btnDown.style.display = "block";
                        btnUp.className = "btn-home-l";
                        btnDown.className = "btn-home-r"; */
            break;

        case 2:
            /*             btn1.className = "inactivo";
                        btn2.className = "activo";
                        btn3.className = "inactivo";
                        btn4.className = "inactivo";
                        btn5.className = "inactivo"; */
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#scheduleCheck";
            /*             btnUp.style.display = "block";
                        btnDown.style.display = "block";
                        btnUp.className = "btn-home-l";
                        btnDown.className = "btn-home-r"; */
            break;

        case 3:
            /*             btn1.className = "inactivo";
                        btn2.className = "inactivo";
                        btn3.className = "activo";
                        btn4.className = "inactivo";
                        btn5.className = "inactivo"; */
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#scheduleDelete";
            /*             btnUp.style.display = "block";
                        btnDown.style.display = "block";
                        btnUp.className = "btn-home-l";
                        btnDown.className = "btn-home-r"; */
            break;

        case 4:
            /*             btn1.className = "inactivo";
                        btn2.className = "inactivo";
                        btn3.className = "inactivo";
                        btn4.className = "activo";
                        btn5.className = "inactivo"; */
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#countByGroup";
            /*             btnUp.style.display = "block";
                        btnDown.style.display = "block";
                        btnUp.className = "btn-home-l";
                        btnDown.className = "btn-home-r"; */
            break;

        case 5:
            /*             btn1.className = "inactivo";
                        btn2.className = "inactivo";
                        btn3.className = "inactivo";
                        btn4.className = "inactivo";
                        btn5.className = "activo"; */
            window.location = "file:///C:/xampp/htdocs/progweb/trabajo-prog/agenda-covid/frontend/home/home.html#countByAge"
            /*             btnDown.style.display = "none";
                        btnUp.className = "btn-home-up" */
            break;
    }
}

down = () => {
    num = num + 1
    if (num === 6) {
        num = 5
    }
    carusel(num);
}

up = () => {
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