const tela = document.querySelector('#tela')

function editar(idModal, id2){
    document.getElementById(idModal).style.display="block";
    document.getElementById(id2).style.display="none"
    tela.style.display="block"
}

function editar2(id3, id4){
    document.getElementById(id3).style.display="none"
    document.getElementById(id4).style.display="flex"
    tela.style.display="none"
}