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
