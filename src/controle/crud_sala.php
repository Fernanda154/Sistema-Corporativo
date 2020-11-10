<?php
    require_once("conexao.php");

    $nome = $_POST['nome'];
    $especificacoes = $_POST['especificacoes'];
    $status = $_POST['status'];
    if($_POST['inserir'] == "Cadastrar"){
        if(isset($nome) and isset($especificacoes) and isset($status)){
            $insert_query = "INSERT INTO sala (nome, especificacoes, status_funcionamento) VALUES ('$nome', '$especificacoes', $status);";
            $result_insert = mysqli_query($poti_con, $insert_query) or die(mysqli_error($poti_con));
            if($result_insert == 0){
                echo "Não inseriu";
            }else{
              header("Location:  ../views/acesso_administrativo/salas.php");
            }
        }

    }
?>
