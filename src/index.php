<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <script src="js/valida_login.js"></script>
  <title>Potigás</title>
</head>

<body>
  <div class="card-maior">
    <form action="controle/login.php" method="POST" class="card-login" onsubmit="return valida_login()">
      <div class="conteudo">
        <h3>Intranet Corporativa</h3>
        <input type="text" name="txt_login" id="login" placeholder="Login">
        <br>
        <input type="password" name="pass_senha" id="senha" placeholder="Senha">
        <a href="views/recuperar_senha.php">Esqueceu a senha?</a>
        <input type="submit" class="entrar" value="Entrar">
      </div>
    </form>
    <img src="img/logo_poti_white.png" alt="logotipo da Potigás" class="logo_white">
  </div>
</body>

</html>
