document.getElementById('btn-adicionar').onclick = function() {
    // Pegando os valores dos campos
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmar-senha').value;

    // Validando os campos
    let valid = true;

    // Limpar as mensagens de erro
    document.querySelectorAll('.erro').forEach((erro) => {
        erro.style.display = 'none'; // Ocultar mensagens de erro anteriores
    });

    // Validação dos campos
    if (!nome) {
        document.getElementById('erro-nome').innerText = 'Nome é obrigatório.';
        document.getElementById('erro-nome').style.display = 'block';
        valid = false;
    }

    if (!email) {
        document.getElementById('erro-email').innerText = 'Email é obrigatório.';
        document.getElementById('erro-email').style.display = 'block';
        valid = false;
    }

    if (!senha) {
        document.getElementById('erro-senha').innerText = 'Senha é obrigatória.';
        document.getElementById('erro-senha').style.display = 'block';
        valid = false;
    }

    if (senha !== confirmarSenha) {
        document.getElementById('erro-confirmar-senha').innerText = 'As senhas não coincidem.';
        document.getElementById('erro-confirmar-senha').style.display = 'block';
        valid = false;
    }

    // Se todos os campos forem válidos
    if (valid) {
        // Limpar os campos após a validação
        document.getElementById('nome').value = '';
        document.getElementById('email').value = '';
        document.getElementById('senha').value = '';
        document.getElementById('confirmar-senha').value = '';

        // Criar a nova linha para a tabela
        const tabela = document.querySelector('.lista tbody');
        const novaLinha = document.createElement('tr');
        
        // Preencher os dados na nova linha
        novaLinha.innerHTML = `
            <td>${tabela.rows.length + 1}</td> <!-- ID (baseado no número de linhas existentes) -->
            <td class="autor-post">${nome}</td>
            <td class="email-post">${email}</td>
            <td><button class="verificar"><i class="bi bi-eye"></i></button></td>
            <td><button class="editar"><i class="bi bi-pencil-square"></i></button></td>
            <td><button class="excluir"><i class="fas fa-trash"></i></button></td>
        `;
        
        // Adiciona a nova linha na tabela
        tabela.appendChild(novaLinha);

        // Verificando se a linha foi adicionada
        console.log('Usuário adicionado:', nome, email);

        // Fechar o modal após adicionar
        fecharModal();
    }
};

function fecharModal() {
    document.getElementById('modal-criar-usuario').style.display = 'none';
}
