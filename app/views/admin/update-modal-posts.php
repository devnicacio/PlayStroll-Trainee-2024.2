<!-- Padronização dos seletores de CSS feita pelo Vítor:
Classe: serão usadas, se forem reutilizadas em outros lugares obrigatoriamente. 
Usarei, quando quero padronizar algo;
id: serão usadas em elementos únicos.
Ademais, usei a metodologia BEM(Block, Element, Modifier). Os elementos são identificados com --, e
os modificadores por __.
-->
<div class="modal" id="modalPostEditar">
    <div class="modal--header">
        <h3>Editar o post</h3>
    </div>
    <div class="modal--container">
        <div id="modalPostVisualizar--container--buttons">
            <button class="buttonModal buttonModal__editar">Editar</button>
            <button class="buttonModal buttonModal__calcelar" onclick="fecharModal('modalVisualizar')">Cancelar</button>
        </div>
    </div>
    <div>

    </div>
</div>