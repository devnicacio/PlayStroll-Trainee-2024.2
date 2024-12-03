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
    <link rel="stylesheet" type="text/css" href="/public/css/admin/tabela-de-posts.css">

    <!-- Third-party JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.0/lang/summernote-pt-BR.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <!-- Personal JS -->
    <script defer src="/public/js/admin/modal/base-modal.js"></script>
    <script defer scr="/public/js/admin/modal/posts/read-modal-posts.js"></script>
    <script defer src="/public/js/admin/modal/posts/create-modal-posts.js"></script>
   
</head>
<body>
    <!-- Padronização dos seletores de CSS feita pelo Vítor:
    Classe: serão usadas, se forem reutilizadas em outros lugares obrigatoriamente. 
    Usarei, quando quero padronizar algo;
    id: serão usadas em elementos únicos.
    Ademais, usei a metodologia BEM(Block, Element, Modifier). Os elementos são identificados com --, e
    os modificadores por __.
    -->
    <?php
        require_once realpath(dirname(__FILE__)."sidebar.php");
    ?>
    <main class="container">
        <div class="cabecalho">
            <h1 class="table-title">Tabela de Posts</h1>
            <button class="more" onclick="abrirModal('criar-post')">+</button>
        </div>
        <!-- Modal Criar -->
        <?php
            require_once realpath(dirname(__FILE__)."/modal/posts/create-modal-posts.php");
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
                    <td><?= $post->create_at ?></td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModal('read<?= $post->id?>')"><i class="fa-regular fa-eye"></i></button></td>
                    <td><button class="btn-acao btn-editar" onclick="abrirModal('update<?= $post->id?>')"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn-acao btn-excluir" onclick="abrirModal('excluir<?= $post->id ?>')"><i class="fas fa-trash"></i></button></td>
                </tr>
                <!-- Modais de leitura, alteração e exclusão--> 
                <?php
                    require_once realpath(dirname(__FILE__) ."/modal/posts/delete-modal-posts.php");
                    require_once realpath(dirname(__FILE__)."/modal/posts/read-modal-posts.php");
                    require_once realpath(dirname(__FILE__)."/modal/posts/update-modal-posts.php");
                ?>
                <script>/*
                    $("#summernote-update-<?= $post->id?>").summernote({
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
                            onInit: function() {
                                $('.note-editable').css('resize', 'none');
                            },
                            onChange: function(contents) {
                                $('#content').val(contents);
                            }
                        }
                    });*/
                </script>
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
    $("#summernote-criar").summernote({
        placeholder: "Crie a sua descrição",
        height: 300,
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
            onInit: function() {
                $('.note-editable').css('resize', 'none');
            },
            onChange: function(contents) {
                $('#content').val(contents);
            }
        }
    });
</script>
</html>
