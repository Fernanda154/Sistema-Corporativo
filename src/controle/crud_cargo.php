<?php
    require_once("conexao.php");

    $nomenclatura = $_POST['nomenclatura'];
    if($_POST['crud_cargo'] == "Cadastrar"){
        if(isset($nomenclatura)){
            $insert_query = "INSERT INTO cargo (`nomenclatura`) VALUES '$nomenclatura';";
            $result_insert = mysqli_query($poti_con, $insert_query) or die(mysqli_error($poti_con));
            if($result_insert == 0){
                echo "Não inseriu";
            }
        }
        
    }
    if($_POST['crud_cargo'] == "Atualizar"){
        $nova_nomenclatura = $_POST['nova_nomenclatura'];
        $cod_cargo = $_POST['cod_cargo'];
        $update_query = "UPDATE cargo SET nomenclatura = '$nova_nomenclatura' WHERE cod_cargo = $cod_cargo;";
        $result_update = mysqli_query($poti_con, $update_query) or die(mysqli_error($poti_con));
        if($result_update == 0){
            echo "Não atualizou";
        }
    }
    if($_POST['crud_cargo'] == "Deletar"){
        $cod_cargo = $_POST['cod_cargo'];
        $delete_query = "DELETE FROM cargo WHERE cod_cargo = $cod_cargo";
        $result_delete = mysqli_query($poti_con, $delete_query) or die(mysqli_error($poti_con));
        if($result_delete == 0){
            echo "Não deletou";
        }
    }
?>