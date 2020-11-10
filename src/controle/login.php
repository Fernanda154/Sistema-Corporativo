<?php
    include('conexao.php');
    $login = $_POST['txt_login'];
    $senha = $_POST['pass_senha'];

    //Busca o funcionário no banco pelo login fornecido.
    $query_login = "SELECT * FROM funcionario WHERE login = '$login';";
    $result = mysqli_query($poti_con, $query_login) or die(mysqli_error($poti_con));
    if($result != false){
        $funcionario = mysqli_fetch_assoc($result);
        if($funcionario['login'] == $login and $funcionario['senha'] == $senha){
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['cod_funcionario'] = $funcionario['cod_funcionario'];
            $_SESSION['cargo'] = $funcionario['cargo'];
            $_SESSION['nome'] = $funcionario['nome'];
            header('Location: ../views/painel.php');
            echo "Logou";
        }
    }else{
      echo "<script>alert('Usuário não encontrado.');</script>";
    }
?>
