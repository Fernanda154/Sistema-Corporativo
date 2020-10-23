<?php 
    require_once('conexao.php');
    //Inicia a sessão para salvar os dados de quem inseriu o comunicado.
    if (!isset($_SESSION)) {
        session_start();
    }
    $solicitante = $_SESSION['cod_funcionario'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $assunto = $_POST['assunto'];
    $descricao = $_POST['descricao'];
    $comentario = $_POST['comentario'];

    if(isset($_POST['inserir'])){
        $query_inserir = "INSERT INTO `reserva`
        (
        `data_inicio`,
        `data_fim`,
        `descricao`,
        `comentario`,
        `solicitante`,
        `Assunto`,
        `status`)
        VALUES
        (
        '$data_inicio',
        '$data_fim',
        '$descricao',
        '$comentario',
        '$solicitante',
        '$assunto',
        'Aguardando avaliação');";
        $result = mysqli_query($poti_con, $query_inserir) or die(mysqli_error($poti_con));
        if($result != false){
            header("Location:  ../views/acesso_administrativo/reservas.php");
        }
    }
?>