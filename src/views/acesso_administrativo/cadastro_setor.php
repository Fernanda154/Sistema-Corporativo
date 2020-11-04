<?php
        include_once("../../controle/conexao.php");
        include('../../includes/nav.php');
        include('menu.php');
        $query_funcionario = "SELECT cod_funcionario, nome FROM funcionario;";
        $result_funcionario = mysqli_query($poti_con, $query_funcionario) or die(mysqli_error($poti_con));
        $total_de_funcionarios = mysqli_num_rows($result_funcionario);
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
        <form method="POST" action="../../controle/crud_setor.php">
            <h4>CADASTRO DE SETOR</h4>
            <label for="titulo">Nome: </label>
            <input type="text" class="form-control" name="nome" id="nome" required>
            <br>
            <label for="titulo">Sigla: </label>
            <input type="text" class="form-control" name="sigla" id="sigla" required>
            <br>
            <label for="gerente">Gerente: </label>
            <select name="gerente" class="form-control"  id="autor" required>
                <option value="">Selecione:</option>
                <?php
                    while ($array_funcionarios = mysqli_fetch_assoc($result_funcionario)) {
                        echo "<option value='".$array_funcionarios['cod_funcionario']."'>".utf8_encode($array_funcionarios['nome'])."</option>";
                    }
                ?>
            </select>
            <br>
            
            <input type="submit" name="inserir" class="btn btn-primary" value="Cadastrar">
            <a href="setores.php"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
        </form>
    </div>
    
</body>
</html>