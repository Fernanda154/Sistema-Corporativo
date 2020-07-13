<?php
    require_once("conexao.php");

    $nome = $_POST['nome'];
    $especificacoes = $_POST['especificacoes'];
    $status = $_POST['status'];
    if($_POST['crud_sala'] == "Cadastrar"){
        if(isset($nome) and isset($especificacoes) and isset($status)){
            $insert_query = "INSERT INTO sala (`nome`, `especificacoes`, `status`) VALUES '$nome', '$especificacoes', '$status';";
            $result_insert = mysqli_query($poti_con, $insert_query) or die(mysqli_error($poti_con));
            if($result_insert == 0){
                echo "Não inseriu";
            }
        }
        
    }
    if($_POST['crud_sala'] == "Atualizar"){
        $novo_nome = $_POST['novo_nome'];
        $novas_especificacoes = $_POST['novas_especificacoes'];
        $novo_status = $_POST['novo_status'];
        $cod_sala = $_POST['cod_sala'];
        $update_query = "UPDATE sala SET nome = '$novo_nome', especificacoes = '$novas_especificacoes', status = '$status' WHERE cod_sala = $cod_sala;";
        $result_update = mysqli_query($poti_con, $update_query) or die(mysqli_error($poti_con));
        if($result_update == 0){
            echo "Não atualizou";
        }
    }
    if($_POST['crud_cargo'] == "Deletar"){
        $cod_cargo = $_POST['cod_'];
        $delete_query = "DELETE FROM cargo WHERE cod_cargo = $cod_cargo";
        $result_delete = mysqli_query($poti_con, $delete_query) or die(mysqli_error($poti_con));
        if($result_delete == 0){
            echo "Não deletou";
        }
    }

?>