const imgPlace = document.querySelector('#imagem-capa'); // Elemento que vai receber a imagem.
const imgInput = document.querySelector('#capa'); // Input que vai receber o arquivo.
imgInput.addEventListener('change', function(evt) {
    if (!(evt.target && evt.target.files && evt.target.files.length > 0)) { // Verifica se o arquivo existe.
        return;
    }

    // Inicia o file-reader:
    const r = new FileReader();
    // Define o que ocorre quando concluir:
    r.onload = function() {
        // Define o `src` do elemento para o resultado:
        imgPlace.src = r.result;
    }
    // Lê o arquivo e cria um link (o resultado vai ser enviado para o onload.
    r.readAsDataURL(evt.target.files[0]);

});
