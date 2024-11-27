// Função para mostrar/ocultar a senha
function toggleSenha(id) {
    const senhaInput = document.getElementById(id);
    const senhaIcon = document.getElementById(id + '-icon');

    if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        senhaIcon.classList.remove('bi-eye-slash');
        senhaIcon.classList.add('bi-eye');
    } else {
        senhaInput.type = 'password';
        senhaIcon.classList.remove('bi-eye');
        senhaIcon.classList.add('bi-eye-slash');
    }
}

// Função para mostrar a imagem no modal
function mostrarImagem(event) {
    const imagem = document.getElementById('img-perfil');
    const fotoPerfil = document.getElementById('foto');
    const removerImagem = document.getElementById('remover-imagem');
    
    if (event.target.files && event.target.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            imagem.src = e.target.result;
            imagem.style.display = 'block';
            removerImagem.style.display = 'inline-block';
        };
        
        reader.readAsDataURL(event.target.files[0]);
    }
}

// Função para fechar o modal
function fecharModal() {
    document.getElementById('modal-criar-usuario').style.display = 'none';
}

// Função para abrir o modal
function abrirModal() {
    document.getElementById('modal-criar-usuario').style.display = 'block';
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

    // Se a validação for bem-sucedida
    if (valid) {
        // Limpa os campos após adicionar
        document.getElementById('nome').value = '';
        document.getElementById('email').value = '';
        document.getElementById('senha').value = '';
        document.getElementById('confirmar-senha').value = '';
        document.getElementById('foto').value = '';
        document.getElementById('img-perfil').src = '';
        document.getElementById('img-perfil').style.display = 'none'; 
        
        // Cria a nova linha na tabela
        const tabela = document.querySelector('.lista tbody');
        const novaLinha = document.createElement('tr');
        
        // Preenche os dados do novo usuário
        novaLinha.innerHTML = `
            <td>${tabela.rows.length + 1}</td> <!-- ID -->
            <td class="autor-post">${nome}</td>
            <td class="email-post">${email}</td>
            <td><button class="verificar"><i class="bi bi-eye"></i></button></td>
            <td><button class="editar"><i class="bi bi-pencil-square"></i></button></td>
            <td><button class="excluir"><i class="fas fa-trash"></i></button></td>
        `;
        
        // Adiciona a nova linha à tabela
        tabela.appendChild(novaLinha);
        
        // Fecha o modal após adicionar o usuário
        fecharModal(); 
    }
};

// Função para excluir um usuário
document.querySelector('.table-container').addEventListener('click', function(event) {
    if (event.target.classList.contains('excluir')) {
        const linha = event.target.closest('tr');
        linha.remove();
    }
});
