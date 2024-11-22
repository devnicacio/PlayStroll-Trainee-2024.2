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

function selectImgEdit(userId){

    const inputImagem = document.getElementById('inputImage${userId}');
    const botaoSelecionar = document.getElementById('btnImage${userId}');
    const previewImg = document.querySelector('.imagem img${userId}');

    botaoSelecionar.addEventListener('click', (e) => {
        e.preventDefault();
        inputImagem.click();
    });

    inputImagem.addEventListener('change', (event) => {
        const arquivo = event.target.files[0];
        if(arquivo) {
            const leitor = new FileReader();

            leitor.onload = () => {
                previewImg.src = leitor.result;
            };

            leitor.readAsDataURL(arquivo);
        }
    });

}

document.querySelectorAll('[data-user-id]').forEach(element => {
    const userId = element.getAttribute('data-user-id');
    selectImgEdit(userId);
})