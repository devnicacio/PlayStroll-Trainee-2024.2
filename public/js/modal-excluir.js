// Função para abrir o modal de exclusão de usuário
function abrirModalExcluirUsuario(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'flex';

    const tela = document.querySelector('#tela');
    if (tela) tela.style.display = 'block';
}

// Função para fechar o modal
function fecharModalExcluirUsuario(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none';

    const tela = document.querySelector('#tela');
    if (tela) tela.style.display = 'none';
}
