<?php
    include_once("../../controle/conexao.php");
    include('../../includes/nav.php');
    include('menu.php');

    $query_salas = "SELECT nome, cod_sala FROM sala WHERE status_funcionamento = 1";
    $result_salas = mysqli_query($poti_con, $query_salas) or die(mysqli_error($poti_con));
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potigás</title>

    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/cadastro_reserva.css">

</head>
<body>
    <div class="container">
        <form action="../../controle/crud_reserva.php" class="form_cadastro" method="POST" enctype="multipart/form-data">
            <h4>SOLICITAÇÃO DE RESERVA</h4>
                    <label for="nome">Assunto: </label>
                    <input type="text" name="assunto" id="assunto" class="form-control" required>

                    <label for="descricao">Descrição:</label>
                    <input type="text" name="descricao" class="form-control" id="data_inicio" required>

                    <label for="sala">Sala:</label>
                    <select class="form-control" id="sala" name="sala">
                      <option value="">Selecione a sala</option>
                      <?php
                          while ($array_salas = mysqli_fetch_assoc($result_salas)) {
                              echo "<option value='".$array_salas['cod_sala']."'>".utf8_encode($array_salas['nome'])."</option>";
                          }
                      ?>
                    </select>
                    <label for="data_inicio">Data de início:</label>
                    <input type="date" name="data_inicio" class="form-control" id="data_inicio" required>

                    <label for="data_fim">Data de término:</label>
                    <input type="date" name="data_fim" class="form-control" id="data_inicio" required>

                    <label for="comentario">Comentário:</label>
                    <textarea name="comentario" id="comentario" cols="30" class="form-control" rows="11"></textarea>

            <input type="submit" name="inserir" class="btn btn-primary" value="Cadastrar">
            <a href="reservas.php"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
        </form>
    </div>
</body>
</html>
