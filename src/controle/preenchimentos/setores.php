<?php
    require_once('../../controle/conexao.php');
    $query_setores = "SELECT cod_setor, nome FROM setor;";
    $result_setores = mysqli_query($poti_con, $query_setores) or die(mysqli_error($poti_con));
    
?>