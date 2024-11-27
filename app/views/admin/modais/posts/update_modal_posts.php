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