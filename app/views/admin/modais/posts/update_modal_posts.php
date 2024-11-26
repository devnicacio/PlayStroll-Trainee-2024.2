<div class="modal" id="update<?= $post->id?>">
    <div class="modal--container">
        <form action="/update_post" method="PUT">
            <div class="modalPostVisualizar--container--photos">
                <figure>
                    <img src="/public/assets/retrato_dark_souls.jfif" alt="Banner do Post" class="modalPostVisualizar--banner">
                    <figcaption>Foto modo paisagem</figcaption>
                </figure>
                <figure>
                    <img src="/public/assets/banner.jfif" alt="Retrato do Post" class="modalPostVisualizar--retrato">
                    <figcaption>Foto modo retrato</figcaption>
                </figure>
            </div>
            <div class="modalPostVisualizar--container--textos">
                <div>
                    <p>Título:<span class="modalPostVisualizar--titulo"><?= $post->title?></span></p>
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
                <div class="summernote" class="modalPostVisualizar--conteudo"><?= $post->conteudo?></div>
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