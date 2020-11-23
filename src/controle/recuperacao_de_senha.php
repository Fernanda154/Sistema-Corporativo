<?php
//Incluir a conexão com banco de dados
include_once ('conexao.php');

    $email = filter_input(INPUT_POST, 'email_recuperacao', FILTER_SANITIZE_STRING);
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $result_user = "SELECT cod_funcionario FROM funcionario WHERE email = '$email';";
    $resultado_user = mysqli_query($poti_con, $result_user) or die(mysqli_error($poti_con));
    $row_usuario = mysqli_num_rows($resultado_user);
    echo $row_usuario;
    if($row_usuario != 0){
      echo "
      <div class='conteudo'>
        <p>Digite sua nova senha:</p>
        <input type='password' name='senha_nova'>
        <p id='info'>Digite novamente sua senha:</p>
        <input type='password' name='conf_senha'>
      </div>";
    }else{
      echo "
      <div class='card-login'>
        <p>Parece que esse email não está cadastrado...</p>
      </div>";
    }
?>
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

