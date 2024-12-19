const $sideBar = document.querySelector("#sideBar");

// Função para verificar largura da tela e ajustar comportamento
function configureSideBar() {
    if (window.innerWidth > 768) {
        $sideBar.addEventListener('mouseover', handleMouseOver);
        $sideBar.addEventListener('mouseout', handleMouseOut);
    } else {
        $sideBar.removeEventListener('mouseover', handleMouseOver);
        $sideBar.removeEventListener('mouseout', handleMouseOut);
    }
}

// Handlers para os eventos
function handleMouseOver() {
    $sideBar.classList.add("open-sideBar");
}

function handleMouseOut() {
    $sideBar.classList.remove("open-sideBar");
}

// Chamar configuração inicial e ajustar ao redimensionar
configureSideBar();
window.addEventListener('resize', configureSideBar);
