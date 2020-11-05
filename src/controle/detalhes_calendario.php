<?php

include 'conexao.php';

$query_events = "SELECT * FROM reserva;";
$result = mysqli_query($poti_con, $query_events) or die(mysqli_error($poti_con));

$eventos = [];

while($row_events = mysqli_fetch_assoc($result)){
    $cod_reserva = $row_events['cod_reserva'];
    $assunto = $row_events['Assunto'];
    $descricao = $row_events['descricao'];
    $data_inicio = $row_events['data_inicio'];
    $data_fim = $row_events['data_fim'];
    
    $eventos[] = [
        'id' => $cod_reserva, 
        'title' => $assunto, 
        'color' => 'green', 
        'start' => $data_inicio, 
        'end' => $data_fim,
        ];
}

echo json_encode($eventos);
?>