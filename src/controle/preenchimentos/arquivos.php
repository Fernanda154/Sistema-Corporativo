<?php
    $query_arquivos = "SELECT cod_documento, nome, tamanho, caminho FROM documento;";
    $result_arquivos = mysqli_query($poti_con, $query_arquivos) or die(mysqli_error($poti_con));
    $total_de_arquivos = mysqli_num_rows($result_arquivos);
?>