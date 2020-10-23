<?php
//require_once('../conexao.php');
$query_documento = "SELECT cod_documento, nome, caminho FROM documento;";
$result_documento = mysqli_query($poti_con, $query_documento) or die(mysqli_error($poti_con));
$total_de_documentos = mysqli_num_rows($result_documento);

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
    $query_table = "SELECT documento.nome, documento.cod_documento, documento.tamanho, documento.autor, funcionario.nome as autor FROM documento INNER JOIN Funcionario ON documento.autor = funcionario.cod_funcionario LIMIT $lista_inicio, $limite_dados;";
    $result_table = mysqli_query($poti_con, $query_table) or die(mysqli_error($poti_con));
    // numero de páginas que a table vai ter 
    $numero_de_paginas = ceil($total_de_documentos/$limite_dados);
?>