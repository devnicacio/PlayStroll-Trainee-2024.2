const tela = document.querySelector('#editarUsuario')

function editar(idModal){
    document.getElementById(idModal).style.display="flex";
    tela.style.display="flex";
}

function editar2(id3){
    document.getElementById(id3).style.display="none";
    tela.style.display="none";
}

function mostrarSenha(){
    var inputPass = document.getElementById('senha');
    var showPass = document.getElementById('mostrar');

    if(inputPass.type==='password'){
        inputPass.setAttribute('type', 'text');
        showPass.classList.replace('bi-eye', 'bi-eye-slash');
    }
    else{
        inputPass.setAttribute('type', 'password');
        showPass.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

function trocarImagem(event){
    const imagemIni = document.getElementById("imagemIni");
    const arquivo = event.target.files[0];

    if(arquivo){
        imagemIni.src = URL.createObjectURL(arquivo);
        document.getElementById("remove").style.display = "flex";
    document.getElementById("imagemIni").style.display = "flex";
    }
}

document.getElementById("inputImage").addEventListener("change", trocarImagem);

function removerImagem(){
    const imagemIni = document.getElementById("imagemIni");
    imagemIni.src = "";
    imagemIni.alt = "Imagem removida";
    document.getElementById("remove").style.display = "none";
    document.getElementById("imagemIni").style.display = "none";

}


