<?php
    //require_once('../../controle/conexao.php');
    $query_reservas = "SELECT cod_reserva, data_inicio, assunto FROM reserva;";
    $result_reservas = mysqli_query($poti_con, $query_reservas) or die(mysqli_error($poti_con));
    $total_de_reservas = mysqli_num_rows($result_reservas);

    //Limite de dados a serem exibidos
    $limite_dados = 10;
    $pagina = 0;
    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }
    $pagina_atual = intval($pagina);

    $pagina_atual = $pagina_atual > 0 ? $pagina_atual - 1 : 0; 



    $lista_inicio = $limite_dados * $pagina_atual;
    //Query de busca funcionarios para tabela1
    $query_table = "SELECT reserva.assunto,reserva.cod_reserva, reserva.data_inicio, reserva.status, reserva.solicitante, funcionario.nome as solicitante FROM reserva INNER JOIN funcionario ON reserva.solicitante = funcionario.cod_funcionario LIMIT $lista_inicio, $limite_dados;";
    $result_table = mysqli_query($poti_con, $query_table) or die(mysqli_error($poti_con));
    // numero de páginas que a table vai ter 
    $numero_de_paginas = ceil($total_de_reservas/$limite_dados);
?>