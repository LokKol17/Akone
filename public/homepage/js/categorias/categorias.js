// container.style.cssText = `transform: translateX(${sum}px);`;

let container = document.querySelector('.categorias__container');
let bd = document.querySelector('#btnDir');
let be = document.querySelector('#btnEsq');

bd.addEventListener('click', ClickDir);
be.addEventListener('click', ClickEsq);

let counter = 0;

let pos = 0;

function ClickDir() {
    if (pos <= -900) {
        return;
    }
    pos -= 150;
    anime({
        targets: '.categorias__container',
        translateX: pos,
        duration: 1000,
    });

}
function ClickEsq() {
    if (pos >= 0) {
        return;
    }
    pos += 150;
    anime({
        targets: '.categorias__container',
        translateX: pos,
        duration: 1000,
    });

}


function VerificaContador() {
    if (counter === 0) {
        be.style.display = 'none';
        bd.style.display = 'flex';
        counter = 1;
    } else {
        be.style.display = 'flex'
        bd.style.display = 'none'
        counter = 0;
    }
}