<?php
    require_once('conexao.php');
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $gerente = $_POST['gerente'];
    if($_POST['inserir'] == "Cadastrar"){
        if(isset($nome) and isset($sigla)){
            $insert_query = "INSERT INTO setor (`nome`, `sigla`, gerente) VALUES ('$nome', '$sigla', $gerente);";
            $result_insert = mysqli_query($poti_con, $insert_query) or die(mysqli_error($poti_con));
            header("Location: ../views/acesso_administrativo/setores.php");
            if($result_insert == 0){
                echo "Não inseriu";
            }
        }
        
    }

?>