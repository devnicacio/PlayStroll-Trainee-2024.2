<div class="modal" id="visualizar<?= $post->id?>">
    <div class="modal--header">
        <h3>Visualizar o post</h3>
    </div>
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
                <p>Avaliação: <span class="modalPostVisualizar--stars"></span></p>
            </div>
            <p>Conteúdo: </p>
            <div class="summernote" class="modalPostVisualizar--conteudo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo id augue non efficitur. Ut imperdiet feugiat lacus, ac ornare enim volutpat sed. Sed malesuada a quam at egestas. Sed nec turpis volutpat, volutpat nunc eu, consequat orci. Fusce bibendum ligula ac euismod ultrices. Maecenas mattis tortor id sem luctus blandit. Donec ultrices elit a tellus tincidunt faucibus. Donec id lorem eu sem sagittis rutrum vel eu felis. Proin arcu ipsum, mattis in eros ac, sagittis interdum turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin gravida imperdiet sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dictum urna velit, faucibus maximus neque feugiat nec. Ut est est, faucibus ut ultricies sit amet, rhoncus et nunc. Quisque sit amet augue dictum, rhoncus leo non, ullamcorper lorem. Morbi sit amet bibendum enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi id quam at lorem scelerisque varius. Sed accumsan molestie ligula, ut consectetur sapien varius in. Nullam at ligula ante. Duis venenatis tempor ligula et scelerisque. Sed nec aliquet quam, tristique tincidunt nisi. Maecenas in pulvinar turpis. Vivamus eleifend et est bibendum rhoncus. Nam sollicitudin lacus id dui congue luctus. Aliquam sed velit sapien. In accumsan arcu non felis tempus fringilla. Donec feugiat enim vitae iaculis tristique. Suspendisse ac metus ac risus euismod dictum sagittis id felis. Ut sollicitudin risus id dolor congue volutpat. Suspendisse at placerat nisi. Suspendisse potenti. Morbi ultricies molestie massa, eget fringilla tellus luctus eu. Sed quis nisl fermentum, commodo neque quis, luctus neque. Etiam non condimentum est. In elementum quis nulla sit amet viverra. Morbi ac felis id nisi rhoncus pulvinar. Sed in aliquam nisl. Nunc venenatis imperdiet luctus. Aenean eget justo eu mi ultrices varius sed eu ipsum. Nullam lacus velit, posuere sit amet nisi ac, consequat mollis ligula. Integer maximus eros id odio mattis efficitur. Mauris ut malesuada turpis. Phasellus rhoncus, magna at consequat convallis, dolor ante malesuada eros, ac scelerisque tortor diam vel neque. Vestibulum suscipit nunc consequat orci elementum, id lacinia eros finibus. Fusce tempor pretium interdum. Nam eget vestibulum leo. Ut tincidunt nisi erat, ut fermentum risus euismod nec. Morbi vel aliquam dui, at pharetra leo. Ut pharetra, libero at suscipit mollis, purus neque vehicula felis, id tincidunt tortor ante eget ante. Phasellus a pulvinar nunc, vel molestie ligula.</div>
        </div>
        <div class="modalPostVisualizar--container--buttons">
            <button class="buttonModal buttonModal__cancelar" onclick="fecharModal('modalPostVisualizar')">Cancelar</button>
        </div>
    </div>
</div>