<?php
//require_once('../conexao.php');
$query_sala = "SELECT cod_sala, nome FROM sala WHERE status_funcionamento = 1;";
$result_sala = mysqli_query($poti_con, $query_sala) or die(mysqli_error($poti_con));


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
    $query_table = "SELECT cod_sala, nome, status_funcionamento FROM sala LIMIT $lista_inicio, $limite_dados;";
    $result_table = mysqli_query($poti_con, $query_table) or die(mysqli_error($poti_con));
    $total_de_salas = mysqli_num_rows($result_table);
    // numero de páginas que a table vai ter 
    $numero_de_paginas = ceil($total_de_salas/$limite_dados);
?>