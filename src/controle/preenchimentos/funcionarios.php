<?php
    //require_once('../../controle/conexao.php');
    $query_funcionario = "SELECT cod_funcionario, nome FROM funcionario;";
    $result_funcionario = mysqli_query($poti_con, $query_funcionario) or die(mysqli_error($poti_con));
    $total_de_funcionarios = mysqli_num_rows($result_funcionario);

    //Query de busca de aniversariantes 
    $query_aniversariantes = "SELECT nome, data_nascimento, DATE_FORMAT(data_nascimento,'%d/%m') AS dataformatada  FROM funcionario WHERE permissao != 99 AND data_nascimento IS NOT NULL AND MONTH(data_nascimento) = MONTH(NOW()) AND DAY(data_nascimento) = DAY(NOW()) ";
    $result_aniversariante = mysqli_query($poti_con, $query_aniversariantes) or die(mysqli_error($poti_con));
    $total_de_aniversariantes = mysqli_num_rows($result_aniversariante);



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
    $query_table = "SELECT funcionario.nome, funcionario.ramal, funcionario.cod_funcionario, funcionario.email, funcionario.login, setor.nome as setor, setor.sigla, cargo.nomenclatura FROM funcionario INNER JOIN Setor ON funcionario.setor = Setor.cod_setor INNER JOIN Cargo ON funcionario.cargo = Cargo.cod_cargo LIMIT $lista_inicio, $limite_dados;";
    $result_table = mysqli_query($poti_con, $query_table) or die(mysqli_error($poti_con));
    // numero de páginas que a table vai ter 
    $numero_de_paginas = ceil($total_de_funcionarios/$limite_dados);
?>