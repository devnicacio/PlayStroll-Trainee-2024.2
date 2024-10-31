/* Animação da abetura do buscar */
const $liBuscar = document.querySelector("#navbar").children[1].children[1];
const $inputSearchForm = $liBuscar.firstElementChild.lastElementChild;
const $pBuscar = $liBuscar.lastElementChild;

/* Animação ao clicar no ícone de menu */
function movimentacaoMenuIcon(){
    const $menuIcon = document.querySelector("#menuIcon");
    $menuIcon.classList.toggle("muda");
    const subSection = document.querySelector("#tabletAndMobileSubSection");
    if($menuIcon.classList[0] == "muda"){
        subSection.style.display = "flex";
    }else{
        subSection.style.display = "none";
    }
}