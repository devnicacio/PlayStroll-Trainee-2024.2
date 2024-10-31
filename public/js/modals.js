const tela = document.querySelector('#tela');

const abrirModal = idModal => {
    document.getElementById(idModal).style.display = "flex";
    tela.style.display = 'block';
}

const fecharModal = idModal => {
    document.getElementById(idModal).style.display = "none";
    tela.style.display = 'none';
}