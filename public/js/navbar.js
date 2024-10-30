/* Animação da abetura do buscar */
const $liBuscar = document.querySelector("#navbar").children[1].children[1];
const $inputSearchForm = $liBuscar.firstElementChild.lastElementChild;
const $pBuscar = $liBuscar.lastElementChild;

/*$liBuscar.addEventListener('click', e =>{
    $inputSearchForm.style.width = "105px";
    $inputSearchForm.style.padding = "0 0 0 1.5vw";
    $pBuscar.style.opacity = "0";
    $pBuscar.style.width = "0";
});
$document.addEventListener('click', e =>{
    $inputSearchForm.style.width = "0";
    $inputSearchForm.style.padding = "0 0 0 0";
    $pBuscar.style.opacity = "100";
    $pBuscar.style.width = "auto"
});
/* Animação ao clicar no ícone de menu */
const abrirATableAndMobileSubSection = (menuIcon)=>{
    menuIcon.classList.toggle("muda");
    const subSection = document.querySelector("#tabletAndMobileSubSection");
    if(menuIcon.classList[0] == "muda"){
        subSection.style.display = "flex";
    }else{
        subSection.style.display = "none";
    }
}