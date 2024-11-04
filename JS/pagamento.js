const menuToggle = document.querySelector('.menu-toggle');
const navegaion = document.querySelector('.navegation');

menuToggle.addEventListener('click', () => {
    navegaion.classList.toggle('active'); // Alterna a classe 'active'
});