function abrirModal(idModal, id2)
{
    document.getElementById(idModal).style.display="flex";
    document.getElementById(id2).style.display="none"
}

function fecharModal(id3, id4)
{
    document.getElementById(id3).style.display="none";
    document.getElementById(id4).style.display="flex";
}