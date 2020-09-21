<?php
//Incluir a conexão com banco de dados
include_once ('conexao.php');

    $palavra = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
    //Limite de dados a serem exibidos
    $limite_dados = 10;
    $pagina = 0;
    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }
    $pagina_atual = intval($pagina);
    $pagina_atual = $pagina_atual > 0 ? $pagina_atual - 1 : 0; 



    $lista_inicio = $limite_dados * $pagina_atual;
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $result_reserva = "SELECT reserva.assunto, reserva.data_inicio, reserva.status, reserva.solicitante FROM reserva INNER JOIN funcionario ON reserva.solicitante = funcionario.cod_funcionario WHERE reserva.assunto LIKE '%$palavra%' OR reserva.data_inicio LIKE '%$palavra%' OR reserva.solicitante LIKE '%$palavra%' OR reserva.status LIKE %$palavra%  LIMIT $lista_inicio, $limite_dados;";
    $resultado_reserva = mysqli_query($poti_con, $result_reserva);
    if(($resultado_reserva) AND ($resultado_reserva->num_rows != 0 )){
        while($row_reserva = mysqli_fetch_assoc($resultado_reserva)){
            echo "<tr>
                    <th><input type='checkbox' id='vehicle3' name='vehicle3' value=".$row_reserva['cod_reserva']."></th>
                    <td>". $row_reserva['assunto'] ."</td>
                    <td>". $row_reserva['data_inicio'] ."</td>
                    <td>". $row_reserva['solicitante']."</td>
                    <td>". $row_reserva['status']."</td>
                    <td> <img class='icons_opcoes' src='../../img/icons8-mais-zoom-52.png' alt='Ilustração para opção de ver mais detalhes'  data-toggle='modal' data-target='#exampleModalCenter'> <img class='icons_opcoes' src='../../img/icons8-editar-52.png' alt='Ilustração para opção de editar'> <img class='icons_opcoes' src='../../img/icons8-excluir-52.png' alt='Ilustração para opção de apagar'></td>
                </tr>
                ";
        }
    }else{
        echo "Nenhum usuário encontrado ...";
    }
    ?>