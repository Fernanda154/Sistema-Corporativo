<?php
    require_once('../controle/conexao.php');
    $query_reservas = "SELECT reserva.assunto,reserva.cod_reserva, reserva.data_inicio, reserva.data_fim, reserva.status, reserva.solicitante, funcionario.nome as solicitante FROM reserva INNER JOIN funcionario ON reserva.solicitante = funcionario.cod_funcionario;";
    $result = mysqli_query($poti_con, $query_reservas);
    $array_reserva = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/apresentacao.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js"></script>
    <title>Potigás</title>
    <!-- IMPORTAÇÕES PARA O CALENDÁRIO -->
    <link href='../css/core/main.min.css' rel='stylesheet' />
    <link href='../css/daygrid/main.min.css' rel='stylesheet' />
    <script src='../js/js-fullcalendar/core/main.min.js'></script>
    <script src='../js/js-fullcalendar/interaction/main.min.js'></script>
    <script src='../js/js-fullcalendar/daygrid/main.min.js'></script>
    <script src='../js/js-fullcalendar/core/locales/pt-br.js'></script>
    <link href='../css/calendario_reservas.css' rel='stylesheet' />
    <script>

            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendario');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'pt-br',
                    plugins: ['interaction', 'dayGrid'],
                    editable: true,
                    eventLimit: true,
                    events: [
                            <?php
                                while($tupla = mysqli_fetch_array($result)){
                            ?>
                                    {
                                        id: '<?php echo $tupla['cod_reserva']; ?>',
                                        title: '<?php echo $tupla['assunto']; ?>',
                                        start: '<?php echo $tupla['data_inicio']; ?>',
                                        end: '<?php echo $tupla['data_fim']; ?>',
                                        color: 'green'
                                    },
                            <?php
                                }
                            ?>
                            ]
                },
                
                );

                calendar.render();
            });

        </script>
</head>
<body>
    <?php
        require_once('../controle/conexao.php');
        include('../includes/nav.php');
        include('menu.php');
    ?>
    <div class="container">
        <div id="calendario"></div>
    </div>
   
</body>
</html>
