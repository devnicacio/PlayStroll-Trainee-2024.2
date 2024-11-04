/* Como boa prática em JS, 
uso, ao criar variáveis ou constantes que guardam um elemento HTML, o $(dollar ou cifrão) 
no início do identificador destas. */

const $tela = document.querySelector('.tela');

const abrirModal = idModal => {
    document.getElementById(idModal).style.display = "flex";
    $tela.style.display = 'block';
}

const fecharModal = idModal => {
    document.getElementById(idModal).style.display = "none";
    $tela.style.display = 'none';
}