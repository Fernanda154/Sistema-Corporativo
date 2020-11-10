<?php
    $query_publicacoes = "SELECT cod_publicacao, titulo, data_publicacao FROM publicacao LIMIT 7;";
    $result_publicacoes = mysqli_query($poti_con, $query_publicacoes) or die(mysqli_error($poti_con));
    $total_de_publicacoes = mysqli_num_rows($result_publicacoes);
?>
