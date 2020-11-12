<?php
//Incluir a conexão com banco de dados
include_once ('conexao.php');

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    echo $email;
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $result_user = "SELECT cod_funcionario FROM funcionario WHERE email = '$email';";
    $resultado_user = mysqli_query($poti_con, $result_user) or die(mysqli_error($poti_con));
    if($resultado_user != false){

            echo "
            <div id='info'>
                  <p>
                    Digite sua nova senha:
                  </p>
                  <input type='password' name='senha_nova'>
                  <p id='info'>
                    Digite novamente sua senha:
                  </p>
            </div>
                ";
        
    }else{
        echo "Parece que esse email não está cadastrado...";
    }
    ?>
