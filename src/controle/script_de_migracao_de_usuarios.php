<?php
    $host="127.0.0.1";
    $port=3300;
    $socket="";
    $user="root";
    $password="cabeloloco154";
    $dbname="intranet";
    
    $conexao_bd_velho = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ('Could not connect to the database server' . mysqli_connect_error());

    $dbname2="intranet_corporativa";
        
    $conexao_bd_novo = new mysqli($host, $user, $password, $dbname2, $port, $socket)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        
    $query_bd_velho = "SELECT aniversario, cod_usuario FROM tb_usuario ;";
    $result = mysqli_query($conexao_bd_velho, $query_bd_velho);
    while($linha = mysqli_fetch_array($result)){
        $data_nascimento = $linha['admin'];
        $cod_funcionario = $linha['cod_usuario'];
        echo "$data_nascimento</br>";
        $data_format = date("Y-m-d", strtotime($data_nascimento));
        $query_transferencia_de_data = "UPDATE funcionario SET data_nascimento = '$data_format' WHERE cod_funcionario = $cod_funcionario";
        $result_migracacao = mysqli_query($conexao_bd_novo, $query_transferencia_de_data) or die(mysqli_error($conexao_bd_novo));

    }
?>