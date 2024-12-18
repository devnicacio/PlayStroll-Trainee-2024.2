// Animação de abertura da caption do menu
const $sideBar = document.querySelector("#sideBar");

if(window.innerWidth > 768){
$sideBar.addEventListener('mouseover', ()=>{
    $sideBar.classList.add("open-sideBar");
})
$sideBar.addEventListener('mouseout', ()=>{
    $sideBar.classList.remove("open-sideBar");
})
}