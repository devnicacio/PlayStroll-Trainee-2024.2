<!-- Padronização dos seletores de CSS feita pelo Vítor:
Classe: serão usadas, se forem reutilizadas em outros lugares obrigatoriamente. 
Usarei, quando quero padronizar algo;
id: serão usadas em elementos únicos.
Ademais, usei a metodologia BEM(Block, Element, Modifier). Os elementos são identificados com --, e
os modificadores por __.
-->
<div class="modal" id="modalPostVisualizar">
    <div class="modal--header">
        <h3>Visualizar o post</h3>
    </div>
    <div class="modal--container">
        <div id="modalPostVisualizar--container--header"> 
            <div id="modalPostVisualizar--user">
                <img src="/public/assets/avatar.jfif" alt="Avatar do user">
                <span>Aang</span>
            </div>
            <span id="modalPostVisualizar--dataDeCricao">11 de Setembro de 2001</span>
        </div>
        <div id="modalPostVisualizar--container--stars">
            <!-- Necessito pegar as estrelas da lista de posts -->
        </div>
        <div id="modalPostVisualizar--container--photos">
            <figure>
                <img src="/public/assets/banner.jfif" alt="Banner do Post" id="bannerPost">
                <figcaption>Foto da capa</figcaption>
            </figure>
            <figure>
                <img src="/public/assets/retrato_dark_souls.jfif" alt="Retrato do Post" id="retratoPost">
                <figcaption>Foto de retrato</figcaption>
            </figure>
        </div>
        <div id="modalPostVisualizar--container--textos">
            <p>Título: </p>
            <span id="modalPostVisualizar--titulo"></span>
            <p>Conteúdo</p>
            <span id="modalPostVisualizar--conteudo"></span>
        </div>
        <div id="modalPostVisualizar--container--buttons">
            <button class="buttonModal buttonModal__cancelar" onclick="fecharModal('modalVisualizar')">Cancelar</button>
        </div>
    </div>
</div>