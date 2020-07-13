<?php
    require_once('conexao.php');
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $gerente = $_POST['gerente'];
    if($_POST['crud_setor'] == "Cadastrar"){
        if(isset($nome) and isset($sigla)){
            $insert_query = "INSERT INTO setor (`nome`, `sigla`, `gerente`) VALUES '$nome', '$sigla', $gerente;";
            $result_insert = mysqli_query($poti_con, $insert_query) or die(mysqli_error($poti_con));
            if($result_insert == 0){
                echo "Não inseriu";
            }
        }
        
    }
    if($_POST['crud_setor'] == "Atualizar"){
        $nova_nome = $_POST['nova_nome'];
        $nova_sigla = $_POST['nova_sigla'];
        $cod_setor = $_POST['cod_setor'];
        $update_query = "UPDATE setor SET nome = '$nova_nome', sigla = '$nova_sigla' WHERE cod_setor = $cod_setor;";
        $result_update = mysqli_query($poti_con, $update_query) or die(mysqli_error($poti_con));
        if($result_update == 0){
            echo "Não atualizou";
        }
    }
    if($_POST['crud_setor'] == "Deletar"){
        $cod_setor = $_POST['cod_setor'];
        $delete_query = "DELETE FROM setor WHERE cod_setor = $cod_setor";
        $result_delete = mysqli_query($poti_con, $delete_query) or die(mysqli_error($poti_con));
        if($result_delete == 0){
            echo "Não deletou";
        }
    }
?>