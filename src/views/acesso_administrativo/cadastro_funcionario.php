<?php
    include_once("../../controle/conexao.php");
    include('../../includes/nav.php');
    include('menu.php');
    include('../../controle/preenchimentos/setores.php');
    include('../../controle/preenchimentos/cargos.php');
    include('../../controle/preenchimentos/select_setor.php');
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
    <link rel="stylesheet" href="../../css/cadastro_funcionario.css">
    <script src="../../js/validaUsuario.js"></script>
</head>
<body>
    
    <div class="container">
        <form action="../../controle/crud_funcionario.php" class="form_cadastro" method="POST" enctype="multipart/form-data">
            <h4>CADASTRO DE FUNCIONÁRIO</h4>
            <div class="row">
                <div class="col-sm-8">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome_funcionario" id="nome_funcionario" class="form-control" placeholder="Nome completo" required>
                    
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="(DDD)X XXXX-XXXX" required>
                </div>
                <div class="col-sm-4">
                    <div class="coluna_foto">
                         <!--PRÉVIA DA IMAGEM COM JQUERY-->
                        <script>
                            function previaImagem(){
                                var imagem = document.querySelector('input[name = foto]').files[0];
                                var previa = document.querySelector('.foto_funcionario');
                                var reader = new FileReader();
                                reader.onloadend = function () {
                                    previa.src = reader.result;
                                }                       
                                if(imagem){
                                    reader.readAsDataURL(imagem);
                                }else{
                                    previa.src = "";
                                }
                            }
                            var nome = document.getElementById('nome').value();
                            var telefone = document.getElementById('telefone').value();
                            var dataNascimento = document.getElementById('data_nascimento').value();
                            var email = document.getElementById('email').value();
                            var ramal = document.getElementById('ramal').value();
                            var login = document.getElementById('login').value();
                            var senha = document.getElementById('senha').value();
                            var confirmacaoSenha = document.ElementById('conf_senha').value();
                            var setor = document.getElementById('setor').value();

                            function validaUsuario(){
                                if(nome == ""){
                                    alert("Campo nome não pode estar vazio.");
                                }
                                if(telefone == ""){
                                    alert("Campo de telefone não pode estar vazio.");
                                }
                            }
                        </script>
                        <img class='foto_funcionario' src='http://localhost/poticorp/Sistema-Corporativo/src/img/blank-profile-picture-973460_1280.png' alt='Ilustração para opção de editar'>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="data_nascimento">Data de nascimento:</label>
                    <input type="date" id="data_nascimento" class="form-control" name="data_nascimento" required>
                </div>
                <div class="col">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="nome.sobrenome@potigas.com.br" required>
                
                </div>
                <div class="w-100"></div>
                    <div class="col"> 
                        <label for="ramal">Ramal:</label>
                        <input type="ramal" name="ramal" id="ramal" class="form-control" placeholder="XXXX" required>
                    </div>
                <div class="col">
                    <label for="login">Login:</label>
                    <input type="text" name="login" class="form-control" id="login" required>
                </div>
                <div class="w-100"></div>
                    <div class="col"> 
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" class="form-control" id="senha" required>
                    </div>
                <div class="col">
                    <label for="conf_senha">Confirme a senha:</label>
                    <input type="password" name="conf_senha" class="form-control" id="conf_senha" required>
                </div>
                <div class="w-100"></div>
                    <div class="col"> 
                        <label for="cargo">Selecione o cargo que o funcionário irá ocupar:</label>
                        <select name="cargo" class="form-control" id="cargo" required>
                            <option value="">Selecione o cargo</option>
                            <?php
                            while ($array_cargos = mysqli_fetch_assoc($result_cargos)) {
                                echo "<option value='".$array_cargos['cod_cargo']."'>".utf8_encode($array_cargos['nomenclatura'])."</option>";
                            }
                            ?>
                        </select>
                    </div>
                <div class="col">
                    <label for="setor">Selecione o setor onde o funcionário irá trabalhar:</label>
                    <select name="setor" class="form-control" id="setor" required>
                        <option value="">Selecione o setor</option>
                        <?php
                        while ($array_setores = mysqli_fetch_assoc($result_select_setor)) {
                            echo "<option value='".$array_setores['cod_setor']."'>".utf8_encode($array_setores['nome'])."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="w-100"></div>
                    <div class="col"> 
                        <label for="customFile">Selecione uma foto:</label>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" onChange="previaImagem()" id="customFile">
                            <label class="custom-file-label" for="customFile">Selecionar foto</label>
                        </div>
                    </div>
                <div class="col">
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
                </div>
            </div>
            <input type="submit" name="inserir" class="btn btn-primary" onSubmit="validaUsuario()" value="Cadastrar">
            <a href="funcionarios.php"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
            
            </form>
    </div>

</body>

</html>