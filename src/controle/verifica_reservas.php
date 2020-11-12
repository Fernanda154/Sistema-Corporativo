<?php
    //Incluir a conexão com banco de dados
    include_once ('conexao.php');

    $cod_sala = filter_input(INPUT_POST, 'cod_sala', FILTER_SANITIZE_STRING);
    $hoje = date('Y/m/d');
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $query_busca = "SELECT * FROM reserva WHERE sala = $cod_sala and data_inicio > NOW()";
    $result_busca = mysqli_query($poti_con, $query_busca);

    if(($result_busca) AND ($result_busca->num_rows != 0 )){
        while($row_reservas = mysqli_fetch_assoc($result_busca)){
        $result = "
        <div class='resultado_da_busca'>
          <table class='table table-striped' id='table table-striped'>
                <thead>
                    <tr>
                    <th scope='col'>Evento</th>
                    <th scope='col'>Data de início</th>
                    <th scope='col'>Data de encerramento</th>
                    <th scope='col'>Opções</th>
                    </tr>
                </thead>
                <tbody class='resultado'>
                    <tr>
                      <td>". $row_reservas['Assunto']."</td>
                      <td>". $row_reservas['data_inicio'] ."</td>
                      <td>". $row_reservas['data_fim']."</td>
                      <td><img class='icons_opcoes detalhes' data-funcionario=".$row_reservas['cod_reserva']." src='../img/icons8-mais-zoom-52.png' alt='Ilustração para opção de ver mais detalhes'  data-toggle='modal' data-target='#exampleModalCenter'> </td>
                    </tr>
                </tbody>
            </table>
          </div>";
          echo $result;
        }
    }else{
        echo "Nenhum evento está agendado para esta sala nos próximos dias";
    }
    ?>
