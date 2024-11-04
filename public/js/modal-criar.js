// Função para abrir o modal
function abrirModal() {
    document.getElementById('modal-criar-usuario').style.display = 'flex';
  }
  
  // Função para fechar o modal
  function fecharModal() {
    document.getElementById('modal-criar-usuario').style.display = 'none';
  }
  
  // Função para mostrar a imagem de perfil selecionada
  function mostrarImagem(event) {
    const imgPerfil = document.getElementById('img-perfil');
    const btnRemoverImagem = document.getElementById('btn-remover-imagem');
    const file = event.target.files[0];
  
    if (file && (file.type === 'image/png' || file.type === 'image/jpeg')) {
        const reader = new FileReader();
  
        reader.onload = function(e) {
            imgPerfil.src = e.target.result;
            imgPerfil.style.display = 'block'; 
            btnRemoverImagem.style.display = 'block'; 
        };
  
        reader.readAsDataURL(file);
    } else {
        alert('Por favor, selecione uma imagem PNG ou JPG.');
        imgPerfil.style.display = 'none'; 
        btnRemoverImagem.style.display = 'none'; 
    }
  }
  
  // Função para adicionar um novo usuário
  document.getElementById('btn-adicionar').onclick = function() {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmar-senha').value;
    const imgPerfil = document.getElementById('img-perfil').src;
  
    if (nome && email && senha && (senha === confirmarSenha)) {
        const tbody = document.getElementById('usuarios-tbody');
        const newRow = tbody.insertRow();
  
        // Verifica se uma imagem de perfil foi fornecida
        const imgHtml = imgPerfil ? 
            `<img src="${imgPerfil}" class="imagem-perfil" alt="Imagem de Perfil" />` : 
            `<div class="texto-placeholder">Imagem de perfil (somente PNG ou JPG)</div>`;
  
        newRow.innerHTML = `
            <td>${tbody.rows.length}</td>
            <td>${nome}</td>
            <td>${email}</td>
            <td>${imgHtml}</td>
        `;
  
        // Limpa os campos após adicionar
        document.getElementById('nome').value = '';
        document.getElementById('email').value = '';
        document.getElementById('senha').value = '';
        document.getElementById('confirmar-senha').value = '';
        document.getElementById('foto').value = '';
        document.getElementById('img-perfil').src = '';
        document.getElementById('btn-remover-imagem').style.display = 'none'; 
        document.getElementById('img-perfil').style.display = 'none'; 
        document.getElementById('modal-criar-usuario').style.display = 'none';
    } else {
        if (senha !== confirmarSenha) {
            alert('As senhas não são iguais. Por favor, tente novamente.');
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    }
  };
  
  // Função para remover a imagem de perfil
  function removerImagem() {
    const imgPerfil = document.getElementById('img-perfil');
    const btnRemoverImagem = document.getElementById('btn-remover-imagem');
    const inputFoto = document.getElementById('foto');
  
    imgPerfil.src = ''; 
    imgPerfil.style.display = 'none'; 
    btnRemoverImagem.style.display = 'none'; 
    inputFoto.value = ''; 
  }
  
  // Adiciona evento ao botão "Remover Imagem"
  document.getElementById('btn-remover-imagem').onclick = removerImagem;
  
  
  // Adiciona função para mostrar ou ocultar senha
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
  
  