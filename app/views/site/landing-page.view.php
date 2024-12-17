<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/landing-page.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../../../public/css/footer.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@700&display=swap">
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

    <footer id="rodape">
        <img id="rodape--logoParaPequenasTelas"src="/public/assets/logo-escura-sem-fundo.png" alt="Logo da PlayStrool">
        <div id="rodape--informacoesDeRodape">
            <div>
                <h4>Visão</h4>
                <p>Ser a principal referência para todos os tipos de jogadores, criando um ambiente de diálogo e comunidade que aprofunda a compreensão e apreciação dos games.</p>
            </div>
            <hr>
            <div>
                <h4>Missão</h4>
                <p>Divulgar informações relevantes sobre jogos de diversos gêneros, proporcionando um espaço para análises sinceras e compartilhamento de experiências de gameplay.</p>
            </div>
            <hr>
            <div>
                <h4><span>Valores</span></h4>
                <p>Diversidade<br>
                    Paixão<br>
                    Respeito<br>
                    Integridade
                </p>
            </div>
            <hr>
        </div>
        <div id="rodape--midias">
            <a href="https://www.instagram.com/codejr/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="midias--icons bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                </svg>
                Instagram
            </a>
            <a href="https://www.facebook.com/codeempresajunior/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="midias--icons bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                </svg>
                Facebook
            </a>
            <a href="https://br.linkedin.com/company/codejr">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="midias--icons bi-linkedin" viewBox="0 0 16 16">
                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                </svg>
                Linkedin
            </a>
        </div>
        <div id="rodape--logos">
            <img src="/public/assets/logo-escura-sem-fundo.png" alt="Logo da PlayStrool">
            <div>
                <p>Site desenvolvido por</p>
                <!-- Futuralmente, poderia ser colocado o link para o site da Code-->
                <a href="#">
                    <img id="codeLogo" src="/public/assets/code-logo.png" alt="Logo da CodeJR">
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="/public/js/landing-page.js"></script>

</body>
</html>