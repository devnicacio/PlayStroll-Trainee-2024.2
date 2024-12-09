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
const $telaVer = document.querySelector('.tela-read');
const $modalVer = document.querySelector('.read');

/**
 * @param {string} idModal
 */
function abrirModalVer(idModal){
    document.getElementById(idModal).style.display = "flex";
    $telaVer.style.display = 'block';
    $telaVer.style.opacity = '0.5';
}

/**
 * @param {string} idModal 
 */
function fecharModalVer(idModal){
    document.getElementById(idModal).style.display = "none";
    $telaVer.style.display = 'none';
    $modalVer.style.display = 'none';
}