<?php
    require_once('../../controle/conexao.php');
    $query_funcionario = "SELECT cod_funcionario, nome FROM funcionario;";
    $result_funcionario = mysqli_query($poti_con, $query_funcionario) or die(mysqli_error($poti_con));
    
?>