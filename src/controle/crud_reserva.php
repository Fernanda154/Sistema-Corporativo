<?php
    require_once('conexao.php');
    //Inicia a sessão para salvar os dados de quem inseriu o comunicado.
    if (!isset($_SESSION)) {
        session_start();
    }


    if(isset($_POST['inserir'])){
        $solicitante = $_SESSION['cod_funcionario'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $assunto = $_POST['assunto'];
        $descricao = $_POST['descricao'];
        $comentario = $_POST['comentario'];
        $sala = $_POST['sala'];
        $query_inserir = "INSERT INTO `reserva`
        (
        `data_inicio`,
        `data_fim`,
        `descricao`,
        `comentario`,
        `solicitante`,
        `Assunto`,
        `sala`,
        `status`)
        VALUES
        (
        '$data_inicio',
        '$data_fim',
        '$descricao',
        '$comentario',
        '$solicitante',
        '$assunto',
        '$sala',
        'Aguardando avaliação');";
        $result = mysqli_query($poti_con, $query_inserir) or die(mysqli_error($poti_con));
        if($result != false){
            header("Location:  ../views/acesso_administrativo/reservas.php");
        }
    }
    if(isset($_POST['buscar'])){
        $sala = $_POST['sala'];
        $data_atual = date("Y-m-d");
        $query_busca = "SELECT reserva.assunto,reserva.cod_reserva, reserva.data_inicio, reserva.status, reserva.solicitante, funcionario.nome as solicitante FROM reserva INNER JOIN funcionario ON reserva.solicitante = funcionario.cod_funcionario WHERE data_inicio > $data_atual;";
    }
?>
