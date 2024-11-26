/* Como boa prática em JS, 
uso, ao criar variáveis ou constantes que guardam um elemento HTML, o $(dollar ou cifrão) 
no início do identificador destas. */


/* Lógica para abrir e fechar todos os modais */
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

/* Lógica para definir as estrelas vindo do banco de dados no HTML. */
const updateStars = () => {
    const rating = document.querySelector(".postAvaliation").textContent;
    const $stars = document.querySelectorAll(".star");

    const fullStars = Math.floor(rating);
    const halfStars = (rating % 1) >= 0.5 ? 1 : 0;
    const emptyStarts = 5 - (fullStars + halfStars);

    for(let i = 0; i < $stars.length; i++){
        if(i < fullStars){
            $stars[i].classList.add("full");
            $stars[i].classList.remove("")
        }
    }
}
updateStars();