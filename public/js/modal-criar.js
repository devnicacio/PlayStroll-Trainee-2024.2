// Função para abrir o modal
function abrirModalCriar() {
    const modal = document.getElementById('modal-criar-usuariocr');
    modal.style.display = 'flex'; // Modal aparece
}

// Função para fechar o modal
function fecharModalCriar() {
    const modal = document.getElementById('modal-criar-usuariocr');
    modal.style.display = 'none'; // Modal desaparece
    limparModalCriar();
}

// Função para mostrar ou ocultar a senha e a confirmação da senha, alternando os ícones
function toggleSenha() {
    var inputPass = document.getElementById('senhacr');
    var confirmarSenha = document.getElementById('confirmar-senhacr');
    var showPass = document.getElementById('senha-iconcr');
    var showConfirmarSenha = document.getElementById('confirmar-senha-iconcr');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        confirmarSenha.setAttribute('type', 'text');
        showPass.classList.replace('bi-eye', 'bi-eye-slash');
        showConfirmarSenha.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        inputPass.setAttribute('type', 'password');
        confirmarSenha.setAttribute('type', 'password');
        showPass.classList.replace('bi-eye-slash', 'bi-eye');
        showConfirmarSenha.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

// Função para adicionar um novo usuário
document.getElementById('btn-adicionarcr').addEventListener('click', function(event) {
    event.preventDefault();

    const nome = document.getElementById('nomecr').value;
    const email = document.getElementById('emailcr').value;
    const senha = document.getElementById('senhacr').value;
    const confirmarSenha = document.getElementById('confirmar-senhacr').value;
    const inputFoto = document.getElementById('fotocr').files[0];
    let valid = true;

    document.querySelectorAll('.errocr').forEach((erro) => {
        erro.style.display = 'none';
    });

    // Validação do nome - máximo de 30 caracteres
    if (!nome) {
        document.getElementById('erro-nomecr').innerText = 'Nome é obrigatório.';
        document.getElementById('erro-nomecr').style.display = 'block';
        valid = false;
    } else if (nome.length > 30) {
        document.getElementById('erro-nomecr').innerText = 'Nome não pode ter mais de 30 caracteres.';
        document.getElementById('erro-nomecr').style.display = 'block';
        valid = false;
    }

    // Validação do email
    if (!email) {
        document.getElementById('erro-emailcr').innerText = 'Email é obrigatório.';
        document.getElementById('erro-emailcr').style.display = 'block';
        valid = false;
    }

    // Validação da senha
    if (!senha) {
        document.getElementById('erro-senhacr').innerText = 'Senha é obrigatória.';
        document.getElementById('erro-senhacr').style.display = 'block';
        valid = false;
    }

    // Validação de confirmação de senha
    if (senha !== confirmarSenha) {
        document.getElementById('erro-confirmar-senhacr').innerText = 'As senhas não coincidem.';
        document.getElementById('erro-confirmar-senhacr').style.display = 'block';
        valid = false;
    }

    // Validação da foto
    if (!inputFoto) {
        document.getElementById('erro-imagemcr').innerText = 'A imagem de perfil é obrigatória.';
        document.getElementById('erro-imagemcr').style.display = 'block';
        valid = false;
    }

    if (!valid) return;
    document.querySelector('.modal-createcr').submit();
});

// Função para mostrar a imagem de perfil escolhida
function mostrarImagem(event) {
    const imgPerfil = document.getElementById('img-perfilcr');
    const inputFoto = document.getElementById('fotocr');
    const file = inputFoto.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        imgPerfil.src = e.target.result;
        imgPerfil.style.display = 'block';
    };

    if (file) reader.readAsDataURL(file);
}

// Função para remover a imagem de perfil
function removerImagem() {
    const imgPerfil = document.getElementById('img-perfilcr');
    const inputFoto = document.getElementById('fotocr');

    imgPerfil.src = '';
    imgPerfil.style.display = 'none';
    inputFoto.value = '';
}

document.getElementById('remover-imagemcr').onclick = removerImagem;

document.getElementById('btn-escolher-imagemcr').onclick = function () {
    document.getElementById('fotocr').click();
};

// Remover mensagem de erro ao digitar nos campos
document.getElementById('nomecr').addEventListener('input', () => {
    document.getElementById('erro-nomecr').style.display = 'none';
});

document.getElementById('emailcr').addEventListener('input', () => {
    document.getElementById('erro-emailcr').style.display = 'none';
});

document.getElementById('senhacr').addEventListener('input', () => {
    document.getElementById('erro-senhacr').style.display = 'none';
    document.getElementById('erro-confirmar-senhacr').style.display = 'none';
});

document.getElementById('confirmar-senhacr').addEventListener('input', () => {
    document.getElementById('erro-confirmar-senhacr').style.display = 'none';
});

document.getElementById('fotocr').addEventListener('change', () => {
    document.getElementById('erro-imagemcr').style.display = 'none';
});

function limparModalCriar() {
    document.getElementById('nomecr').value = '';
    document.getElementById('emailcr').value = '';
    document.getElementById('senhacr').value = '';
    document.getElementById('confirmar-senhacr').value = '';
    removerImagem(); // Remove a imagem de perfil escolhida
    document.querySelectorAll('.errocr').forEach((erro) => {
        erro.style.display = 'none'; // Oculta mensagens de erro
    });
}
