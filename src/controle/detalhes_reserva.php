<?php
    //Incluir a conexão com banco de dados
    include_once ('conexao.php');

    $cod_reserva = filter_input(INPUT_POST, 'cod_reserva', FILTER_SANITIZE_STRING);
    
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $result_reserva = "SELECT reserva.cod_reserva, reserva.data_inicio, reserva.data_fim, reserva.observacoes, reserva.descricao, reserva.responsavel, reserva.status, funcionario.nome FROM reserva INNER JOIN funcionario ON reserva.responsavel = funcionario.cod_funcionario INNER JOIN sala ON reserva.sala = sala.cod_sala WHERE cod_reserva=$cod_reserva;";
    $resultado_reserva = mysqli_query($poti_con, $result_reserva);
   
    if(($resultado_reserva) AND ($resultado_reserva->num_rows != 0 )){
        while($row_reserva = mysqli_fetch_assoc($resultado_reserva)){                
                $reserva ="
                </div>
                <div class='dados_modal'>
                    <h4>".$row_reserva['Assunto']."</h4>
                    <p><b>Data de início:</b> ".$row_reserva['data_inicio']."</p>
                    <p><b>Data de encerramento:</b> ".$row_reserva['data_fim']."</p>
                    <p><b>Responsável:</b> ". $row_reserva['responsavel'] ."</p>
                    <p><b>Status do evento:</b> ". $row_reserva['status'] ."</p>
                    <p><b>Observações:</b> ". $row_reserva['observacoes'] ."</p>
                    <p><b>Local:</b> ". $row_reserva['sala'] ."</p>
                </div>
                ";
                echo $reserva;

        }
    }else{
        echo "Falha ao carregar os dados";
    }
    ?>