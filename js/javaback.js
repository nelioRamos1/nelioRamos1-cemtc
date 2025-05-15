function mostrarImagem(opcao) {
    // Esconde todas as imagens
    var imagens = document.querySelectorAll('.image-container');
    imagens.forEach(function(imagem) {
        imagem.style.display = 'none';
    });

    // Mostra a imagem correspondente à opção escolhida
    var imagemEscolhida = document.getElementById(opcao);
    if (imagemEscolhida) {
        imagemEscolhida.style.display = 'block';
    }
}
