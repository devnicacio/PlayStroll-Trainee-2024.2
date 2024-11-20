


// Função para abrir o modal
function abrirModalCriar() {
    const modal = document.getElementById('modal-criar-usuariocr');
    modal.style.display = 'flex'; // Modal aparece
}

// Função para fechar o modal
function fecharModalCriar() {
    const modal = document.getElementById('modal-criar-usuariocr');
    modal.style.display = 'none'; // Modal desaparece
}

// Função para mostrar ou ocultar a senha e alternar o ícone
function toggleSenha(id) {
    const senhaInput = document.getElementById(id);  // Acessa o campo de senha
    const senhaIcon = document.getElementById(`${id}-iconcr`);  // Acessa o ícone correspondente

    // Verifica o tipo do campo de senha e alterna entre 'password' e 'text'
    if (senhaInput.type === "password") {
        senhaInput.type = "text";  // Muda para 'text' (mostrar senha)
        senhaIcon.classList.remove("bi-eye-slash");  // Remove o ícone de "ocultar"
        senhaIcon.classList.add("bi-eye");  // Adiciona o ícone de "mostrar"
    } else {
        senhaInput.type = "password";  // Muda para 'password' (ocultar senha)
        senhaIcon.classList.remove("bi-eye");  // Remove o ícone de "mostrar"
        senhaIcon.classList.add("bi-eye-slash");  // Adiciona o ícone de "ocultar"
    }
}


// Função para adicionar um novo usuário
document.getElementById('btn-adicionarcr').addEventListener('click', function(event) {
    event.preventDefault();  // Impede o envio do formulário até que a validação seja concluída

    const nome = document.getElementById('nomecr').value;
    const email = document.getElementById('emailcr').value;
    const senha = document.getElementById('senhacr').value;
    const confirmarSenha = document.getElementById('confirmar-senhacr').value;
    const imgPerfil = document.getElementById('img-perfilcr').src;

    let valid = true;

    // Limpar mensagens de erro
    document.querySelectorAll('.errocr').forEach((erro) => {
        erro.style.display = 'none';
    });

    // Validar nome
    if (!nome) {
        document.getElementById('erro-nomecr').innerText = 'Nome é obrigatório.';
        document.getElementById('erro-nomecr').style.display = 'block';
        valid = false;
    }

    // Validar email
    if (!email) {
        document.getElementById('erro-emailcr').innerText = 'Email é obrigatório.';
        document.getElementById('erro-emailcr').style.display = 'block';
        valid = false;
    }

    // Validar senha
    if (!senha) {
        document.getElementById('erro-senhacr').innerText = 'Senha é obrigatória.';
        document.getElementById('erro-senhacr').style.display = 'block';
        valid = false;
    }

    // Validar confirmação de senha
    if (senha !== confirmarSenha) {
        document.getElementById('erro-confirmar-senhacr').innerText = 'As senhas não coincidem.';
        document.getElementById('erro-confirmar-senhacr').style.display = 'block';
        valid = false;
    }

    // Se algum campo não for válido, não permite o envio
    if (!valid) {
        return; // Impede a execução do código de criação do usuário
    }

    // Se a validação passar, o formulário pode ser enviado aqui
    document.querySelector('.modal-createcr').submit(); // Submete o formulário manualmente
});


// Função para mostrar a imagem de perfil escolhida
function mostrarImagem(event) {
    const imgPerfil = document.getElementById('img-perfilcr');
    const inputFoto = document.getElementById('fotocr');
    
    const file = inputFoto.files[0]; // Pega o arquivo da foto
    const reader = new FileReader();
    
    reader.onload = function(e) {
        imgPerfil.src = e.target.result; // Exibe a imagem na tag <img>
        imgPerfil.style.display = 'block'; // Mostra a imagem
    };
    
    if (file) {
        reader.readAsDataURL(file); // Lê o arquivo de imagem como URL
    }
}

// Função para remover a imagem de perfil
function removerImagem() {
    const imgPerfil = document.getElementById('img-perfilcr');
    const inputFoto = document.getElementById('fotocr');

    imgPerfil.src = ''; 
    imgPerfil.style.display = 'none'; 
    inputFoto.value = ''; 
}

// Adiciona evento ao ícone "X" para remover a imagem
document.getElementById('remover-imagemcr').onclick = removerImagem;

// Função para abrir o input de arquivo ao clicar no botão "Escolher Imagem"
document.getElementById('btn-escolher-imagemcr').onclick = function() {
    document.getElementById('fotocr').click(); // Aciona o clique do input de arquivo
};
