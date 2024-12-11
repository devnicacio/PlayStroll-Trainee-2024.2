<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts</title>
    <link rel="stylesheet" href="/public/css/lista-de-posts.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <?php include 'navbar.view.php'; ?>

    <div class="pesquisa">
    <form method="GET" action="/lista-de-posts" class="pesquisa-input" onclick="inputFocus('busca')">
            <i class="bi bi-search"></i>
            <input type="text" name="busca" id="busca"  class="caixa" placeholder="ENCONTRE UM JOGO">
        </form>
        </div>
    </div>
    <div class="inicialização-dos-posts">
        <h4>MAIS RECENTES</h4>
        
    </div>
    <div class="posts">
    <?php foreach ($posts as $post): ?>
        <div class="barra"></div>
        
    <div class="post um" id="<?= $post->id ?>" onclick="location.href = '/post-individual?id=<?= $post->id?>'">
        <div class="imagem um"><img src="<?= $post->image_retrato ?>"></div>
        <div class="imagem-mobile um"><img src="<?= $post->image_capa ?>"></div>
        <div class="texto um">
            <div class="titulo um">
                <h3><?= $post->title ?></h3>
            </div>
            <div class="nota um"><h4><?= $post->avaliation ?></h4></div>
                <div class="dados um">
                    <div class="perfil um"><img src="<?= $post->image ?>"></div>
                    <div class="user um"><p><?= $post->name ?></p>></div>
                </div>
                <div class="conteúdo um">
                <p class="descricao"><?= strlen($post->content) > 250 ? substr($post->content, 0, 250) . '...' : $post->content ?> </p>
                </div>
        </div>
    </div>
    <?php endforeach ?>
    <div class="barra"></div>
    </div>
   
    <div class="navegação">
        <button class="nav1 <?= $page <=1 ? "disabled" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page - 1 . $search ?>'"><</button>
        <?php for($page_number = 1; $page_number<=$total_pages; $page_number++): ?>
            <button class="nav2<?= $page_number == $page ? " active" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page_number . $search ?>'"><?= $page_number ?></button>
        <?php endfor ?>
        <button class="nav7 <?= $page >= $total_pages ? "disabled" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page + 1 . $search ?>'">></button>
        
    </div>

    <?php include 'footer.view.php'; ?>

</body>
<script src="/public/js/lista-de-posts.js"></script>
</html>