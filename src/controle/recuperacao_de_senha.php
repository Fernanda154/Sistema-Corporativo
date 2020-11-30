<?php
//Incluir a conexão com banco de dados
include_once ('conexao.php');

if(isset($_POST['salvar'])){
  $novaSenha = $_POST['senha_nova'];
  $confirmacao_senha = $_POST['conf_senha'];
  if($novaSenha == $confirmacao_senha){
    $cod_funcionario = $_POST['id_funcionario'];
    $query_atualiza = "UPDATE funcionario SET senha = '$novaSenha' WHERE cod_funcionario = $cod_funcionario;";
    $result = mysqli_query($poti_con, $query_atualiza) or die(mysqli_error($poti_con));
  }else{
    echo "Verifique se as senhas ";
  }

}
    $email = filter_input(INPUT_POST, 'email_recuperacao', FILTER_SANITIZE_STRING);
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $result_user = "SELECT cod_funcionario FROM funcionario WHERE email = '$email';";
    $resultado_user = mysqli_query($poti_con, $result_user) or die(mysqli_error($poti_con));
    $row_usuario = mysqli_num_rows($resultado_user);
    $cod_usuario = mysqli_fetch_assoc($resultado_user);
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
  <?php
      if(isset($result) and $result != 0){
          echo "
          
          <form action='../controle/login.php' method='POST' class='card-login' onsubmit='return valida_login()'>
            <div class='conteudo'>
            <p>Senha atualizada com sucesso!</p>
            <h3>Intranet Corporativa</h3>
            <input type='text' name='txt_login' id='login' placeholder='Login'>
            <br>
            <input type='password' name='pass_senha' id='senha' placeholder='Senha'>
            <input type='submit' class='entrar' value='Entrar'>
          </div>
        </form>
        
        ";
      }
    if($row_usuario != 0){
      echo "
      
        <form action='../controle/recuperacao_de_senha.php' method='POST' class='card-login' onsubmit='return valida_login()'>
        <div class='conteudo'>
        <h3>Atualização de senha</h3>
        <input type='password' name='senha_nova' placeholder='Nova senha'>
        <input type='password' name='conf_senha' placeholder='Confirme sua senha'>
        <input type='submit' name='salvar' class='entrar' value='Salvar'>
        <input type='hidden' name='id_funcionario' value='". $cod_usuario['cod_funcionario'] ."'>
        <a href='../index.php'>Cancelar</a>
        </div>
      </form>
      ";
    }
    else if($row_usuario == 0 && !isset($result)){
      echo "
      <div class='conteudo'>
        <h3>Algo deu errado</h3>
        <p>Parece que o email informado não está cadastrado.</p>
        <a href='../index.php'>Cancelar</a>
      </div>";
    }
    
?>
      <img src='../img/logo_poti_white.png' alt='logotipo da Potigás' class='logo_white'>
    </div>
</body>
<script src="../js/reset_senha.js" charset="utf-8"></script>
</html>
