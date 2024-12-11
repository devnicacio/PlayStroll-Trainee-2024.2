document.querySelectorAll('.container-estrelas').forEach(container => {
    const avaliation = parseFloat(container.getAttribute('data-avaliation')); // Nota
    const tamanho = container.getAttribute('data-tamanho'); // Tamanho das estrelas
    const estrelas = container.querySelectorAll('.estrela');

    const parteInteira = Math.floor(avaliation); // Parte inteira da nota
    const parteDecimal = avaliation - parteInteira; // Parte decimal da nota (calculado diretamente)

    estrelas.forEach((estrela, index) => {
        const indice = index + 1;

        estrela.style.width = `${tamanho}px`;
        estrela.style.height = `${tamanho}px`;

        if (indice <= parteInteira) {
            estrela.style.background = 'yellow'; // Estrela cheia
        } else if (indice === parteInteira + 1 && parteDecimal > 0) {
            // Metade preenchida ou parcialmente preenchida
            estrela.style.background = `linear-gradient(to right, yellow ${parteDecimal * 100}%, gray ${parteDecimal * 100}%)`;
        } else {
            estrela.style.background = 'gray'; // Estrela vazia
        }
    });
});
