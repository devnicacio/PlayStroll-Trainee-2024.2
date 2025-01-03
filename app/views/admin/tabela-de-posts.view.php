<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: /login');
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Posts</title>
    
    <!-- Favicon -->
    
    <!-- Third-party CSS -->
    <!-- SummerNote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Personal CSS-->
    <link rel="stylesheet" type="text/css" href="/public/css/admin/tabela-de-posts.css">

    <!-- Third-party JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-pt-BR.min.js"></script>
    <!-- Personal JS -->
    <script defer src="/public/js/admin/modal/base-modal.js"></script>
    <script defer scr="/public/js/admin/modal/posts/read-modal-posts.js"></script>
    <script defer src="/public/js/admin/modal/posts/create-modal-posts.js"></script>
    <script defer src="/public/js/admin/modal/posts/update-modal-posts.js"></script>
    <link rel="icon" href="/public/assets/Logo escura quadrada.png" type="image/png">
   
</head>
<body>
    <?php include 'sidebar.view.php'; ?>

    <main class="container">
        <div class="cabecalho">
            <h1 class="table-title">Tabela de Posts</h1>
            <button class="more" onclick="abrirModal('criar-post')">+</button>
        </div>
        <div class="modal-criar" id="criar-post">
            <form action="/criar-post" id="criarForm" method="post" enctype="multipart/form-data">
                <div class="modal-container">
                    <div class="imagens">
                        <div class="capa">
                            <div class="container-image">
                                <label for="file">Foto modo paisagem</label>
                                <label class="custom-file-label" for="create-file-capa">Escolha uma imagem</label>
                                <span id="erro-capa" class="erro-img"></span>
                            </div>
                            <div class="parte-capa">
                                <img id="create-file-name-capa" class="capaCreate-preview" alt="Preview da Capa" />
                                <input type="file" class="image-capa" id="create-file-capa" accept=".jpg, .jpeg, .png" name="image_capa"
                                onchange="previewImage('create-file-capa', 'create-file-name-capa')" />
                                <button class="btn-remove-imagem-capa" id="btn-remover-imagem-capa" onclick="removerImagem('create', 'capa')" type="button">X</button>
                            </div>
                        </div>
                        <div class="retrato">
                            <div class="container-image">
                                <label for="file">Foto modo retrato</label>
                                <label class="custom-file-label" for="create-file-retrato">Escolha uma imagem</label>
                                <span id="erro-retrato" class="erro-img"></span>
                            </div>
                            <div class="parte-retrato">
                                <img id="create-file-name-retrato" class="retratoCreate-preview" alt="Preview do Retrato" />
                                <input type="file" class="image-retrato" id="create-file-retrato" accept=".jpg, .jpeg, .png" name="image_retrato"
                                onchange="previewImage('create-file-retrato', 'create-file-name-retrato')" />
                                <button class="btn-remove-imagem-retrato" id="btn-remover-imagem-retrato" onclick="removerImagem('create', 'retrato')" type="button">X</button>
                            </div>
                        </div>
                    </div>
                    <div class="abc"><!-- poggers -->
                        <div class="placeholders-criar">
                            <div class="second-line">
                                <div class="parte-titulo">
                                    <label for="text">Título</label>
                                    <input type="text" id="titulo" class="titulo" placeholder="Coloque seu título" name="title"/>
                                    <span id="erro-titulo" class="erro"></span>
                                </div>
                                <div class="parte-avaliacao">
                                    <label for="number">Avaliação</label>
                                    <input type="number"  id="avaliacao" class="avaliacao" step="0.5" min="0" max="5" placeholder="Nota" name="avaliation"/>
                                    <span id="erro-avaliacao" class="erro"></span>
                                </div>
                                <input type="hidden" name="content" id="content">
                            </div>
                        </div>
                        <div class="diminuir-word">
                            <div id="summernote-criar"></div>
                            <span id="erro-descricao" class="erro"></span>
                        </div>
                        <div class="modal-buttons">
                            <button id="btn-cancelar" class="button-cancelar" onclick="fecharModal('criar-post')" type="button">
                                Cancelar
                            </button>
                            <button id="btn-criar" class="button-postar" type="submit">Criar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
                    <td class="autor-post"><?= $post->name ?></td>
                    <td><?= formatarDataBrasileira($post->create_at) ?></td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModalVer('read<?= $post->id?>')"><i class="fa-regular fa-eye"></i></button></td>
                    <td><button class="btn-acao btn-editar" onclick="abrirModal('update<?= $post->id?>')"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn-acao btn-excluir" onclick="abrirModal('excluir<?= $post->id ?>')"><i class="fas fa-trash"></i></button></td>
                </tr>
                <div class="modal-excluir" id="excluir<?= $post->id ?>">
                    <form action="/deletar-post" method="post" >
                        <input type="hidden" name="iddelete_post" value="<?= $post->id ?>">
                        <input type="hidden" name="iddelete_capa" value="<?= $post->image_capa ?>">
                        <input type="hidden" name="iddelete_retrato" value="<?= $post->image_retrato ?>">
                            <div class="modal-container-excluir">
                                <img
                                src="/public/assets/deletar2.png"
                                alt="Imagem de Deletar"
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

                <!-- modal visualizar -->
                <div class="modal-visualizar" id="read<?= $post->id?>">
                    <div class="modal-container">                       
                        <div class="imagens-edit">
                            <div class="user-info">
                                <img src="/<?= $post->image ?>" alt="" class="icon1">
                                <p><?= $post->name ?></p>
                            </div>
                            <div class="capa-read">
                                <div class="container-image">
                                    </div>
                                    <div class="parte-capa">
                                    <label for="file">Foto modo paisagem</label>
                                    <img id="read-name-capa" class="capa-preview" alt="Preview da Capa"
                                    src="/<?= $post->image_capa ?>"/>
                                    <input type="file" class="image-capa" id="read-capa" accept="image/*" name="image-capa"
                                    onchange="previewImage('read-capa', 'read-name-capa', 'capa')" />
                                </div>
                            </div>
                            <div class="retrato-read">
                                <div class="container-image">
                                    </div>
                                    <div class="parte-retrato">
                                    <label for="file">Foto modo retrato</label>
                                    <img id="read-name-retrato" class="retrato-preview" alt="Preview do Retrato" src="/<?= $post->image_retrato ?>"/>
                                    <input type="file" class="image-retrato" id="read-retrato" accept="image/*" name="image-retrato"
                                    onchange="previewImage('read-retrato', 'read-name-retrato', 'retrato')" />
                                </div>
                            </div>
                        </div>
                        <div class="abc"><!-- poggers -->
                            <div class="placeholders-criar">
                                <div class="parte-data">
                                    <label for="date">Data</label>
                                    <input value="<?= $post->create_at ?>" id="data" class="data" name="create-at" readonly>
                                </div>
                                <div class="second-line">
                                    <div class="parte-titulo">
                                        <label for="text">Título</label>
                                        <input type="text" value="<?= $post->title ?>" id="titulo" class="titulo" placeholder="Coloque seu título" name="title" readonly/>
                                    </div>
                                    <div class="parte-avaliacao">
                                        <label for="number">Avaliação</label>
                                        <input type="number" value="<?= $post->avaliation ?>"  id="avaliacao" class="avaliacao" step="0.5" min="0" max="5" placeholder="Nota" name="avaliation" readonly/>
                                    </div>
                                    <input type="hidden" name="content" id="content">
                                </div>
                            </div>
                                <div class="diminuir-word">
                                    <div id="summernote-visualizar<?= $post->id ?>"></div>
                                    <script>
                                    $('#summernote-visualizar<?= $post->id ?>').summernote({
                                        placeholder: 'Coloque sua descrição',
                                        tabsize: 2,
                                        height: 120,
                                        lang: 'pt-BR',
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

                                    $("#summernote-visualizar<?= $post->id ?>").summernote('code', `<?= $post->content ?>`);
                                    $('#summernote-visualizar<?= $post->id ?>').next('.note-editor').find('.note-editable').attr('contenteditable', 'false');
                                    $('#summernote-visualizar<?= $post->id ?>').next('.note-editor').find('.note-toolbar button').attr('disabled', true);
                                    $('#summernote-visualizar<?= $post->id ?>').next('.note-editor').find('.note-toolbar button').css('pointer-events', 'none');

                                    </script>    
                                    <span id="erro-descricao" class="erro"></span>
                                </div>
                        </div>
                    </div>
                </div>

            <!-- Modal editar -->
            <div class="modal-editar" id="update<?= $post->id ?>">
            <form action="/editar-post" method="post" enctype="multipart/form-data" id="formEdit<?= $post->id ?>" >
                <div class="modal-container">
                    <div class="parte-autor">
                        <input type="hidden" value="<?= $post->id ?>" name="id">
                    </div>
                    <div class="imagens">
                        <div class="capa">
                            <div class="container-image">
                                <label for="file">Foto modo paisagem</label>
                                <label class="custom-file-label" for="edit-file-capa<?= $post->id ?>">Escolher imagem</label>
                            </div>
                            <div class="parte-capa">
                                <img id="edit-file-name-capa<?= $post->id ?>" class="capa-preview" alt="Preview da Capa" src="/<?= $post->image_capa ?>"/>
                                <input type="file" class="image-capa" id="edit-file-capa<?= $post->id ?>" accept=".jpg, .jpeg, .png" name="image_capa"
                                       onchange="previewImage('edit-file-capa<?= $post->id ?>', 'edit-file-name-capa<?= $post->id ?>')" />
                                
                            </div>
                        </div>
                        <div class="retrato">
                            <div class="container-image">
                                <label for="file">Foto modo retrato</label>
                                <label class="custom-file-label" for="edit-file-retrato<?= $post->id ?>">Escolher imagem</label>
                            </div>
                            <div class="parte-retrato">
                                <img id="edit-file-name-retrato<?= $post->id ?>" class="retrato-preview" alt="Preview do Retrato" src="/<?= $post->image_retrato ?>"/>
                                <input type="file" class="image-retrato" id="edit-file-retrato<?= $post->id ?>" accept=".jpg, .jpeg, .png" name="image_retrato"
                                       onchange="previewImage('edit-file-retrato<?= $post->id ?>', 'edit-file-name-retrato<?= $post->id ?>')" />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="fotoAtualCapa" value="<?= $post->image_capa ?>">
                    <input type="hidden" name="fotoAtualRetrato" value="<?= $post->image_retrato ?>">
                    <div class="abc"><!-- poggers -->
                        <div class="placeholders-criar">
                            <div class="second-line">
                                <div class="parte-titulo">
                                    <label for="text">Título</label>
                                    <input type="text" value="<?= $post->title ?>" id="titulo<?= $post->id ?>" class="titulo" placeholder="Coloque seu título" name="title"/>
                                    <span id="erro-titulo<?= $post->id ?>" class="erro"></span>
                                </div>
                                <div class="parte-avaliacao">
                                    <label for="number">Avaliação</label>
                                    <input type="number" value="<?= $post->avaliation ?>" id="avaliacao<?= $post->id ?>" class="avaliacao" step="0.5" min="0" max="5" placeholder="Nota" name="avaliation"/>
                                    <span id="erro-avaliacao<?= $post->id ?>" class="erro"></span>
                                </div>
                                <input type="hidden" name="content" id="content<?= $post->id ?>">
                            </div>
                        </div>
                        <div class="diminuir-word">
                            <div id="summernote-editar<?= $post->id ?>"></div>
                            <script>
                            $('#summernote-editar<?= $post->id ?>').summernote({
                                placeholder: 'Coloque sua descrição',
                                tabsize: 2,
                                height: 120,
                                lang: 'pt-BR',
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
                                        $('#content<?= $post->id ?>').val(contents);
                                    }                                    
                                }
                            });

                            $("#summernote-editar<?= $post->id ?>").summernote('code', `<?= $post->content?>`);
                            </script>    
                            <span id="erro-descricao<?= $post->id ?>" class="erro"></span>
                        </div>
                        <div class="modal-buttons">
                            <button id="btn-cancelar" class="button-cancelar" onclick="fecharModal('update<?= $post->id?>')" type="button">
                                Cancelar
                            </button>
                            <button id="btn-criar" class="button-postar" type="button" onclick="verificaErro('titulo<?= $post->id ?>', 'erro-titulo<?= $post->id ?>', 'avaliacao<?= $post->id ?>', 'erro-avaliacao<?= $post->id ?>', 'formEdit<?= $post->id ?>')" >Editar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

            <script>
                $('#summernote').summernote({
                    placeholder: 'Coloque sua descrição',
                    tabsize: 2,
                    height: 120,
                    lang: 'pt-BR',
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

                <div class="tela-read" id="tela-read<?= $post->id ?>" onclick="fecharModalVer('read<?= $post->id?>')"></div>
                <?php endforeach?>
            </tbody>
            <div class="tela" id="tela"></div>
        </table> 
        </div>   
        <!-- Paginação -->
        <div class="navegacao<?= $total_pages <= 1 ? " none" : "" ?>">
            <button class="nav1<?= $page <= 1 ? " disabled" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page - 1 ?>'" >&lt;</button>

            <?php for($page_number = 1; $page_number<=$total_pages; $page_number++): ?>
                <button class="nav2<?= $page_number == $page ? "nav2 active" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page_number ?>'" ><?= $page_number ?></button>
            <?php endfor ?>

            <button class="nav7<?= $page >= $total_pages ? " disabled" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page + 1 ?>'" >&gt;</button>
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