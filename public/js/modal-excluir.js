// Função para abrir o modal de exclusão de usuário
function abrirModalExcluirUsuario(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'flex'; // Exibe o modal

    const tela = document.querySelector('#tela');
    if (tela) tela.style.display = 'block'; // Exibe o fundo escurecido
}


// Função para fechar o modal
function fecharModalExcluirUsuario(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none';

    const tela = document.querySelector('#tela');
    if (tela) tela.style.display = 'none';
}
