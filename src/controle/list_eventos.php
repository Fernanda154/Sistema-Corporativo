<?php
/*
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

include 'conexao.php';

$query_events = "SELECT reserva.assunto,reserva.cod_reserva, reserva.data_inicio, reserva.data_fim, reserva.status, reserva.solicitante, funcionario.nome as solicitante FROM reserva INNER JOIN funcionario ON reserva.solicitante = funcionario.cod_funcionario;";

$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['cod_reserva'];
    $title = $row_events['assunto'];
    $color = "green"
    $start = $row_events['data_inicio'];
    $end = $row_events['data_fim'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $title, 
        'color' => $color, 
        'start' => $start, 
        'end' => $end, 
        ];
}

echo json_encode($eventos);