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
			<div>
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
							<input type="number"  id="avaliacao" class="avaliacao" step="0.5" min="0" max="5" placeholder="Nota de 0 a 5" name="avaliation"/>
							<span id="erro-avaliacao" class="erro"></span>
						</div>
						<input type="hidden" name="content" id="content">
					</div>
				</div>
				<div class="diminuir-word">
					<div id="summernote"></div>
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