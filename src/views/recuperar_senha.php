<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/index.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>
  <title>Potigás</title>
</head>

<body>
  <div class="card-maior">
    <form action="../controle/recuperacao_de_senha.php" method="POST" class="card-login" onsubmit="return valida_login()">
      <div class="conteudo">
        <h3>Recuperação de senha</h3>
        <div id="info">
            <p>Para resertarmos sua senha necessitamos do seu email profissional cadastrado.</p>
        </div>
        <input type="email" name="email_recuperacao" id="email_recuperacao" placeholder="Email">
        <input type="submit" class="entrar" value="Resetar">
        <a href="../index.php">Cancelar</a>
      </div>
    </form>
    <img src="../img/logo_poti_white.png" alt="logotipo da Potigás" class="logo_white">
  </div>
</body>
<script src="../js/reset_senha.js" charset="utf-8"></script>
</html>
