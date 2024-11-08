<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Posts</title>
    
    <!-- Favicon -->
    
    <!-- Third-party CSS -->
    <!-- SummerNote -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Personal CSS-->
    <link rel="stylesheet" href="/public/css/tabela-de-posts.css">

    <!-- JS -->
    <script defer src="/public/js/modals.js"></script>
   
</head>
<body>
    <!-- Padronização dos seletores de CSS feita pelo Vítor:
    Classe: serão usadas, se forem reutilizadas em outros lugares obrigatoriamente. 
    Usarei, quando quero padronizar algo;
    id: serão usadas em elementos únicos.
    Ademais, usei a metodologia BEM(Block, Element, Modifier). Os elementos são identificados com --, e
    os modificadores por __.
    -->
    <main class="container">
        <div class="cabecalho">
                <h1 class="titulo">Tabela de Posts</h1>
            <button class="more">+</button>
        </div>
        <div class="table-container">
        <table class="tabela-posts">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Data</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td class="titulo-post">Exemplo de Post 1</td>
                    <td class="autor-post">Nome</td>
                    <td>25/10/2024</td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModal('modalPostVisualizar')"><i class="fa-regular fa-eye"></i></button></td>
                    <td><button class="btn-acao btn-editar" onclick="abrirModal('modalPostEditar')"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn-acao btn-excluir"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="titulo-post">Exemplo de Post 2</td>
                    <td class="autor-post">Nome</td>
                    <td>26/10/2024</td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModal('modalPostVisualizar')"><i class="fa-regular fa-eye"></i></button></td>
                    <td><button class="btn-acao btn-editar" onclick="abrirModal('modalPostEditar')"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn-acao btn-excluir"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td class="titulo-post">Exemplo de Post 3</td>
                    <td class="autor-post">Nome</td>
                    <td>27/10/2024</td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModal('modalPostVisualizar')"><i class="fa-regular fa-eye"></i></button></td>
                    <td><button class="btn-acao btn-editar" onclick="abrirModal('modalPostEditar')"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn-acao btn-excluir"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="titulo-post">Exemplo de Post 4</td>
                    <td class="autor-post">Nome</td>
                    <td>28/10/2024</td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModal('modalPostVisualizar')"><i class="fa-regular fa-eye"></i></button></td>
                    <td><button class="btn-acao btn-editar" onclick="abrirModal('modalPostEditar')"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn-acao btn-excluir"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td class="titulo-post">Exemplo de Post 5</td>
                    <td class="autor-post">Nome</td>
                    <td>29/10/2024</td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModal('modalPostVisualizar')"><i class="fa-regular fa-eye"></i></button></td>
                    <td><button class="btn-acao btn-editar" onclick="abrirModal('modalPostEditar')"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn-acao btn-excluir"><i class="fas fa-trash"></i></button></td>
                </tr>
            </tbody>
        </table>
        <!-- Modais -->
        <?php 
            require_once "read-modal-posts.php";
            require_once "update-modal-posts.php";
        ?>
        <div class="tela"></div>
        <!-- Paginação -->
        <div class="navegacao">
            <button class="nav1">&lt;</button>
            <button class="nav2">1</button>
            <button class="nav3">2</button>
            <button class="nav4">3</button>
            <button class="nav5">4</button>
            <button class="nav6">5</button>
            <button class="nav7">&gt;</button>
        </div>
    </div>
</body>
    <script>
        $(".summernote").summernote('disable',{
			tabsize: 2,
			height: 120,
			lang: "pt-BR",
			toolbar: [
				["style", ["style"]],
				["font", ["bold", "underline"]],
				["color", ["color"]],
				["para", ["ul", "ol", "paragraph"]],
				["table", ["table"]],
				["insert", ["link", "picture"]],
			],
		});
    </script>
</html>
