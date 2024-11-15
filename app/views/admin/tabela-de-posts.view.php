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
	<link rel="stylesheet" type="text/css" href="/public/css/criar.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/excluir.css" />
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
            <button class="more" onclick="abrirModal('editar')">+</button>
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
                    <td><button class="btn-acao btn-excluir" onclick="abrirModal('editar-excluir')"><i class="fas fa-trash"></i></button></td>
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

    <!-- Parte da criação de posts     -->
    <div class="modal-criar" id="editar">
		<form action="#">
			<div class="modal-container">
				<div class="imagens">
					<div class="capa">
						<div class="container-image">
							<label for="file">Foto modo paisagem</label>
							<label class="custom-file-label" for="file-capa">Escolha uma imagem</label>
						</div>
						<div class="parte-capa">
							<img id="file-name-capa" class="capa-preview" alt="Preview da Capa" />
							<input type="file" class="image-capa" id="file-capa"
							onchange="previewImage('file-capa', 'file-name-capa', 'capa')" />
							<button id="btn-remover-imagem-capa" onclick="removerImagem('capa')">
								X
							</button>
						</div>
					</div>
					<div class="retrato">
						<div class="container-image">
							<label for="file">Foto modo retrato</label>
							<label class="custom-file-label" for="file-retrato">Escolha uma imagem</label>
						</div>
						<div class="parte-retrato">
							<img id="file-name-retrato" class="retrato-preview" alt="Preview do Retrato" />
							<input type="file" class="image-retrato" id="file-retrato"
							onchange="previewImage('file-retrato', 'file-name-retrato', 'retrato')" />
							<button id="btn-remover-imagem-retrato" onclick="removerImagem('retrato')">
								X
							</button>
						</div>
					</div>
				</div>
				<div>
					<div class="placeholders">
						<div class="parte-data">
							<label for="date">Data</label>
							<input type="date" id="data" class="data" >
							<span id="erro-data" class="erro"></span>
						</div>
						<div class="second-line">
							<div class="parte-titulo">
								<label for="text">Título</label>
								<input type="text" id="titulo" class="titulo" placeholder="Coloque seu título" />
								<span id="erro-titulo" class="erro"></span>
							</div>
							<div class="parte-avaliacao">
								<label for="number">Avaliação</label>
								<input type="number"  id="avaliacao" class="avaliacao" step="0.5" min="0" max="5" placeholder="Nota de 0 a 5" />
								<span id="erro-avaliacao" class="erro"></span>
							</div>
						</div>
					</div>
					<div class="diminuir-word">
						<div id="summernote"></div>
						<span id="erro-descricao" class="erro"></span>
					</div>
					<div class="modal-buttons">
						<button id="btn-cancelar" class="button-cancelar" onclick="fecharModal('editar')">
							Cancelar
						</button>
						<button id="btn-criar" class="button-postar">Criar</button>
					</div>
				</div>
			</div>
		</form>
	</div>

    <!-- Parte de excluir posts -->
    <div class="modal-excluir" id="editar-excluir">
        <form action="#">
          <div class="modal-container-excluir">
            <img
              src="/public/assets/deletar2.png"
              alt=""
              height="100px"
              width="150px"
            />
            <h4>Tem certeza que deseja excluir?</h4>
            <div class="modal-buttons-excluir">
              <button class="button-cancelar" onclick="fecharModal('editar-excluir')">
                Cancelar
              </button>
              <button class="button-excluir">Excluir</button>
            </div>
          </div>
        </form>
      </div>

	<div class="tela" id="tela"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.0/lang/summernote-pt-BR.min.js"></script>
	<script>
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
		});
	</script>
</body>
    <script src="/public/js/criar.js"></script>

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
