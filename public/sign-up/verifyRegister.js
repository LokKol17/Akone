let email = document.querySelector('#input-email');
let input1 = document.querySelector('#input-password');
let input2 = document.querySelector('#input-cpassword');
let msg = document.querySelector('#error');
let botao = document.querySelector('#botao');

let emailehvalido = false;
let senhaehvalida = false;

botao.setAttribute('disabled', 'disabled');

email.addEventListener('input', function () {

    let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (regex.test(email.value)) {
        msg.textContent = "";
        emailehvalido = true;
        verificarRemocao();
    } else {
        msg.textContent = "Endereço de email inválido";
        emailehvalido = false;
        verificarRemocao();
    }

})
input1.addEventListener('input', verificarSenha);
input2.addEventListener('input', senhasIguais);

function verificarSenha() {
    let senhaRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; // /^[a-zA-Z0-9]{8,}$/
    if (senhaRegex.test(input1.value)) {
        msg.textContent = "";
        verificarRemocao()
    } else {
        msg.textContent = "A senha deve conter pelo menos 8 caracteres, sendo numeros e letras";
        senhaehvalida = false;
        verificarRemocao();
    }
}

function verificarRemocao() {
    if (emailehvalido === true && senhaehvalida === true) {
        botao.removeAttribute('disabled');
    } else {
        botao.setAttribute('disabled', 'disabled');
    }
}

function senhasIguais() {
    if (input1.value !== input2.value) {
        msg.textContent = "As senhas não coincidem";
        senhaehvalida = false;
        verificarRemocao();
    } else {
        msg.textContent = "";
        senhaehvalida = true;
        verificarRemocao();
    }
}
