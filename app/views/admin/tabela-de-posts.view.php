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
    <main class="container">
        <div class="cabecalho">
            <h1 class="table-title">Tabela de Posts</h1>
            <button class="more" onclick="abrirModal('criar-post')">+</button>
        </div>
        <div class="modal-criar" id="criar-post">
            <form action="/criar-post" method="post" enctype="multipart/form-data">
                <div class="modal-container">
                    <div class="imagens">
                        <div class="capa">
                            <div class="container-image">
                                <label for="file">Foto modo paisagem</label>
                                <label class="custom-file-label" for="file-capa">Escolha uma imagem</label>
                                <span id="erro-capa" class="erro-img"></span>
                            </div>
                            <div class="parte-capa">
                                <img id="file-name-capa" class="capa-preview" alt="Preview da Capa" />
                                <input type="file" class="image-capa" id="file-capa" accept="image/*" name="image-capa"
                                onchange="previewImage('file-capa', 'file-name-capa', 'capa')" />
                                <button id="btn-remover-imagem-capa" onclick="removerImagem('capa')" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                        <div class="retrato">
                            <div class="container-image">
                                <label for="file">Foto modo retrato</label>
                                <label class="custom-file-label" for="file-retrato">Escolha uma imagem</label>
                                <span id="erro-retrato" class="erro-img"></span>
                            </div>
                            <div class="parte-retrato">
                                <img id="file-name-retrato" class="retrato-preview" alt="Preview do Retrato" />
                                <input type="file" class="image-retrato" id="file-retrato" accept="image/*" name="image-retrato"
                                onchange="previewImage('file-retrato', 'file-name-retrato', 'retrato')" />
                                <button id="btn-remover-imagem-retrato" onclick="removerImagem('retrato')" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="abc"><!-- poggers -->
                        <div class="placeholders-criar">
                            <div class="parte-data">
                                <label for="date">Data</label>
                                <input type="date" id="data" class="data" name="create-at">
                                <span id="erro-data" class="erro"></span>
                            </div>
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
                    <td><?= $post->create_at ?></td>
                    <td><button class="btn-acao btn-visualizar" onclick="abrirModal('read<?= $post->id?>')"><i class="fa-regular fa-eye"></i></button></td>
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
            <form action="/visualizar-post" method="post" enctype="multipart/form-data">
                <div class="modal-container">
                    <div class="imagens">
                        <div class="capa">
                            <div class="container-image">
                                <label for="file">Foto modo paisagem</label>
                                <label class="custom-file-label" for="file-capa">Escolha uma imagem</label>
                                <span id="erro-capa" class="erro-img"></span>
                            </div>
                            <div class="parte-capa">
                                <img id="file-name-capa" class="capa-preview" alt="Preview da Capa" />
                                <input type="file" class="image-capa" id="file-capa" accept="image/*" name="image-capa"
                                onchange="previewImage('file-capa', 'file-name-capa', 'capa')" />
                                <button id="btn-remover-imagem-capa" onclick="removerImagem('capa')" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                        <div class="retrato">
                            <div class="container-image">
                                <label for="file">Foto modo retrato</label>
                                <label class="custom-file-label" for="file-retrato">Escolha uma imagem</label>
                                <span id="erro-retrato" class="erro-img"></span>
                            </div>
                            <div class="parte-retrato">
                                <img id="file-name-retrato" class="retrato-preview" alt="Preview do Retrato" />
                                <input type="file" class="image-retrato" id="file-retrato" accept="image/*" name="image-retrato"
                                onchange="previewImage('file-retrato', 'file-name-retrato', 'retrato')" />
                                <button id="btn-remover-imagem-retrato" onclick="removerImagem('retrato')" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="abc"><!-- poggers -->
                        <div class="placeholders-criar">
                            <div class="parte-data">
                                <label for="date">Data</label>
                                <input type="date" value="<?= $post->create_at ?>" id="data" class="data" name="create-at" readonly>
                                <span id="erro-data" class="erro"></span>
                            </div>
                            <div class="second-line">
                                <div class="parte-titulo">
                                    <label for="text">Título</label>
                                    <input type="text" value="<?= $post->title ?>" id="titulo" class="titulo" placeholder="Coloque seu título" name="title" readonly/>
                                    <span id="erro-titulo" class="erro"></span>
                                </div>
                                <div class="parte-avaliacao">
                                    <label for="number">Avaliação</label>
                                    <input type="number" value="<?= $post->avaliation ?>"  id="avaliacao" class="avaliacao" step="0.5" min="0" max="5" placeholder="Nota" name="avaliation" readonly/>
                                    <span id="erro-avaliacao" class="erro"></span>
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
                            $('.note-editable').attr('contenteditable', 'false');
                            $('.note-toolbar button').attr('disabled', true);
                            $('.note-toolbar button').css('pointer-events', 'none');
                            </script>    
                            <span id="erro-descricao" class="erro"></span>
                        </div>
                        <div class="modal-buttons">
                            <button id="btn-cancelar" class="button-cancelar" onclick="fecharModal('read<?= $post->id?>')" type="button">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
            <!-- Modal editar -->
            <div class="modal-editar" id="update<?= $post->id ?>">
            <form action="/editar-post" method="post" enctype="multipart/form-data">
                <div class="modal-container">
                    <div class="parte-autor">
                        <input type="hidden" value="<?= $post->id ?>" name="id">
                    <input type="hidden" name="content" id="content">
                    </div>
                    <div class="imagens">
                        <div class="capa">
                            <div class="container-image">
                                <label for="file">Foto modo paisagem</label>
                                <label class="custom-file-label" for="file-capa">Editar imagem</label>
                                <span id="erro-capa" class="erro-img"></span>
                            </div>
                            <div class="parte-capa">
                                <img id="edit-name-capa" class="capa-preview" alt="Preview da Capa" />
                                <input type="file" class="image-capa" id="edit-capa" accept="image/*" name="image-capa"
                                onchange="previewImage('edit-capa', 'edit-name-capa')" />
                                <button id="btn-remover-imagem-capa" onclick="removerImagem('capa')" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                        <div class="retrato">
                            <div class="container-image">
                                <label for="file">Foto modo retrato</label>
                                <label class="custom-file-label" for="file-retrato">Editar imagem</label>
                                <span id="erro-retrato" class="erro-img"></span>
                            </div>
                            <div class="parte-retrato">
                                <img id="edit-name-retrato" class="retrato-preview" alt="Preview do Retrato" />
                                <input type="file" class="image-retrato" id="edit-retrato" accept="image/*" name="image-retrato"
                                onchange="previewImage('edit-retrato', 'edit-name-retrato', 'retrato')" />
                                <button id="btn-remover-imagem-retrato" onclick="removerImagem('retrato')" type="button">
                                    X
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="abc"><!-- poggers -->
                        <div class="placeholders-criar">
                            <div class="parte-data">
                                <label for="date">Data</label>
                                <input type="date" value="<?= $post->create_at ?>" id="data" class="data" name="create-at">
                                <span id="erro-data" class="erro"></span>
                            </div>
                            <div class="second-line">
                                <div class="parte-titulo">
                                    <label for="text">Título</label>
                                    <input type="text" value="<?= $post->title ?>" id="titulo" class="titulo" placeholder="Coloque seu título" name="title"/>
                                    <span id="erro-titulo" class="erro"></span>
                                </div>
                                <div class="parte-avaliacao">
                                    <label for="number">Avaliação</label>
                                    <input type="number" value="<?= $post->avaliation ?>" id="avaliacao" class="avaliacao" step="0.5" min="0" max="5" placeholder="Nota" name="avaliation"/>
                                    <span id="erro-avaliacao" class="erro"></span>
                                </div>
                                <input type="hidden" name="content" id="content">
                            </div>
                        </div>
                        <div class="diminuir-word">
                            <div id="summernote<?= $post->id ?>"></div>
                            <script>
                            $('#summernote<?= $post->id ?>').summernote({
                                placeholder: 'Coloque sua descrição',
                                tabsize: 2,
                                height: 120,
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
                            $("#summernote<?= $post->id ?>").summernote('code', `<?= $post->content?>`);
                            </script>    
                            <span id="erro-descricao" class="erro"></span>
                        </div>
                        <div class="modal-buttons">
                            <button id="btn-cancelar" class="button-cancelar" onclick="fecharModal('update<?= $post->id?>')" type="button">
                                Cancelar
                            </button>
                            <button id="btn-criar" class="button-postar" type="submit">Editar</button>
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
            <div class="tela-read" id="tela" onclick="fecharModal('read<?= $post->id?>')"></div>
            <div class="tela" id="tela"></div>
        </table>    
        <!-- Paginação -->
        <div class="navegacao">
            <button class="nav1<?= $page <= 1 ? "disabled" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page - 1 ?>'" >&lt;</button>

            <?php for($page_number = 1; $page_number<=$total_pages; $page_number++): ?>
                <button class="nav2<?= $page_number == $page ? "nav2 active" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page_number ?>'" ><?= $page_number ?></button>
            <?php endfor ?>

            <button class="nav7<?= $page >= $total_pages ? "disabled" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page + 1 ?>'" >&gt;</button>
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