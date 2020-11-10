<?php
    //include('conexao.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    $logado = $_SESSION['cod_funcionario'];

    $query_busca_email = "SELECT email FROM funcionario WHERE cod_funcionario = $logado;";
    $result_email = mysqli_query($poti_con, $query_busca_email) or die(mysqli_error($poti_con));
    $email_logado = mysqli_fetch_assoc($result_email);

    $query = "SELECT cod_comunicado FROM comunicado_cip";
    $result = mysqli_query($poti_con, $query) or die(mysqli_error($poti_con));
    $total_de_cips = mysqli_num_rows($result);
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
    $query_table = "SELECT comunicado_cip.titulo, comunicado_cip.data_emissao, comunicado_cip.autor, comunicado_cip.cod_comunicado, funcionario.nome FROM comunicado_cip INNER JOIN funcionario ON comunicado_cip.autor = funcionario.cod_funcionario WHERE funcionario.email LIKE '%". $email_logado['email'] . "%' LIMIT $lista_inicio, $limite_dados;";
    $result_table = mysqli_query($poti_con, $query_table) or die(mysqli_error($poti_con));

    // numero de páginas que a table vai ter
    $numero_de_paginas = ceil($total_de_cips/$limite_dados);
?>
