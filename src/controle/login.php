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
            echo "Logou";
        }
    }
?>