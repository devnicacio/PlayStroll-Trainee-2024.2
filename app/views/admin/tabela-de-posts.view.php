<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Posts</title>
    
    <!-- Favicon -->
    
    <!-- Third-party CSS -->
    <!-- SummerNote -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Personal CSS-->
    <link rel="stylesheet" href="/public/css/tabela-de-posts.css">
	<link rel="stylesheet" type="text/css" href="/public/css/criar.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/excluir.css" />

    <!-- Third-party JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.0/lang/summernote-pt-BR.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <!-- Personal JS -->
    <script defer src="/public/js/modals.js"></script>
    <script defer src="/public/js/criar.js"></script>
   
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
            <h1 class="table-title">Tabela de Posts</h1>
            <button class="more" onclick="abrirModal('criar-post')">+</button>
        </div>
        <!-- Modal Criar -->
        <?php
            require_once("modais/posts/create_modal_posts.php");
        ?>
        <div class="table-container">
        <table class="tabela-posts">
            <thead>
                <tr class="informacoes">
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
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post->id ?></td>
                    <td class="titulo-post"><?= $post->title ?></td>
                    <td class="autor-post"> Diego Pereira Betti </td>
                    <!-- ?= $post->id ?> -->
                    <td><?= $post->create_at ?></td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModal('modalPostVisualizar')"><i class="fa-regular fa-eye"></i></button></td>
                    <td><button class="btn-acao btn-editar" onclick="abrirModal('modalPostEditar')"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn-acao btn-excluir" onclick="abrirModal('excluir<?= $post->id ?>')"><i class="fas fa-trash"></i></button></td>
                </tr>
                <!-- Modais de leitura, alteração e exclusão--> 
                <div class="modal-excluir" id="excluir<?= $post->id ?>">
                    <form action="/deletar-post" method="post" >
                        <input type="hidden" name="iddelete_post" value="<?= $post->id ?>">
                        <input type="hidden" name="iddelete_capa" value="<?= $post->image_capa ?>">
                        <input type="hidden" name="iddelete_retrato" value="<?= $post->image_retrato ?>">
                            <div class="modal-container-excluir">
                                <img
                                src="/public/assets/deletar2.png"
                                alt=""
                                height="100px"
                                width="150px"
                                />
                                <h4>Tem certeza que deseja excluir o post?</h4>
                                <div class="modal-buttons-excluir">
                                <button class="button-cancelar" type="button" onclick="fecharModal('excluir<?= $post->id ?>')">
                                    Cancelar
                                </button>
                                <button class="button-excluir" type="submit">Excluir</button>
                                </div>
                            </div>
                    </form>
                </div>
                <?php
                    require_once realpath(dirname(__FILE__)."/modais/posts/read_modal_posts.php");
                    require_once realpath(dirname(__FILE__)."/modais/posts/update_modal_posts.php");
                ?>
                
                <?php endforeach?>
            </tbody>
            <div class="tela" id="tela"></div>
        </table>
            
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
    </main>
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
    $("#summernote").summernote({
        placeholder: "Crie a sua descrição",
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
        callbacks: {
        onChange: function(contents) {
            $('#content').val(contents);
        }
    }
    });
</script>
</html>