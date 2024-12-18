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
    <link rel="icon" href="/public/assets/logo-escura-sem-fundo.png" type="image/png">
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
            <div class="modal-view" id="modal-view<?= $user->id ?>" onclick="fecharModalVer('<?= $user->id ?>')" >
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
                        <div class="sair">
                            <div class="botsair" onclick="fecharModalView('modal-view<?= $user->id ?>')">
                                <p>Fechar</p>
                            </div>
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