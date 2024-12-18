<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header('Location: /login');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/lista-usuarios.css">
    <link rel="stylesheet" type="text/css" href="/public/css/modal-criar.css">
    <link rel="stylesheet" href="/public/css/admin/sidebar.css">
    <link rel="icon" href="/public/assets/Logo escura quadrada.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/public/css/modal-excluir.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/modal-visualizar.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/modal-editar.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lista de usuarios</title>
</head>

<body>

<nav id="sideBar">
    <div id="sideBarContent">
        <div class="sideBar--user">
            <img src="<?= $_SESSION['user']->image ?>" id="user--avatar" alt="Avatar">
            <span class="infos--itemDescription">
                <?= substr($_SESSION['user']->name,0,10) ?>...
            </span>
        </div>
        <ul id="sideBar--sideItems">
            <li class="sideItems--sideItem">
                <a href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="itensMenu" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
                    </svg>
                    <span class="infos--itemDescription">
                        Dashboard
                    </span>
                    <!--
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="itensMenu" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                    </svg>
                    -->
                    </a>
                </li>
                <li class="sideItems--sideItem<?= $_SERVER['REQUEST_URI'] == '/tabela-de-posts' ? ' action' : '' ?>">
                    <a href="/tabela-de-posts">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="itensMenu" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                        </svg>
                        <span class="infos--itemDescription">
                            Publicações
                        </span>
                        <!--
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="itensMenu" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                    </svg>-->
                    </a>
                </li>
                <li class="sideItems--sideItem<?= $_SERVER['REQUEST_URI'] == '/users' ? ' action' : '' ?>">
                    <a href="/users">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="itensMenu" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                        </svg>
                        <span class="infos--itemDescription">
                            Usuários
                        </span>
                        <!--
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="itensMenu" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    </svg>-->
                    </a>
                </li>
            </ul>
        </div>
        <div id="sideBar--logout">
            <form action="/logout" method="POST">
                <button id="logoutBtn" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="itensMenu" viewBox="0 0 16 16">
                        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z" />
                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0" />
                    </svg>
                    <span text-align="left" class="infos--itemDescription">
                        Logout
                    </span>
                    <!--
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="itensMenu" viewBox="0 0 16 16">
                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>-->
                </button>
            </form>
        </div>
    </nav>


    <div class="gradient">
        <div class="parte-de-cima">
            <h1 class="titulo">Lista de usuários</h1>
            <button class="more" onclick="abrirModalCriar()">+</button>
        </div>
        <div class="table-container">
            <table class="lista">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td class="autor-post"><?= $user->name ?></td>
                            <td class="email-post"><?= $user->email ?></td>
                            <td><button class="verificar" onclick="abrirModalView('modal-view<?= $user->id ?>')"><i class="bi bi-eye"></i></button></td>
                            <td><button class="editar" onclick="editar('editarUsuario<?= $user->id ?>')"><i class="bi bi-pencil-square"></i></button></td>
                            <td><button class="excluir" onclick="abrirModalExcluirUsuario('modal-excluirex<?= $user->id ?>')"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        

        <?php foreach ($users as $user): ?>
            <div class="tela" id="editarUsuario<?= $user->id ?>" data-user-id="<?= $user->id ?>">

                <div class="fundo" id="cx">
                    <div class="edit">
                        <form method="post" action="/users/edit" enctype="multipart/form-data" class="formEdit" id="formEdit<?= $user->id ?>">
                            <input type="hidden" value="<?= $user->id ?>" name="id">
                            <div class="editname">
                                <input type="text" name="name" value="<?= $user->name ?>" placeholder="Username" class="nameEdit" id="nameEdit<?= $user->id ?>" >
                                <span class="erroEdit" id="erroNameEdit<?= $user->id ?>" ></span>
                            </div>
                            <div class="inputmail">
                                <input type="text" name="email" value="<?= $user->email ?>" placeholder="Email"  class="mailEdit" id="mailEdit<?= $user->id ?>" >
                                <span class="erroEdit" id="erroMailEdit<?= $user->id ?>" ></span>
                            </div>
                            <div class="inputsenha">
                                <input id="senhaEdit<?= $user->id ?>" type="password" name="password" value="<?= $user->password ?>" placeholder="Senha" class="senhaEdit"   >
                                <i class="bi bi-eye" id="iconeSenha<?= $user->id ?>" onclick="mostrarSenha('senhaEdit<?= $user->id ?>', 'iconeSenha<?= $user->id ?>')" ></i>
                                <span class="erroEdit" id="erroSenhaEdit<?= $user->id ?>" ></span>
                            </div>
                            <div class="imagem">
                                <img id="imgEdit<?= $user->id ?>" src="<?= $user->image ?>">
                                <input type="file" id="inputImage<?= $user->id ?>" name="image" accept="image/png, image/jpeg">
                                <button type="button" id="btnImage<?= $user->id ?>" onclick="document.getElementById('inputImage<?= $user->id ?>').click()">Escolher imagem</button>
                            </div>
                            <div class="confirma">
                                <div class="exclui">
                                    <button type="button" class="botn" onclick="editar2('editarUsuario<?= $user->id ?>')">Fechar</button>
                                </div>
                                <div class="conf">
                                    <button type="button" id="confEdit" onclick="errorChecker('erroNameEdit<?= $user->id ?>', 'erroMailEdit<?= $user->id ?>', 'erroSenhaEdit<?= $user->id ?>', 'formEdit<?= $user->id ?>', 'nameEdit<?= $user->id ?>', 'mailEdit<?= $user->id ?>', 'senhaEdit<?= $user->id ?>')" class="boty">Confirmar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        <?php endforeach ?>

        <?php foreach ($users as $user): ?>
            <div class="modal-view" id="modal-view<?= $user->id ?>" onclick="fecharModalVer('modal-view<?= $user->id ?>')" >
                <div class="visualisar" id="ver<?= $user->id ?>">
                    <div class="caixa">
                        <div class="id">
                            <p class="tit">ID</p>
                            <input type="number" class="box" value="<?= $user->id ?>" readonly>
                        </div>
                        <div class="email">
                            <p class="tit">Email</p>
                            <input type="email" value="<?= $user->email ?>" readonly class="box">
                        </div>
                        <div class="username">
                            <p class="tit">Usuário</p>
                            <input class="box" type="text" value="<?= $user->name ?>" readonly>
                        </div>
                        <div class="imagem-view" id="imgdiv">
                            <input id="img" type="image" src="<?= $user->image ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>





        <!-- Modal Criar Usuário -->
        <div class="modalcr" id="modal-criar-usuariocr" style="display: none;">
            <div class="modal-backgroundcr">
                <div class="modal-containercr">
                    <form class="modal-createcr" method="POST" action="/users/create" enctype="multipart/form-data">
                        <input name="name" type="text" id="nomecr" placeholder="Seu Nome">
                        <span id="erro-nomecr" class="errocr"></span>

                        <input name="email" type="email" id="emailcr" placeholder="Seu Email">
                        <span id="erro-emailcr" class="errocr"></span>

                        <div class="input-containercr">
                            <input name="password" type="password" id="senhacr" placeholder="Coloque sua senha" />
                            <span id="erro-senhacr" class="errocr"></span>
                            <i class="bi bi-eye" onclick="toggleSenha('senhacr', 'senha-iconcr')" id="senha-iconcr"></i>
                        </div>
                        <div class="input-containercr">
                            <input type="password" id="confirmar-senhacr" placeholder="Confirme sua senha" />
                            <span id="erro-confirmar-senhacr" class="errocr"></span>
                            <i class="bi bi-eye" onclick="toggleSenha('confirmar-senhacr', 'confirmar-senha-iconcr')" id="confirmar-senha-iconcr"></i>
                        </div>
                        <span id="erro-imagemcr" class="errocr"></span>
                        <div class="foto-perfilcr">
                            <img id="img-perfilcr" class="imagem-perfilcr" alt="Imagem de Perfil" style="display: none;" />
                            <input name="image" type="file" id="fotocr" accept="image/png, image/jpeg" onchange="mostrarImagem(event)" style="display: none;">
                            <span id="remover-imagemcr" class="remover-imagemcr">X</span>

                        </div>

                        <button type="button" id="btn-escolher-imagemcr">Escolher Imagem</button>
                        <div class="botao-containercr">
                            <button type="button" id="btn-fecharcr" onclick="fecharModalCriar()">Cancelar</button>
                            <button id="btn-adicionarcr">Adicionar Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Editar Usuário -->


        <!-- Modal Excluir Usuário -->
        <?php foreach ($users as $user): ?>
            <!-- Modal Excluir Usuário (Exclusivo para cada usuário) -->
            <div class="modalex" id="modal-excluirex<?= $user->id ?>" style="display: none;">
                <form action="/users/delete" method="POST">
                    <!-- Passa o ID do usuário no campo oculto -->
                    <input type="hidden" name="iddelete" value="<?= $user->id ?>">
                    <input type="hidden" name="imagedelete" value="<?= $user->image ?>">
                    <div class="modal-containerex">
                        <img src="/public/assets/deletar2.png" class="imgex" alt="Excluir" height="100px" width="150px" />
                        <h4>Tem certeza que deseja excluir o usuário <strong><?= $user->name ?></strong>?</h4>
                        <div class="modal-buttonsex">
                            <button type="button" class="button-cancelarex" onclick="fecharModalExcluirUsuario('modal-excluirex<?= $user->id ?>')">
                                Cancelar
                            </button>
                            <button type="submit" class="button-excluirex">Excluir</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>

        <div class="paginas<?= $total_pages <= 1 ? " none" : "" ?>">
            <button class="anterior<?= $page <= 1 ? " disabled" : "" ?>"  onclick="location.href='?paginacaoNumero=<?= $page - 1 ?>'">
                < </button>
                    <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
                        <button class="pag1<?= $page_number == $page ? " active" : "" ?>" onclick="location.href='?paginacaoNumero=<?= $page_number ?>'"><?= $page_number ?></button>
                    <?php endfor ?>
                    <button class="proximo<?= $page >= $total_pages ? " disabled" : "" ?>"  onclick="location.href='?paginacaoNumero=<?= $page + 1 ?>'">></button>
        </div>
    </div>
    

        <script src="/public/js/modal-criar.js"></script>
        <script src="/public/js/modal-excluir.js"></script>
        <script src="../../../public/js/modal-editar.js"></script>
        <script src="../../../public/js/modal-visualizar.js"></script>
</body>

</html>