<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/public/css/login.css" />
    <link rel="icon" href="/public/assets/Logo escura quadrada.png" type="image/png">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
      href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401&display=swap"
      rel="stylesheet"
    />
    <script src="/public/js/login.js"></script>
    <title>Login</title>
  </head>
  <body>
    <div class="gradient">
      <div class="login">
        <div class="parte-de-cima">
          <h3>Login</h3>
        </div>
        <form action="/login" method="POST">

          <div class="parte-de-baixo">
          <a id="navigationBar--home" title="Home" href="/" >
            <img src="/public/assets/logo-escura-sem-fundo.png" alt="Logo da Playstroll" width="130px" height="85px">
        </a>
          <div class="mensagem-erro">
          <p>
            <?php
              if(isset($_SESSION['mensagem-erro']))
              echo $_SESSION['mensagem-erro'];
              unset( $_SESSION['mensagem-erro']);
            ?>
          </p>
        </div>
            <div class="sessao-login">
              <label>Email</label>
              <input type="text" placeholder="Coloque seu email" name="email"/>
            </div>
            <div class="sessao-login">
              <label>Senha</label>
              <div class="visualizacao">
                <input type="password" id="senha" placeholder="Coloque sua senha" name="password"/>
                <i class="bi bi-eye-slash" onclick="senha()"></i>
              </div>
            </div>
            <div class="botao-login">
              <button>Entrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
