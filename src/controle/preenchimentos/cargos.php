<?php
    require_once('../../controle/conexao.php');
    $query_cargos = "SELECT cod_cargo, nomenclatura FROM cargo;";
    $result_cargos = mysqli_query($poti_con, $query_cargos) or die(mysqli_error($poti_con));
?>