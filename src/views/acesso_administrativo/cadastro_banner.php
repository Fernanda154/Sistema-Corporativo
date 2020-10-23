<?php
    include_once("../../controle/conexao.php");
    include_once("../../controle/preenchimentos/select_funcionarios.php");
    include('../../controle/preenchimentos/setores.php');
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
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/cadastro_banner.css">
    
</head>
<body>
    <div class="container">
        <form action="../../controle/crud_banner.php" class="form_cadastro" method="POST" enctype="multipart/form-data">
            <h4>ADICIONAR BANNER</h4>
            <br>
                    <label for="autor">Selecione o autor do arquivo:</label>
                    <select name="autor" class="form-control" id="autor">
                    <option value="0">Selecione o autor:</option>
                    <?php
                    while ($array_funcionarios = mysqli_fetch_assoc($result_select_funcionarios)) {
                        echo "<option value='".$array_funcionarios['cod_funcionario']."'>".utf8_encode($array_funcionarios['nome'])."</option>";
                    }
                    ?>
                    </select>
                    <br>
                    <label for="banner">Anexe o banner:</label>
                    <input type="file" name="banner" onChange="previaImagem()" class="form-control" id="banner">
                    <br>
                    <!--PRÉVIA DA IMAGEM COM JQUERY-->
                    <script>
                        function previaImagem(){
                            var banner = document.querySelector('input[name = banner]').files[0];
                            var previa = document.querySelector('.banner-view');
                            var reader = new FileReader();
                            reader.onloadend = function () {
                                previa.src = reader.result;
                            }                       
                            if(banner){
                                reader.readAsDataURL(banner);
                            }else{
                                previa.src = "";
                            }
                        }
                    </script>
                    <img class='banner-view' style="width: 200;" src='http://localhost/poticorp/Sistema-Corporativo/src/img/icons8-fotografia-60.png' alt='Ilustração para indicar prévia do banner.'>
                    <br>
                    <label for="comentario">Comentário:</label>
                    <textarea name="comentario" id="comentario" cols="30" class="form-control" rows="11"></textarea>
                    <br>
            <input type="submit" name="inserir" class="btn btn-primary" value="Cadastrar">
            <a href="banners.php"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
        </form>
    </div>
</body>
</html>