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
    include('../../controle/preenchimentos/select_funcionarios.php');
    include('../../includes/nav.php');
    include('menu.php');
    $query_emails = "SELECT email FROM funcionario";
    $result_emails = mysqli_query($poti_con, $query_emails) or die(mysqli_error($poti_con));
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
    <script src="../../includes/ckeditor/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/cadastro_publicacao.css">

</head>

<body>
    <div class="container">
        <form method="POST" action="../../controle/crud_cip.php">
            <h4>ESCREVER CIP</h4>
            <label for="assunto">Assunto: </label>
            <input type="text" class="form-control" name="assunto" id="assunto" required>
            <br>
            <label for="remetentes">Remetentes:</label>
            <select name="remetentes" class="form-control" id="remetentes" multiple="multiple" required>
                <option value="">Selecione:</option>
                <?php
                    while ($array_remetentes = mysqli_fetch_assoc($result_emails)) {
                        echo "<option value='".$array_remetentes['email']."'>".$array_remetentes['email']."</option>";
                    }
                ?>
            </select>
            <br>
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Selecione:</option>
                <option value="1">Ativo</option>
                <option value="2">Desativo</option>
            </select>
            <br>

            <textarea id="editor" class="ckeditor" name="texto" required>

            </textarea>
            <script>

                    var editor = CKEDITOR.replace( 'editor' );
                    CKFinder.setupCKEditor( editor,{
                        filebrowserBrowseUrl: 'ckeditor/ckfinder/ckfinder.html',
                        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserWindowWidth: '1000',
                        filebrowserWindowHeight: '700'
                    } );
            </script>
            <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
            <a href="../cips.php"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
        </form>
    </div>
    <script>
        $("#remetentes").select2({
            tags: true,
            tokenSeparators: [',']
        })
    </script>
</body>
</html>
