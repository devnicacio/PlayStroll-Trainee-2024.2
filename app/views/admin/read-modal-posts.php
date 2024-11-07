<div class="modal" id="modalVisualizar">
    <div class="modal--header">
        <h3>Visualizar o post</h3>
    </div>
    <div class="modal--container">
        <div id="modal--container--header"> 
            <div id="modalPost--user">
                <img src="/public/assets/avatar.jfif" alt="Avatar do user">
                <span>Aang</span>
            </div>
            <span id="dataDeCricaoPost">11 de Setembro de 2001</span>
        </div>
        <div id="modalPost--stars">
            <!-- Necessito pegar as estrelas da lista de posts -->
        </div>

        <div id="modalPost--photos">
            <figure>
                <img src="/public/assets/banner.jfif" alt="Banner do Post" id="bannerPost">
                <figcaption>Foto da capa</figcaption>
            </figure>
            <figure>
                <img src="/public/assets/retrato_dark_souls.jfif" alt="Retrato do Post" id="retratoPost">
                <figcaption>Foto de retrato</figcaption>
            </figure>
        </div>
        <form action="#" method="GET">
            <label for="">Título: </label>
            <input type="text" name="tituloPost" id="tituloPost">
            <label for="conteudoPost">Conteúdo</label>
            <textarea name="conteudoPost" id="conteudoPost"></textarea>
        </form>
        <div class="modal-buttons"><!-- Elementos com classes com nomes bem semelhantes. Mudança necessária.-->             
            <!-- O uso duma classe button-modals é recomendada para padronizar todos os botãos de todos os modais.-->
            <button class="button-modals button-calcelar" onclick="fecharModal('visualizar')">Cancelar</button>
        </div>
    </div>
</div>