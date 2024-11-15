const tela = document.querySelector('#tela');

const abrirModalExcluir = (idModal, userId) => {
    document.getElementById(idModal).style.display = "flex";
    document.getElementById('id-excluir').value = userId; 
    tela.style.display = 'block';
};

const fecharModalExcluir = (idModal) => {
    document.getElementById(idModal).style.display = "none";
    tela.style.display = 'none';
};
