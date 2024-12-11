const $tela = document.querySelector('.tela');
/**
 * @param {string} idModal
 */
function abrirModal(idModal){
    document.getElementById(idModal).style.display = "flex";
    $tela.style.display = 'block';
    $tela.style.opacity = '0.5';
}

/**
 * @param {string} idModal 
 */
function fecharModal(idModal){
    document.getElementById(idModal).style.display = "none";
    $tela.style.display = 'none';
}

// Abrir modal-visualizar

/**
 * @param {string} idModal
 */
function abrirModalVer(idModal) {
    const modal = document.getElementById(idModal);
    const telaRead = document.getElementById(`tela-${idModal}`);
    if (modal && telaRead) {
        modal.style.display = "flex";
        telaRead.style.display = "block";
        telaRead.style.opacity = "0.5";
    }
}

/**
 * @param {string} idModal 
 */
function fecharModalVer(idModal) {
    const modal = document.getElementById(idModal);
    const telaRead = document.getElementById(`tela-${idModal}`);
    if (modal && telaRead) {
        modal.style.display = "none";
        telaRead.style.display = "none";
    }
}

