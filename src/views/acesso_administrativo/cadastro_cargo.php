<?php
    //AUTORIZAÇÃO DE ACESSO A PÁGINA
    if (!isset($_SESSION)) {
        session_start();
      }
      if($_SESSION['cod_funcionario'] == null){
        header("Location: ../../index.php");
      }
    //-----------------------------------------

    include_once("../../controle/conexao.php");
    include('../../includes/nav.php');
    include('menu.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potigás</title>


    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../includes/ckeditor5-build-classic/ckeditor.js"></script>
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/cadastro_publicacao.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="../../controle/crud_cargo.php">
            <h4>CADASTRO DE CARGO</h4>
            <label for="nomenclatura">Nomenclatura: </label>
            <input type="text" class="form-control" name="nomenclatura" id="nomenclatura" required>
            <br>
            <input type="submit" name="inserir" class="btn btn-primary" value="Cadastrar">
            <a href="cargos.php"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
        </form>
    </div>
    
</body>
</html>