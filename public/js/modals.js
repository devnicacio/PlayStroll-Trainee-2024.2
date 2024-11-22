/* Como boa prática em JS, 
uso, ao criar variáveis ou constantes que guardam um elemento HTML, o $(dollar ou cifrão) 
no início do identificador destas. */

const $tela = document.querySelector('.tela');

const abrirModal = idModal => {
    document.getElementById(idModal).style.display = "flex";
    $tela.style.display = 'block';
    $tela.style.opacity = '0.5';
}

const fecharModal = idModal => {
    document.getElementById(idModal).style.display = "none";
    $tela.style.display = 'none';
}

const $postAvaliation = document.querySelector(".postAvaliation");
($postAvaliation => {
    const $modalPostVisualizarStars = document.querySelector(".modalPostVisualizar--stars");
    $modalPostVisualizarStars.textContent = ``;
    let i = 0;
    while(i < $postAvaliation){
        $modalPostVisualizarStars.textContent += `★` ;
        i++;
    }
    for(let j = 0; j < $postAvaliation-i; j++)
        $modalPostVisualizarStars.textContent += `☆`;
})