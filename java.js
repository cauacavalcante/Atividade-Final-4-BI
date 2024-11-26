document.addEventListener('DOMContentLoaded', () => {
    const scrollToTopLink = document.querySelector('footer a');
    
    scrollToTopLink.addEventListener('click', (e) => {
        e.preventDefault(); // Evita o comportamento padrão do link
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Suaviza o deslocamento
        });
    });
});
