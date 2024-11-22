<div class="modal-excluir" id="excluir<?= $post->id ?>">
    <form action="/deletar-post" method="post" >
        <input type="hidden" name="iddelete_post" value="<?= $post->id ?>">
        <input type="hidden" name="iddelete_capa" value="<?= $post->image_capa ?>">
        <input type="hidden" name="iddelete_retrato" value="<?= $post->image_retrato ?>">
            <div class="modal-container-excluir">
                <img
                src="/public/assets/deletar2.png"
                alt=""
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