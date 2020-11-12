<?php
    require_once('../controle/conexao.php');
    include('../controle/preenchimentos/salas.php');
    $query_reservas = "SELECT reserva.assunto,reserva.cod_reserva, reserva.data_inicio, reserva.data_fim, reserva.status, reserva.solicitante, funcionario.nome as solicitante FROM reserva INNER JOIN funcionario ON reserva.solicitante = funcionario.cod_funcionario;";
    $result = mysqli_query($poti_con, $query_reservas);
    $array_reserva = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>
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
    <script src="../js/detalhes_calendario.js"></script>
    <script src="../js/reservas_para_sala.js"></script>
</head>
<body>
    <?php
        require_once('../controle/conexao.php');
        include('../includes/nav.php');
        include('menu.php');
    ?>
    <div class="container">
        <h4>VERIFICAR DISPONIBILIDADE DE SALAS</h4>
        <select name="sala" id="cod_sala" class="form-control">
            <option value="">Selecione uma sala</option>
            <?php
                while ($array_salas = mysqli_fetch_assoc($result_sala)) {
                    echo "<option value='".$array_salas['cod_sala']."' data-sala='". $array_salas['cod_sala'] ."'>".utf8_encode($array_salas['nome'])."</option>";
                }
            ?>
        </select>
        <input type="submit" class="btn btn-primary buscar" id="buscar" name="buscar" value="Buscar">
        <div class="resultado_da_busca">
        </div>
        <div id="calendario"></div>
        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <dl class="row">
                            <dt class="col-sm-3">Código da reserva</dt>
                            <dd class="col-sm-9" id="id"></dd>

                            <dt class="col-sm-3">Assunto</dt>
                            <dd class="col-sm-9" id="title"></dd>

                            <dt class="col-sm-3">Início do evento</dt>
                            <dd class="col-sm-9" id="start"></dd>

                            <dt class="col-sm-3">Fim do evento</dt>
                            <dd class="col-sm-9" id="end"></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reservas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eventos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <dl class="row">
                            <dt class="col-sm-3">Código da reserva</dt>
                            <dd class="col-sm-9" id="id"></dd>

                            <dt class="col-sm-3">Assunto</dt>
                            <dd class="col-sm-9" id="title"></dd>

                            <dt class="col-sm-3">Início do evento</dt>
                            <dd class="col-sm-9" id="start"></dd>

                            <dt class="col-sm-3">Fim do evento</dt>
                            <dd class="col-sm-9" id="end"></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script src="../js/verificaReservas.js" charset="utf-8"></script>
</body>
</html>
