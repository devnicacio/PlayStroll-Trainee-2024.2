
function abrirModalView(idModal)
{
    document.getElementById(idModal).style.display="flex";
    const imagem = document.getElementById('img');
    const imagemDiv = document.getElementById('imgdiv');

    if(imagem.src.trim()){
        imagemDiv.style.display = 'flex';
    }
    else{
        imagemDiv.style.display = 'none';
    }
}

function fecharModalView(id3)
{
    document.getElementById(id3).style.display="none";
}