const tela = document.querySelector('#tela');

const abrirModal = idModal => {
    document.getElementById(idModal).style.display = "flex";
    tela.style.display = "block";
    tela.style.opacity = "0.5"
}

const fecharModal = idModal => {
    document.getElementById(idModal).style.display = "none";
    tela.style.display = "none";
}