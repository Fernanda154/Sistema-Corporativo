<?php
    $query_reservas = "SELECT cod_reserva, assunto, data_inicio FROM reserva;";
    $result_reservas = mysqli_query($poti_con, $query_reservas) or die(mysqli_error($poti_con));
    $total_de_reservas = mysqli_num_rows($result_reservas);
?>