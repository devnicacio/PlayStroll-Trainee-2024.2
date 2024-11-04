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

function previewImage(inputId, imgId) {
    const input = document.getElementById(inputId);
    const imagePreview = document.getElementById(imgId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result; 
            imagePreview.style.display = 'block'; 
            };
        reader.readAsDataURL(input.files[0]); 
    }
}

function updateFileName() {
    const input = document.getElementById('file');
    const fileName = document.getElementById('file-name');
    fileName.textContent = input.files.length > 0 ? input.files[0].name : 'No file chosen';
}
