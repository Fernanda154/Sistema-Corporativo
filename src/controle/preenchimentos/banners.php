<?php
    //require_once('../../controle/conexao.php');
    $query_banner = "SELECT banner.cod_banner, banner.nome, banner.tamanho, banner.autor, funcionario.nome as autor FROM banner INNER JOIN funcionario ON banner.autor = funcionario.cod_funcionario;";
    $result_banner = mysqli_query($poti_con, $query_banner) or die(mysqli_error($poti_con));
    $total_de_banner = mysqli_num_rows($result_banner);

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
    $query_table = "SELECT banner.cod_banner, banner.nome, banner.tamanho, banner.autor, funcionario.nome as autor FROM banner INNER JOIN funcionario ON banner.autor = funcionario.cod_funcionario LIMIT $lista_inicio, $limite_dados;";
    $result_table = mysqli_query($poti_con, $query_table) or die(mysqli_error($poti_con));
    // numero de páginas que a table vai ter 
    $numero_de_paginas = ceil($total_de_banner/$limite_dados);
?>