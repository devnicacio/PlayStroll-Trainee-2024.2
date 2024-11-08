const tela = document.querySelector('#tela');

const abrirModal = idModal => {
    document.getElementById(idModal).style.display = "flex";
    tela.style.display = "block";
    tela.style.opacity = "0.5"
}

const fecharModal = idModal => {
    document.getElementById(idModal).style.display = "none";
    tela.style.display = "none";
}

function previewImage(inputId, imgId, tipo) {
    const input = document.getElementById(inputId);
    const btnRemoverImagemCapa = document.getElementById('btn-remover-imagem-capa');
    const btnRemoverImagemRetrato = document.getElementById('btn-remover-imagem-retrato');
    const imagePreview = document.getElementById(imgId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result; 
            imagePreview.style.display = 'block'; 
            if (tipo === 'capa') {
                btnRemoverImagemCapa.style.display = 'block';
            } else if (tipo === 'retrato') {
                btnRemoverImagemRetrato.style.display = 'block';
            } 
        };
        reader.readAsDataURL(input.files[0]); 
    }
}

// Função para remover a imagem de perfil
function removerImagem(tipo) {
    if (tipo === 'capa') {
        const imgPerfilCapa = document.getElementById('file-name-capa');
        const inputFotoCapa = document.getElementById('file-capa');

        imgPerfilCapa.src = '';
        imgPerfilCapa.style.display = 'none';
        inputFotoCapa.value = '';
    } else if (tipo === 'retrato') {
        const imgPerfilRetrato = document.getElementById('file-name-retrato');
        const inputFotoRetrato = document.getElementById('file-retrato');

        imgPerfilRetrato.src = '';
        imgPerfilRetrato.style.display = 'none';
        inputFotoRetrato.value = '';
    }
} 

function updateFileName() {
    const input = document.getElementById('file');
    const fileName = document.getElementById('file-name');
    fileName.textContent = input.files.length > 0 ? input.files[0].name : 'No file chosen';
}
