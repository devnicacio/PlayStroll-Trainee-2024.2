const tela = document.querySelector('#tela')

function editar(idModal, id2){
    document.getElementById(idModal).style.display="flex";
    document.getElementById(id2).style.display="none";
    tela.style.display="block";
}

function editar2(id3, id4){
    document.getElementById(id3).style.display="none";
    document.getElementById(id4).style.display="flex";
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
    const imagemIni = document.getElementById('imagemIni');
    const arquivo = event.target.files[0];

    if(arquivo){
        imagemIni.src = URL.createObjectURL(arquivo);
    }
}

document.getElementById("inputimage").addEventListener("change", trocarImagem);

function removerImagem(id5, id6, id7, outroID){
    const imagem = document.getElementById("imagemIni");
    imagem.src="";
    document.getElementById(id5).style.display = "none";
    document.getElementById(id6).style.display = "none";
    document.getElementById(id7).style.display = "flex";
    document.getElementById(outroID).style.transform = "translateY(-40px)";
}

function adicionaImagem(id8, id9){
    document.getElementById(id8).style.display = "flex";
    document.getElementById(id9).style.display = "flex";
}
