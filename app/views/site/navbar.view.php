<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <link rel="stylesheet" href="/public/css/navbar.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@700&display=swap"> 

    <script defer src="/public/js/navbar.js"></script>
</head>
<body>
    <nav id="navigationBar">
        <a id="navigationBar--home" title="Home" href="/app/views/site/index.html">
            <p>PLAY STROLL</p>
            <img src="/public/assets/logo-escura-sem-fundo.png" alt="Logo da Playstroll">
        </a>
            
        <ul class="navigationBar--links">
            <li>
                <a href="lista-de-posts">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="icons bi-chat-left-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    </svg>
                    <p>Posts</p>
                </a>
            </li>
            <li>
            <form id="links--searchPosts" action="/pesquisa" method="GET" enctype="application/x-www-form-urlencoded">
                    <input type="search" name="busca" title="Buscar" placeholder="Buscar" autocomplete="off" autosave required>
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icons bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </form>
            </li>
            <li>
                <a href="login">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="icons bi-unlock-fill" viewBox="0 0 16 16">
                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/>
                    </svg>
                    <p>Login</p>
                </a>
            </li>
        </ul>
        <div id="navigationBar--menuIcon" onclick="movimentacaoMenuIcon()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>
    <div id="tabletAndMobileSubSection">
        <ul class="navigationBar--links">
            <li>
                <a href="posts.html">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="icons bi-chat-left-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    </svg>
                    <p>Posts</p>
                </a>
            </li>
            <li>
                <form id="links--searchPosts" action="/app/views/site/index.html" method="get" enctype="application/x-www-form-urlencoded">
                    <input type="search" name="buscarPublicacoes" title="Buscar" placeholder="Buscar" autocomplete="off" autosave required>
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icons bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </form>
            </li>
            <li>
                <a href="login.html">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="icons bi-unlock-fill" viewBox="0 0 16 16">
                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/>
                    </svg>
                    <p>Login</p>
                </a>
            </li>
        </ul>
    </div>

</body>
</html>