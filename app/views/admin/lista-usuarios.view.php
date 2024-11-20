<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/lista-usuarios.css">
    <link rel="stylesheet" type="text/css" href="/public/css/modal-criar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/modal-excluir.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/modal-visualizar.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/modal-editar.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Lista de usuarios</title>
</head>

<body>
    <div class="gradient">
        <div class="parte-de-cima">
            <h1 class="titulo">Lista de usuários</h1>
            <button class="more" onclick="abrirModal()">+</button>
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
                            <td><button class="editar" onclick="editar('editarUsuario')"><i class="bi bi-pencil-square"></i></button></td>
                            <td><button class="excluir" onclick="abrirModalExcluirUsuario('modal-excluirex<?= $user->id ?>')"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="paginas">
            <button class="anterior">
                < </button>
                    <button class="pag1">1</button>
                    <button class="pag2">2</button>
                    <button class="pag3">3</button>
                    <button class="pag4">4</button>
                    <button class="pag5">5</button>
                    <button class="proximo>">></button>
        </div>
        <div class="tela" id="editarUsuario">
            <form method="post" action="/users/edit" enctype="multipart/form-data" >
                <div class="fundo" id="cx">
                    <input type="hidden" value="<?=$user->id ?>" name="id">
                    <div class="edit">
                        <div class="editname">
                            <input type="text" name="name" value="<?= $user->name ?>" placeholder="Username">
                        </div>
                        <div class="inputmail">
                            <input type="text" name="email" value="<?= $user->email ?>" placeholder="Email">
                        </div>
                        <div class="inputsenha">
                            <input id="senha" type="password" name="password" value="<?= $user->password ?>" placeholder="Senha">
                            <i class="bi bi-eye" id="mostrar" onclick="mostrarSenha()"></i>
                        </div>
                        <div class="imagem">
                            <img id="imagemIni" src="<?=$user->image ?>" alt="Img Ini">
                            <input type="file" name="image" id="inputImage" accept="image/*">
                            <button onclick="document.getElementById('inputImage').click()">Escolher imagem</button>
                        </div>
                        <div class="remove" id="remove">
                            <button onclick="removerImagem()">Remover imagem</button>
                        </div>
                        <div class="confirma">
                            <div class="conf">
                                <button type="submit" class="boty">CONFIRMAR</button>
                            </div>
                            <div class="exclui">
                                <div class="botn" onclick="editar2('editarUsuario')">CANCELAR</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-view" id="modal-view<?= $user->id ?>">

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
                    <div class="imagem-view">
                        <input type="image" src="../site/arquivos/perfil 3.jpg">
                    </div>
                    <div class="sair">
                        <div class="botsair" onclick="fecharModalView('modal-view<?= $user->id ?>')">
                            <p>Fechar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modal-criar-usuario" style="display: none;">
            <div class="modal-background">

                <div class="modal-container">
                    <form class="modal-create" method="POST" action="/users/create">

                        <input name="name" type="text" id="nome" placeholder="Seu Nome">
                        <span id="erro-nome" class="erro"></span>

                        <input name="email" type="email" id="email" placeholder="Seu Email">
                        <span id="erro-email" class="erro"></span>

                        <div class="input-container">
                            <input name="password" type="password" id="senha" placeholder="Coloque sua senha" />
                            <span id="erro-senha" class="erro"></span>
                            <i class="bi bi-eye-slash" onclick="toggleSenha('senha')" id="senha-icon"></i>
                        </div>
                        <div class="input-container">
                            <input type="password" id="confirmar-senha" placeholder="Confirme sua senha" />
                            <span id="erro-confirmar-senha" class="erro"></span>
                            <i class="bi bi-eye-slash" onclick="toggleSenha('confirmar-senha')" id="confirmar-senha-icon"></i>
                        </div>

                        <div class="foto-perfil">
                            <img id="img-perfil" class="imagem-perfil" alt="Imagem de Perfil" style="display: none;" src="../../<?=$user->image ?>"/>
                            <input name="image" type="file" id="foto" accept="image/png, image/jpeg" onchange="mostrarImagem(event)" style="display: none;">
                            <span id="remover-imagem" class="remover-imagem">X</span>
                        </div>

                        <label for="foto" id="btn-escolher-imagem">Escolher Imagem</label>
                        <div class="botao-container">
                            <button type="button" id="btn-fechar" onclick="fecharModal()">Fechar</button>
                            <button type="submit" id="btn-adicionar">Adicionar Usuário</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Criar Usuário -->

    <!-- Modal Editar Usuário -->


    <!-- Modal Excluir Usuário -->
    <?php foreach ($users as $user): ?>
        <!-- Modal Excluir Usuário (Exclusivo para cada usuário) -->
        <div class="modalex" id="modal-excluirex<?= $user->id ?>" style="display: none;">
            <form action="/users/delete" method="POST">
                <!-- Passa o ID do usuário no campo oculto -->
                <input type="hidden" name="iddelete" value="<?= $user->id ?>">
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


    <script src="/public/js/modal-criar.js"></script>
    <script src="/public/js/modal-excluir.js"></script>
    <script src="../../../public/js/modal-editar.js"></script>
    <script src="../../../public/js/modal-visualizar.js"></script>
</body>

</html>