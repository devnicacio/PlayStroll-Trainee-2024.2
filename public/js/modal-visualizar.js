/**
 * @param {string} idModal 
 */
function abrirModalView(idModal) {
    const modal = document.getElementById(idModal);
    modal.style.display = "flex";

    const imagem = document.getElementById('img');
    const imagemDiv = document.getElementById('imgdiv');

    if (imagem && imagem.src.trim()) {
        imagemDiv.style.display = 'flex';
    } else {
        imagemDiv.style.display = 'none';
    }
}

/**
 * @param {string} idModal 
 */
function fecharModalVer(idModal) {
    const modal = document.getElementById(idModal);
    if (modal) {
        modal.style.display = "none";
    }
}
