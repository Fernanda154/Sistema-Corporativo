<?php
    require_once('conexao.php');
    //Inicia a sessão para salvar os dados de quem inseriu o comunicado.
    if (!isset($_SESSION)) {
        session_start();
    }

    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $data_publicacao = date('Y/m/d');
    $autor = $_POST['autor'];
    $comentario = $_POST['comentario'];
    $responsavel = $_SESSION['cod_funcionario'];
    $status = $_POST['status'];

    if(isset($_POST['inserir'])){
        $query_inserir = "INSERT INTO `publicacao`
        (`titulo`,
        `texto`,
        `data_publicacao`,
        `comentario`,
        `responsavel`,
        `autor`,
        `status`)
        VALUES
        ('$titulo',
        '$texto',
        '$data_publicacao',
        '$comentario',
        '$responsavel',
        '$autor',
        $status);
        ";
        $result_publicacao = mysqli_query($poti_con, $query_inserir) or die(mysqli_error($poti_con));
        if($result_publicacao != false){
            header("Location: ../views/acesso_administrativo/comunicados.php");
        }

    }
?>