<?php
    require_once("conexao.php");

    $nomenclatura = $_POST['nomenclatura'];
    if($_POST['inserir'] == "Cadastrar"){
        if(isset($nomenclatura)){
            $insert_query = "INSERT INTO cargo (`nomenclatura`) VALUES ('$nomenclatura');";
            $result_insert = mysqli_query($poti_con, $insert_query) or die(mysqli_error($poti_con));
            header("Location: ../views/acesso_administrativo/cargos.php");

            if($result_insert == 0){
                echo "Não inseriu";
            }
        }
        
    }
?>