const tela = document.querySelector('#tela');

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


// Função para remover a imagem de perfil
function removerImagem(tipo, tipoImage, id = null) {
    let imgPerfil, inputFoto, btnRemoverImagemCapa, btnRemoverImagemRetrato;

    if (id) {
        // Modal de edição (IDs dinâmicos)
        imgPerfil = document.getElementById(`${tipo}-file-name-${tipoImage}${id}`);
        inputFoto = document.getElementById(`${tipo}-file-${tipoImage}${id}`);
        btnRemoverImagem = document.getElementById(`btn-remover-imagem-${tipoImage}${id}`);
    } else {
        // Modal de criação (IDs fixos)
        imgPerfil = document.getElementById(`${tipo}-file-name-${tipoImage}`);
        inputFoto = document.getElementById(`${tipo}-file-${tipoImage}`);
        btnRemoverImagem = document.getElementById(`btn-remover-imagem-${tipoImage}`);
    }

    // Limpa os campos
    if (btnRemoverImagem) btnRemoverImagem.style.display = 'none';
    if (imgPerfil) {
        imgPerfil.src = '';
        imgPerfil.style.display = 'none';
    }
    if (inputFoto) inputFoto.value = '';
}



function updateFileName() {
    const input = document.getElementById('file');
    const fileName = document.getElementById('file-name');
    fileName.textContent = input.files.length > 0 ? input.files[0].name : 'No file chosen';
}

// Adiciona um novo post
document.getElementById('btn-criar').onclick = function(event) {
     event.preventDefault();

     const capa = document.getElementById('create-file-capa').value;
     const retrato = document.getElementById('create-file-retrato').value;
     const titulo = document.getElementById('titulo').value;
     const avaliacao = document.getElementById('avaliacao').value;
     const descricao = $('#summernote-criar').summernote('code'); 

     let valid = true;

     // Limpar mensagens de erro anteriores
     document.getElementById('erro-capa').innerText = '';
     document.getElementById('erro-retrato').innerText = '';
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
        document.getElementById('criarForm').submit();
    }
 };

// Remove os erros quando os componentes são preenchidos
const inputs = [
    { field: 'create-file-capa', error: 'erro-capa' },
    { field: 'create-file-retrato', error: 'erro-retrato' },
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