let menuHamburgerWrapper = document.querySelector('#menuHamburgerWrapper');
let hamburguer1 = document.querySelector('#hamburguer1');
let hamburguer2 = document.querySelector('#hamburguer2');
let hamburguer3 = document.querySelector('#hamburguer3');

menuHamburgerWrapper.addEventListener('click', Click);

let contador = 0;

function Click() {
    // console.log("YOOOOO") //
    // console.log(contador) //


    // ISSO É O X //
    if (contador === 0) {
        hamburguer1.style.cssText = 'transform: translate(0 , 13px) rotate(45deg);';
        hamburguer2.style.cssText = 'width: 0px;' + 'transition: none';
        hamburguer3.style.cssText = 'transform: translate(0 , -13px) rotate(-45deg);';
        contador = 1;

        PuxaMenu();
    }
    // ISSO É O MENU BURGAO //
    else {
        hamburguer1.style.cssText = 'transform: translate(0 , 25px) rotate(0deg);';
        hamburguer2.style.cssText = 'width: 50px;' + 'transition: all .5s';
        hamburguer3.style.cssText = 'transform: translate(0 , -25px) rotate(0deg);';
        contador = 0;

        EmpurraMenu();
    }
}

function PuxaMenu() {
    let cabecalho = document.querySelector('.cabecalho');
    let container = document.querySelector('.cabecalho__container');
    cabecalho.style.height = 'auto';
    container.style.display = 'none';
    let menu = document.querySelector('.menu');
    menu.style.cssText = 'transform: translateY(-72px);';
    cabecalho.style.overflow = 'visible';
}
function EmpurraMenu() {
    let cabecalho = document.querySelector('.cabecalho');
    let container = document.querySelector('.cabecalho__container');
    cabecalho.style.height = '72px';
    container.style.display = 'flex';
    let menu = document.querySelector('.menu');
    menu.style.cssText = 'transform: translateY(-570px)';
    setTimeout(() => cabecalho.style.overflow = 'hidden', 1000);
}
