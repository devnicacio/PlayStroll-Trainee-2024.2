    // Função para abrir o modal de edição
    const tela = document.querySelector('#editarUsuario');

    function editar(idModal) {
        document.getElementById(idModal).style.display = "flex";
        tela.style.display = "flex";
        document.querySelectorAll('span').forEach((spanErro) => {
            spanErro.style.display = 'none';
        });
    }

    function editar2(id3) {
        document.getElementById(id3).style.display = "none";
        tela.style.display = "none";
        document.querySelectorAll('.erroEdit').style.display = 'none';
    }

    function mostrarSenha() {
        var inputPass = document.getElementById('senha');
        var showPass = document.getElementById('mostrar');

        if (inputPass.type === 'password') {
            inputPass.setAttribute('type', 'text');
            showPass.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            inputPass.setAttribute('type', 'password');
            showPass.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }

    // Adicionar comportamentos personalizados para cada modal de edição
    document.querySelectorAll('[data-user-id]').forEach((element) => {
        const userId = element.getAttribute('data-user-id');
        const inputImagem = document.getElementById(`inputImage${userId}`);
        const previewImg = document.getElementById(`imgEdit${userId}`);
        const btnCancelar = element.querySelector('.botn'); // Botão de cancelar
        const form = element.querySelector('form'); // Formulário do modal

        // Armazena os valores originais ao abrir o modal
        let originalValues = {
            name: form.name.value,
            email: form.email.value,
            password: form.password.value,
            image: previewImg.src,
        };

        // Função para restaurar os valores originais
        btnCancelar.addEventListener('click', (e) => {
            e.preventDefault();
            form.name.value = originalValues.name;
            form.email.value = originalValues.email;
            form.password.value = originalValues.password;
            previewImg.src = originalValues.image;
            document.getElementById(`editarUsuario${userId}`).style.display = 'none';
        });

        // Atualiza a pré-visualização da imagem ao selecionar uma nova
        inputImagem.addEventListener('change', (event) => {
            const arquivo = event.target.files[0];
            if (arquivo) {
                const leitor = new FileReader();
                leitor.onload = () => {
                    previewImg.src = leitor.result;
                };
                leitor.readAsDataURL(arquivo);
            }
        });
    });

    

function errorChecker(idErrorName, idErrorEmail, idErrorSenha, idFormEdit, idInputName, idInputMail, idInputSenha){
    event.preventDefault();

    const name = document.getElementById(idInputName).value;
    const email = document.getElementById(idInputMail).value;
    const senha = document.getElementById(idInputSenha).value;

    let valid = true;

    if(!name){
        document.getElementById(idErrorName).display = 'block';
        document.getElementById(idErrorName).innerText = 'Nome É Obrigatório.';
        valid = false;
    }

    if(!email){
        document.getElementById(idErrorEmail).display = 'block';
        document.getElementById(idErrorEmail).innerText = 'Email É Obrigatório.';
        valid = false;
    }

    if(!senha){
        document.getElementById(idErrorSenha).display = 'block';
        document.getElementById(idErrorSenha).innerText = 'Senha É Obrigatória';
        valid = false;
    }

    if(!valid) return;

    document.getElementById(idFormEdit).submit();
}
