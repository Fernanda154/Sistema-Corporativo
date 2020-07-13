<?php
    include_once("../../controle/conexao.php");
    include('../../controle/preenchimentos/setores.php');
    include('../../controle/preenchimentos/cargos.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potigás</title>

    <!-- Importações para o plugin de corte de imagem-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://deepliquid.com/Jcrop/js/jquery.Jcrop.min.js"></script>
    <script src="../../includes/tapmodo-Jcrop-1902fbc/js/jquery.Jcrop.js"></script>
    <link rel="stylesheet" href="../../includes/tapmodo-Jcrop-1902fbc/css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="../../includes/tapmodo-Jcrop-1902fbc/demos/demo_files/demos.css" type="text/css" />
    
    <script src="../../js/corta_imagens.js"></script>

    <style type="text/css">
        body{
        margin:0 auto;
        padding:10px;
        }
        h1{
        font-size:20px;
        font-family:Arial;
        color:#666666;
        }
        input{
        margin-bottom:7px;
        }
    </style>
</head>
<body>
    <form action="insercoes.php" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome completo:</label>
        <input type="text" name="nome_funcionario" id="nome_funcionario" placeholder="Nome completo">

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" placeholder="(DDD)X XXXX-XXXX">

        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="nome.sobrenome@potigas.com.br">

        <label for="ramal">Ramal:</label>
        <input type="ramal" name="ramal" id="ramal" placeholder="XXXX">

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">

        <label for="conf_senha">Confirme a senha:</label>
        <input type="password" name="conf_senha" id="conf_senha">

        <label for="login">Login:</label>
        <input type="text" name="login" id="login">

        <label for="foto">Insira uma foto do funcionário:</label>
        <input type="file" name="foto" id="foto">


        <label for="cargo">Selecione o cargo que o funcionário irá ocupar:</label>
        <select name="cargo" id="cargo">
            <option value="0">Selecione o cargo</option>
            <?php
              while ($array_cargos = mysqli_fetch_assoc($result_cargos)) {
                  echo "<option value='".$array_cargos['cod_cargo']."'>".utf8_encode($array_cargos['nomenclatura'])."</option>";
              }
            ?>
        </select>

        <label for="setor">Selecione o setor onde o funcionário irá trabalhar:</label>
        <select name="setor" id="setor">
            <option value="0">Selecione o setor</option>
            <?php
              while ($array_setores = mysqli_fetch_assoc($result_setores)) {
                  echo "<option value='".$array_setores['cod_setor']."'>".utf8_encode($array_setores['nome'])."</option>";
              }
            ?>
        </select>

        <fieldset>
            <legend>Permissões do usuário</legend>
            <label for="banner">Poderá publicar banners?</label>
            <input type="checkbox" name="permissao_banner" id="banner" value="1">

            <label for="documento">Poderá publicar documentos?</label>
            <input type="checkbox" name="permissao_documento" id="documento" value="2">

            <label for="publicacao">Poderá inserir comunicados?</label>
            <input type="checkbox" name="permissao_publicacao" id="publicacao" value="3">

            <label for="reserva">Poderá avaliar reservas?</label>
            <input type="checkbox" name="permissao_reserva" value="4">
        </fieldset>

        <input type="submit" name="crud_funcionario" value="Cadastrar">
    </form>

    <div class="article">
        <h1>Crop jQuery</h1>
        <!-- Imagem que vamos inserir -->
       <!-- <img src="../../includes/tapmodo-Jcrop-1902fbc/demos/demo_files/pool.jpg" id="cropbox" />-->
 
        <form>
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <input type="file" id="arquivo" />
            <input onclick="submitForm();" type="button" id="sendButton" value="Enviar" />
        </form>
        <output id="result"></output>
    </div>
</body>

</html>