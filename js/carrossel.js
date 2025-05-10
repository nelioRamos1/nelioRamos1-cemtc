// Acessando os elementos
const prevButton = document.querySelector('.seta-prev');
const nextButton = document.querySelector('.seta-next');
const carrosselWrapper = document.querySelector('.carrossel-wrapper');
const items = document.querySelectorAll('.carrossel-item');
let index = 0;

// Função para mudar as imagens (carrossel)
function mudarCarrossel() {
    carrosselWrapper.style.transform = `translateX(${-index * 100}%)`;
}

// Evento de navegação para a esquerda
prevButton.addEventListener('click', () => {
    if (index === 0) {
        index = items.length - 1; // Vai para o último item
    } else {
        index--;
    }
    mudarCarrossel();
});

// Evento de navegação para a direita
nextButton.addEventListener('click', () => {
    if (index === items.length - 1) {
        index = 0; // Volta para o primeiro item
    } else {
        index++;
    }
    mudarCarrossel();
});

// Funcionalidade de navegação automática
setInterval(() => {
    if (index === items.length - 1) {
        index = 0; // Volta para o primeiro item
    } else {
        index++;
    }
    mudarCarrossel();
}, 15000); // Muda automaticamente a cada 5 segundos
