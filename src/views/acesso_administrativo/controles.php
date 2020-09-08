<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/controles.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    
    <title>Potigás</title>
</head>
<body scroll="no">
    <?php
        require_once('../../controle/conexao.php');
        include('../../includes/nav.php');
        include('menu.php');
    ?>
    <div class="container" scroll="no">
        <div class="card-group">
            <div class="card" onclick="window.location='funcionarios.php';">
                <img class="icons_controle" src="../../img/icons8-grupos-de-usuários-52.png" alt="Ilustração para opção de funcionários">
                <div>
                    <p class="card-title">Funcionários</p>
                </div>
            </div>
            <div class="card" onclick="window.location='cadastro_publicacao.php';">
                <img class="icons_controle" src="../../img/icons8-megafone-52.png" alt="Ilustração para opção de comunicados">
                <div class="card-body">
                    <p class="card-title">Comunicados</p>
                </div>
            </div>
            <div class="card" onclick="window.location='cadastro_.php';">
                <img class="icons_controle" src="../../img/icons8-hora-extra-52.png" alt="Ilustração para opção de reservas">
                <div class="card-body">
                    <p class="card-title">Reservas</p>
                </div>
            </div>
            <br>
            <div class="card">
                <img class="icons_controle" src="../../img/icons8-arquivo-52.png" alt="Ilustração para opção de arquivos">
                <div class="card-body">
                    <p class="card-title">Documentos</p>
                </div>
            </div>
            <div class="card">
                <img class="icons_controle" src="../../img/icons8-fotografia-52.png" alt="Ilustração para opção de banners">
                <div class="card-body">
                    <p class="card-title">Banners</p>
                </div>
            </div>
            <div class="card">
                <img class="icons_controle" src="../../img/icons8-relógio-52.png" alt="Ilustração para opção de reservas">
                <div class="card-body">
                    <p class="card-title">Acessos</p>
                </div>
            </div>
            <br>
            <div class="card">
                <img class="icons_controle" src="../../img/icons8-porta-52.png" alt="Ilustração para opção de salas">
                <div class="card-body">
                    <p class="card-title">Salas</p>
                </div>
            </div>
            <div class="card">
                <img class="icons_controle" src="../../img/icons8-estrutura-em-árvore-52.png" alt="Ilustração para opção de setores">
                <div class="card-body">
                    <p class="card-title">Setores</p>
                </div>
            </div>
            <div class="card">
                <img class="icons_controle" src="../../img/icons8-recepção-52.png" alt="Ilustração para opção de cargos">
                <div class="card-body">
                    <p class="card-title">Cargos</p>
                </div>
            </div>
        </div> 
</body>
</html>