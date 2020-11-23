<?php
    include('conexao.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    $cod_logado = $_SESSION['cod_funcionario'];
    if($_POST['submit'] == "Enviar"){
      $assunto = $_POST['assunto'];
      $remetentes = $_POST['remetentes'];
      $autor = $_SESSION['cod_funcionario'];
      $status = $_POST['status'];
      $texto = $_POST['texto'];
      $data_emissao = date('Y/m/d');
      $query_inserir = "INSERT INTO `intranet_corporativa`.`comunicado_cip` (`texto`,`titulo`,`remetentes`,`data_emissao`,`autor`, `responsavel`) VALUES ('$texto','$assunto','$remetentes','$data_emissao',$autor, $cod_logado);";
      $result = mysqli_query($poti_con, $query_inserir) or die(mysqli_error($poti_con));
      if($result != false){
        header("Location: ../views/cips.php");
      }
    }
?>
