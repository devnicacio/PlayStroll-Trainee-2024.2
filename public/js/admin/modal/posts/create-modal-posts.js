const tela = document.querySelector('#tela');

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
            
        };
        reader.readAsDataURL(input.files[0]); 
    }
}

// Função para remover a imagem de perfil
function removerImagem(tipo) {
    if (tipo === 'capa') {
        const imgPerfilCapa = document.getElementById('file-name-capa');
        const inputFotoCapa = document.getElementById('file-capa');
        const btnRemoverImagemCapa = document.getElementById('btn-remover-imagem-capa');

        btnRemoverImagemCapa.style.display = 'none';
        imgPerfilCapa.src = '';
        imgPerfilCapa.style.display = 'none';
        inputFotoCapa.value = '';
    } else if (tipo === 'retrato') {
        const imgPerfilRetrato = document.getElementById('file-name-retrato');
        const inputFotoRetrato = document.getElementById('file-retrato');
        const btnRemoverImagemRetrato = document.getElementById('btn-remover-imagem-retrato');

        imgPerfilRetrato.src = '';
        imgPerfilRetrato.style.display = 'none';
        inputFotoRetrato.value = '';
        btnRemoverImagemRetrato.style.display = 'none';
    }
}

function removerImagemEdit(tipo) {
    if (tipo === 'capa') {
        const imgPerfilCapaEdit = document.getElementById('edit-name-capa');
        const inputFotoCapaEdit = document.getElementById('edit-capa');
        const btnRemoverImagemCapaEdit = document.getElementById('btn-remover-imagem-capa-edit');

        btnRemoverImagemCapaEdit.style.display = 'none';
        imgPerfilCapaEdit.src = '';
        imgPerfilCapaEdit.style.display = 'none';
        inputFotoCapaEdit.value = '';
    } else if (tipo === 'retrato') {
        const imgPerfilRetratoEdit = document.getElementById('edit-name-retrato');
        const inputFotoRetratoEdit = document.getElementById('edit-retrato');
        const btnRemoverImagemRetratoEdit = document.getElementById('btn-remover-imagem-retrato-edit');

        imgPerfilRetratoEdit.src = '';
        imgPerfilRetratoEdit.style.display = 'none';
        inputFotoRetratoEdit.value = '';
        btnRemoverImagemRetratoEdit.style.display = 'none';
    }
}

function updateFileName() {
    const input = document.getElementById('file');
    const fileName = document.getElementById('file-name');
    fileName.textContent = input.files.length > 0 ? input.files[0].name : 'No file chosen';
}

// Adiciona um novo post
document.getElementById('btn-criar').onclick = function(event) {
     event.preventDefault();

     const capa = document.getElementById('file-capa').value;
     const retrato = document.getElementById('file-retrato').value;
     const data = document.getElementById('data').value;
     const titulo = document.getElementById('titulo').value;
     const avaliacao = document.getElementById('avaliacao').value;
     const descricao = $('#summernote-criar').summernote('code'); 

     let valid = true;

     // Limpar mensagens de erro anteriores
     document.getElementById('erro-capa').innerText = '';
     document.getElementById('erro-retrato').innerText = '';
     document.getElementById('erro-data').innerText = '';
     document.getElementById('erro-titulo').innerText = '';
     document.getElementById('erro-avaliacao').innerText = '';
     document.getElementById('erro-descricao').innerText = '';

     if (!capa) {
        document.getElementById('erro-capa').innerText = 'Imagem capa é obrigatório';
        valid = false;
    }

    if (!retrato) {
        document.getElementById('erro-retrato').innerText = 'Imagem retrato é obrigatório';
        valid = false;
    }
    
    if (!data) {
         document.getElementById('erro-data').innerText = 'Data é obrigatória';
         valid = false;
     }
       
    if (!titulo) {
         document.getElementById('erro-titulo').innerText = 'Título é obrigatório';
         valid = false;
     }

    if (!avaliacao) {
         document.getElementById('erro-avaliacao').innerText = 'Avaliação é obrigatória';
         valid = false;
     }

    // Verifica se a descrição está vazia 
     if (!descricao || descricao === '<p><br></p>') {
        document.getElementById('erro-descricao').innerText = 'Descrição é obrigatória';
         valid = false;
     }

     if (valid) {
        document.querySelector('form').submit();
    }
 };

// Remove os erros quando os componentes são preenchidos
const inputs = [
    { field: 'file-capa', error: 'erro-capa' },
    { field: 'file-retrato', error: 'erro-retrato' },
    { field: 'data', error: 'erro-data' },
    { field: 'titulo', error: 'erro-titulo' },
    { field: 'avaliacao', error: 'erro-avaliacao' }
];

inputs.forEach(input => {
    const field = document.getElementById(input.field);
    field.addEventListener('input', function () {
        if (field.value.trim()) {
            document.getElementById(input.error).innerText = '';
        }
    });
});

$('#summernote-criar').on('summernote.change', function() {
    const descricao = $('#summernote-criar').summernote('code');
    if (descricao && descricao.trim() !== '' && descricao !== '<p><br></p>') {
        document.getElementById('erro-descricao').innerText = '';
    }
});