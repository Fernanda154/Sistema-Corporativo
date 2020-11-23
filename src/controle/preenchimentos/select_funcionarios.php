<?php
    $query_select_funcionarios = "SELECT * FROM funcionario";
    $result_select_funcionarios = mysqli_query($poti_con, $query_select_funcionarios) or die(mysqli_error($poti_con));
    
?>