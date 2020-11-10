<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/administracao.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Potigás</title>
</head>
<body>
    <?php
        require_once('../controle/conexao.php');
        include('../includes/nav.php');
        include('menu.php');
        include('../controle/preenchimentos/funcionarios.php');
    ?>
    <div class="container">
      <h1>
        ADMINISTRAÇÃO
      </h1>
      <br/>
      <h2>
        Conselho de Administração
      </h2>
      <blockquote>
        <p>
          Tiburcio Batista da Silva Filho (Conselheiro) <br />
          Ricardo Antônio Cavalcanti Araújo (Conselheiro) <br />
          Diogo Pignataro de Oliveira (Conselheiro) <br />
          Eric Marcos Futino (Conselheiro) <br />
          José Mário Gurgel de Oliveira Junior (Conselheiro) <br />
          Ricardo Ferreira Pinheiro (Conselheiro)
        </p>
      </blockquote>
      <h2>Conselho Fiscal</h2>
      <blockquote>
        <p>
          Sérgio José de Barros (Conselheiro) <br />
          Eduardo Abrahão de Souza (Conselheiro) <br />
          Pedro José Xavier da Costa (Conselheiro) <br />
        </p>
      </blockquote>
        <h2>
          Diretoria Executiva
        </h2>
      <blockquote>
        <p>
          Larissa Dantas Gentile (Presidente) <br />
          Sérgio Henrique Guimarães de Paula (T&eacute;cnico e Comercial) <br />
          Eliana de Menezes Bandeira (Administrativo e Financeiro) <br />
        </p>
        </blockquote>
        <h2>Secretaria Geral</h2>
        <blockquote>
          <p>
            Maria Cecília Bussoni <br>
          </p>
        </blockquote>
        <h2>Assessores</h2>
        <blockquote>
          <p>
                             Enilce Dias Leão Barbalho (Presidência) <br />
                             Cristiane Kelly Macedo da Silva Oliveira (Comunicação) <br />
                             Marina Melo Alves Siqueira (Especial da Presidência) <br />
                             Luis Gustavo Alves Smith (Jurídico) <br />
                             Emile Yasser Safieh (Planejamento) <br />
                        </p>
                   </blockquote>
                   <h2>Gerentes</h2>
                   <blockquote>
                        <p>
                             Aluisio Azevedo Neto (Opera&ccedil;&atilde;o e Manuten&ccedil;&atilde;o) <br />
                             Antônio Saldanha Filho (Base Mossoró) <br />
                             Edaniela Galvão Ramalho (RH) <br />
                             Thiago Andr&eacute; do Nascimento Fernandes  (SMS) <br />
                             Ivomar de Lima Godeiro (Financeiro) <br />
                             Jos&eacute; Augusto Dantas de Rezende (T&eacute;cnico) <br />
                             Franciney Batista de Souza (Comercial) <br />
                             F&aacute;bio Ronaldo Barbosa Vilar de Queiroz (TI) <br />
                             Jairo César Dourado Pinto (Contabilidade) <br/>
                             Ricardo Wagner Guilhermino Pereira (Suprimentos) <br />
                        </p>
                   </blockquote>
    </div>
    <!--IMPORTAÇÕES JAVASCRIPT PARA O MODAL(BOODSTRAP)-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
</body>
</html>
