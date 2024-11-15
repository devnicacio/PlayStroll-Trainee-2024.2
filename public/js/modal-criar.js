// Função para abrir o modal
function abrirModal() {
    const modal = document.getElementById('modal-criar-usuario');
    modal.style.display = 'flex'; // Modal aparece
}

// Função para fechar o modal
function fecharModal() {
    const modal = document.getElementById('modal-criar-usuario');
    modal.style.display = 'none'; // Modal desaparece
}

// Função para mostrar ou ocultar senha
function toggleSenha(id) {
    const senhaInput = document.getElementById(id);
    const senhaIcon = document.getElementById(`${id}-icon`);

    if (senhaInput.type === "password") {
        senhaInput.type = "text"; 
        senhaIcon.classList.remove("bi-eye-slash");
        senhaIcon.classList.add("bi-eye"); 
    } else {
        senhaInput.type = "password"; 
        senhaIcon.classList.remove("bi-eye");
        senhaIcon.classList.add("bi-eye-slash"); 
    }
}

// Função para adicionar um novo usuário
document.getElementById('btn-adicionar').onclick = function() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmar-senha').value;
    const imgPerfil = document.getElementById('img-perfil').src;

    let valid = true;

    // Limpar mensagens de erro
    document.querySelectorAll('.erro').forEach((erro) => {
        erro.style.display = 'none';
    });

    // Validar nome
    if (!nome) {
        document.getElementById('erro-nome').innerText = 'Nome é obrigatório.';
        document.getElementById('erro-nome').style.display = 'block';
        valid = false;
    }

    // Validar email
    if (!email) {
        document.getElementById('erro-email').innerText = 'Email é obrigatório.';
        document.getElementById('erro-email').style.display = 'block';
        valid = false;
    }

    // Validar senha
    if (!senha) {
        document.getElementById('erro-senha').innerText = 'Senha é obrigatória.';
        document.getElementById('erro-senha').style.display = 'block';
        valid = false;
    }

    // Validar confirmação de senha
    if (senha !== confirmarSenha) {
        document.getElementById('erro-confirmar-senha').innerText = 'As senhas não coincidem.';
        document.getElementById('erro-confirmar-senha').style.display = 'block';
        valid = false;
    }


// Função para mostrar a imagem de perfil escolhida
function mostrarImagem(event) {
    const imgPerfil = document.getElementById('img-perfil');
    const inputFoto = document.getElementById('foto');
    
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
    const imgPerfil = document.getElementById('img-perfil');
    const inputFoto = document.getElementById('foto');

    imgPerfil.src = ''; 
    imgPerfil.style.display = 'none'; 
    inputFoto.value = ''; 
}

// Adiciona evento ao ícone "X" para remover a imagem
document.getElementById('remover-imagem').onclick = removerImagem;

}
