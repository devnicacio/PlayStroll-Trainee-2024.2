<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: /login');
    }
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/public/css/dashboard.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <div class="Dashboard">
            <div class="buttons">
                <div class="botoes">
                    <div class="button square">
                        <div class="posts">
                            <div class="quadrado">
                                <i class="bi bi-triangle"></i>
                            </div>
                            <div class="poststxt">POSTS</div>
                        </div>
                    </div>
                    <div class="button square">
                        <div class="posts">
                            <div class="quadrado">
                                <i class="bi bi-square"></i>
                            </div>
                            <div class="poststxt">USUÁRIOS</div>
                        </div>
                    </div>
                </div>
                <div class="botoes">
                    <div class="button square">
                        <div class="posts">
                            <div class="quadrado">
                                <i class="bi bi-circle"></i>
                            </div>
                            <div class="poststxt">INÍCIO</div>
                        </div>
                    </div>
                    <!-- Botão "Sair" com formulário -->
                    <form action="/logout" method="POST" class="button square">
                        <button type="submit" class="posts">
                            <div class="quadrado">
                                <i class="bi bi-x-lg"></i>
                            </div>
                            <div class="poststxt">SAIR</div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="imagem">
                <img src="/app/views/admin/arquivos/Logo_escura_sem_fundo.png" alt="Logo">
            </div>
        </div>
    </div>
</body>
</html>
