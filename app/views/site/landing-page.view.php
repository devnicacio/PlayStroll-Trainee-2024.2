<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/landing-page.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <title>Play Stroll</title>
</head>
<body>
    <?php include 'navbar.view.php'; ?>

    <main>
        <div class="swiper" id="swiper-principal">
            
            <div class="swiper-wrapper" id="wrapper-principal">
                <?php foreach ($posts as $post): ?>

                <div class="swiper-slide" id="slide-principal">
                    <div class="fade-swipper">
                            <p class="nome-swipper"><?= $post->title ?></p>
                            <div class="nota-e-estrelas-swipper">
                                <p class="nota-swipper">
                                    <span style="color: #FFC739;"><?= $post->avaliation ?></span>
                                </p>
                                <div class="avaliacao-estrelas">
                                    <?php renderizarEstrelas($post->id, 30, $post->avaliation); ?>
                                </div>
                            </div>
                            <p class="autor-swipper"> <img src="<?= $post->image ?>" alt="usuario"><?= $post->name ?></p>
                                <?php
                                    $limitedContent = limitText($post->content, 30);
                                ?>
                            <p class="descricao-swipper"><?= $limitedContent ?></p>
                            <button class="botao-swipper" onclick="location.href = '/post-individual?id=<?= $post->id?>'">Veja mais</button>
                    </div>
                    <img src="<?= $post->image_capa ?>" alt="imagem">
                </div>
                <?php endforeach ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> 
        </div>

        <div id="carrossel-container">
    <div class="swiper" id="swiper-terceiro">
        <div class="swiper-wrapper" id="wrapper-terceiro">
            <!-- Slides aqui -->
            <?php foreach ($posts as $post): ?>
            <div class="swiper-slide" id="slide-terceiro">
                <div class="post-terceiro">
                    <div class="imagem-container">
                        <img class="capa-terceiro" src="<?= $post->image_retrato ?>" alt="Capa do post 3">
                        <div class="conteudo-terceiro">
                            <h3 class="titulo-terceiro"><span><?= $post->title ?></span></h3>
                            <div class="nota-terceiro">
                                <span><?= $post->avaliation ?></span>
                                <div class="avaliacao-estrelas-terceiro">
                                    <?php renderizarEstrelas($post->id, 30, $post->avaliation); ?>
                                </div>
                            </div>
                            <p class="autor-terceiro"><img src="<?= $post->image ?>" alt="usuario"> <span><?= $post->name ?></span></p>
                            <?php $limitedContent = limitText($post->content, 30); ?>
                            <p class="descricao-terceiro"><?= $limitedContent ?></p>
                            <button class="botao-veja-mais-terceiro" onclick="location.href = '/post-individual?id=<?= $post->id ?>'">Veja mais</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>




        <div class="comunidade">
            <h2>Comunidade<span style="color: #C70E37;"> engajada</span> e <span style="color: #C70E37;">diversificada</span> em diferentes tipos de jogos</h2>
        </div>

        <section class="ultimas-postagens">
            <h1>Últimas publicações</h1>
        </section>

    <div class="swiper" id="swiper-secundario">
        <div class="swiper-wrapper" id="wrapper-secundario">
            <!-- Slides aqui -->
            <?php foreach ($postsfive as $post): ?>
            <div class="swiper-slide" id="slide-secundario">
                <div class="post-individual3">
                    <img class="capa-jogo" src="<?= $post->image_retrato?>" alt="Capa do post 3">
                    <h3 class="titulo-jogo"><span><?= $post->title ?></span></h3>
                    <div class="nota">
                            <span><?= $post->avaliation ?></span>
                        <div class="avaliacao-estrelas">
                            <?php renderizarEstrelas($post->id, 30, $post->avaliation); ?>
                        </div>
                    </div>
                    <p class="autor"> <img src="<?= $post->image ?>" alt="usuario"> <span><?= $post->name ?></span></p>
                        <?php
                            $limitedContent = limitText($post->content, 30);
                        ?>
                    <p class="descricao"><?= $limitedContent ?></p>
                        <button class="botao-veja-mais" onclick="location.href = '/post-individual?id=<?= $post->id?>'">Veja mais</button>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <!-- Botões de navegação fora da wrapper -->
        <div class="swiper-button-prev" id="segundo-prev"></div>
        <div class="swiper-button-next" id="segundo-next"></div>
    </div>  
        
        </section>
            <div class="sobre-playstroll">
                <p class="proposito">Sobre o próposito da PlayStroll</p>
                <div class="div-sobre">
                    <img src="/public/assets/logo-escura.png" alt="Imagem sobre PlayStroll" class="imagem-sobre">
                    <div class="texto-sobre">
                        <p>Conectar pessoas apaixonadas por jogos, oferecendo um espaço para descobrir novas experiências e compartilhar opiniões sinceras sobre diversos títulos. O Play Stroll convida os usuários a embarcarem em uma jornada imersiva e diversificada pelo universo dos games, onde cada  review vai além da análise técnica,capturando as emoções e vivências únicas de cada jogador. Além disso, o site busca mostrar como os jogos podem impactar profundamente nossa forma de ver o mundo, criando memórias valiosas que nos acompanham ao longo da vida. Aqui, os usuários podem compartilhar críticas, elogios ou simplesmente relatar momentos marcantes de suas gameplays.</p>
                    </div>
                </div>
            </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="/public/js/landing-page.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>