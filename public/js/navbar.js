/* Animação ao clicar no ícone de menu */
function movimentacaoMenuIcon(){
    const $menuIcon = document.querySelector("#navigationBar--menuIcon");
    $menuIcon.classList.toggle("muda");
    const $subSection = document.querySelector("#tabletAndMobileSubSection");
    $subSection.style.display = $menuIcon.classList[0] == "muda" ? "flex" : "none";
}