<?php
//require_once('../conexao.php');
$query_comunicado = "SELECT cod_publicacao FROM publicacao;";
$result_comunicado = mysqli_query($poti_con, $query_comunicado) or die(mysqli_error($poti_con));
$total_de_comunicados = mysqli_num_rows($result_comunicado);

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
    $query_table = "SELECT publicacao.titulo, publicacao.texto, publicacao.cod_publicacao, publicacao.data_publicacao, publicacao.autor, funcionario.nome as autor FROM publicacao INNER JOIN Funcionario ON publicacao.autor = funcionario.cod_funcionario LIMIT $lista_inicio, $limite_dados;";
    $result_table = mysqli_query($poti_con, $query_table) or die(mysqli_error($poti_con));
    // numero de páginas que a table vai ter 
    $numero_de_paginas = ceil($total_de_comunicados/$limite_dados);
?>