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
                    <td class="autor-post"> Diego Pereira Betti </td>
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

            <div class="modalRead" id="read<?= $post->id?>">
                <div class="modal--container">
                    <div class="modalPostVisualizar--container--header"> 
                        <div class="modalPostVisualizar--user">
                            <img src="/public/assets/avatar.jfif" alt="Avatar do user">
                            <span>Aang</span>
                        </div>
                        <span class="modalPostVisualizar--dataDeCricao"><?= $post->create_at ?></span>
                    </div>
                    <div class="modalPostVisualizar--container--photos">
                        <figure>
                            <img src="<?= $post->image_retrato ?>" alt="Banner do Post" class="modalPostVisualizar--banner">
                            <figcaption>Foto modo paisagem</figcaption>
                        </figure>
                        <figure>
                            <img src="<?= $post->image_capa ?>" alt="Retrato do Post" class="modalPostVisualizar--retrato">
                            <figcaption>Foto modo retrato</figcaption>
                        </figure>
                    </div>
                    <div class="modalPostVisualizar--container--textos">
                        <div>
                            <p>Título:<span class="modalPostVisualizar--titulo"><?= $post->title?></span></p>
                            <span class="postAvaliation"style="display:none"><?= $post->avaliation?></span>
                            <div class="rating">
                                Avaliação:
                                <span data-value="1" class="star"></span>
                                <span data-value="2" class="star"></span>
                                <span data-value="3" class="star"></span>
                                <span data-value="4" class="star"></span>
                                <span data-value="5" class="star"></span>
                            </div>
                        </div>
                        <p>Conteúdo: </p>
                        <div class="summernote" class="modalPostVisualizar--conteudo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo id augue non efficitur. Ut imperdiet feugiat lacus, ac ornare enim volutpat sed. Sed malesuada a quam at egestas. Sed nec turpis volutpat, volutpat nunc eu, consequat orci. Fusce bibendum ligula ac euismod ultrices. Maecenas mattis tortor id sem luctus blandit. Donec ultrices elit a tellus tincidunt faucibus. Donec id lorem eu sem sagittis rutrum vel eu felis. Proin arcu ipsum, mattis in eros ac, sagittis interdum turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin gravida imperdiet sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum urna velit, faucibus maximus neque feugiat nec. Ut est est, faucibus ut ultricies sit amet, rhoncus et nunc. Quisque sit amet augue dictum, rhoncus leo non, ullamcorper lorem. Morbi sit amet bibendum enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi id quam at lorem scelerisque varius. Sed accumsan molestie ligula, ut consectetur sapien varius in. Nullam at ligula ante. Duis venenatis tempor ligula et scelerisque. Sed nec aliquet quam, tristique tincidunt nisi. Maecenas in pulvinar turpis. Vivamus eleifend et est bibendum rhoncus. Nam sollicitudin lacus id dui congue luctus. Aliquam sed velit sapien. In accumsan arcu non felis tempus fringilla. Donec feugiat enim vitae iaculis tristique. Suspendisse ac metus ac risus euismod dictum sagittis id felis. Ut sollicitudin risus id dolor congue volutpat. Suspendisse at placerat nisi. Suspendisse potenti. Morbi ultricies molestie massa, eget fringilla tellus luctus eu. Sed quis nisl fermentum, commodo neque quis, luctus neque. Etiam non condimentum est. In elementum quis nulla sit amet viverra. Morbi ac felis id nisi rhoncus pulvinar. Sed in aliquam nisl. Nunc venenatis imperdiet luctus. Aenean eget justo eu mi ultrices varius sed eu ipsum. Nullam lacus velit, posuere sit amet nisi ac, consequat mollis ligula. Integer maximus eros id odio mattis efficitur. Mauris ut malesuada turpis. Phasellus rhoncus, magna at consequat convallis, dolor ante malesuada eros, ac scelerisque tortor diam vel neque. Vestibulum suscipit nunc consequat orci elementum, id lacinia eros finibus. Fusce tempor pretium interdum. Nam eget vestibulum leo. Ut tincidunt nisi erat, ut fermentum risus euismod nec. Morbi vel aliquam dui, at pharetra leo. Ut pharetra, libero at suscipit mollis, purus neque vehicula felis, id tincidunt tortor ante eget ante. Phasellus a pulvinar nunc, vel molestie ligula.</div>
                    </div>
                    <div class="modalPostVisualizar--container--buttons">
                        <button class="buttonModal buttonModal__cancelar" onclick="fecharModal('read<?= $post->id?>')">Cancelar</button>
                    </div>
                </div>
            </div>

<div class="modalUpdate" id="update<?= $post->id?>">
    <div class="modal--container">
        <form action="/update-post" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?= $post->id ?>" name="id">
            <input type="hidden" name="content" id="content">
            <div class="modalPostVisualizar--container--photos">
                <div class="capa">
                    <div class="container-image">
                        <input type="file" alt="Banner do Post" class="modalPostVisualizar--banner" name="image_capa">
                    </div>
                </div>
                <div class="retrato">
                    <div class="container-image">
                        <input type="file" alt="Retrato do Post" class="modalPostVisualizar--retrato" name="image_retrato">
                    </div>
                </div>
            </div>
            <div class="modalPostVisualizar--container--textos">
                <div class="brah"><!-- Limpa este código aqui depois. -->
                    <label for="title">Título:</label>
                    <input type="text" id="title" name="title"class="modalPostVisualizar--titulo" value="<?= $post->title?>">
                    <label for="avaliation">Avaliação</label>
					<input type="number" id="avaliacao" class="avaliacao" step="0.5" min="0" max="5" placeholder="Nota" name="avaliation" value="<?= $post->avaliation?>"/>
                </div>
                <p>Conteúdo: </p>
                <div id="summernote"></div>
            </div>
            <div class="modal--container">
                <div class="modalPostVisualizar--container--buttons">
                    <button type="button" class="buttonModal buttonModal__calcelar" onclick="fecharModal('update<?= $post->id?>')">Cancelar</button>
                    <button type="submit" class="buttonModal buttonModal__editar">Editar</button>
                </div>
            </div>
        </form>
    <div>
    <span class="postAvaliation" style="display:none"><?= $post->avaliation?></span>
    </div>
</div>
<script>
	$('#summernote').summernote({
		placeholder: 'Hello stand alone ui',
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
