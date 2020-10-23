<?php
//require_once('../conexao.php');
$query_setor = "SELECT cod_setor, nome FROM setor;";
$result_setor = mysqli_query($poti_con, $query_setor) or die(mysqli_error($poti_con));
$total_de_setores = mysqli_num_rows($result_setor);

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
    $query_table = "SELECT setor.cod_setor, setor.nome as setor, setor.sigla, setor.gerente, funcionario.nome FROM setor INNER JOIN funcionario ON setor.gerente = funcionario.cod_funcionario LIMIT $lista_inicio, $limite_dados;";
    $result_table = mysqli_query($poti_con, $query_table) or die(mysqli_error($poti_con));
    // numero de páginas que a table vai ter 
    $numero_de_paginas = ceil($total_de_setores/$limite_dados);
?>