<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de posts</title>
    <link rel="stylesheet" href="/public/css/lista-de-posts.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="pesquisa">
        <div class="pesquisa-input" onclick="inputFocus('busca')">
            <i class="bi bi-search"></i>
            <input type="text" name="" id="busca"  class="caixa" placeholder="ENCONTRE UM JOGO">
        </div>
    </div>
    <div class="inicialização-dos-posts">
        <h4>MAIS RECENTES</h4>
        
    </div>
    <div class="posts">
    <?php foreach ($posts as $post): ?>
        <div class="barra"></div>
        
    <div class="post um" id="<?= $post->id ?>" onclick="location.href='/post-individual '">
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
                    <p><?= $post->content ?>
                    </p>
                </div>
        </div>
    </div>
    <?php endforeach ?>
    <div class="barra"></div>
    </div>
   
    <div class="navegação">
        <button class="nav1"><</button>
        <button class="nav2">1</button>
        <button class="nav3">2</button>
        <button class="nav4">3</button>
        <button class="nav5">4</button>
        <button class="nav6">5</button>
        <button class="nav7">></button>
        
    </div>
</body>
<script src="/public/js/lista-de-posts.js"></script>
</html>