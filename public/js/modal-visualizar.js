
function abrirModalView(idModal, id2)
{
    document.getElementById(idModal).style.display="flex";
    document.getElementById(id2).style.display="flex";

}

function fecharModalView(id3, id4)
{
    document.getElementById(id3).style.display="none";
    document.getElementById(id4).style.display="flex";
    tela.style.display="none"
}