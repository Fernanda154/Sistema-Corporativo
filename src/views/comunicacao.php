<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/funcionarios.css">
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
        <div class="box_table" id="box_table">
            <form method="POST" id="form-pesquisa" action="">
                <input type="search" class="busca" id="busca" name="busca" alt="table table-striped" placeholder="Buscar">
            </form>
            
            <table class="table table-striped" id="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ramal</th>
                    <th scope="col">Setor</th>
                    <th scope="col">email</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="resultado">
                    <?php
                        while ($array_funcionarios = mysqli_fetch_assoc($result_table)) {
                            echo "<tr>
                                    <td>". $array_funcionarios['nome']."</td>
                                    <td>". utf8_encode ($array_funcionarios['ramal']) ."</td>
                                    <td>".$array_funcionarios['sigla']."</td>
                                    <td>".$array_funcionarios['email']."</td>
                                    <td><img class='icons_opcoes detalhes' data-funcionario=".$array_funcionarios['cod_funcionario']." src='../img/icons8-mais-zoom-52.png' alt='Ilustração para opção de ver mais detalhes'  data-toggle='modal' data-target='#exampleModalCenter'> </td>
                                </tr> ";
                        }
                    ?>
                    
                </tbody>
            </table>
            <nav aria-label="Navegação de página exemplo">
                <ul class="pagination justify-content-end">
                    <li class="page-item <?php echo $pagina_atual == 0 ? 'disabled': ''?>">
                        <a class="page-link" href="comunicacao.php" tabindex="-1"><<</a>
                    </li>
                    <?php
                        for($i=0;$i<$numero_de_paginas;$i++){
                            $estilo = "class=\"active\"";
                    ?>
                    <li <?php echo $estilo; ?>><a class="page-link" href="comunicacao.php?pagina=<?php echo ($i+1); ?>"><?php echo $i+1; ?></a></li>
                    <li class="page-item">
                        <?php } ?>
                    <a class="page-link" href="comunicacao.php?pagina=<?php echo $numero_de_paginas; ?>">>></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!--IMPORTAÇÕES JAVASCRIPT PARA O MODAL(BOODSTRAP)-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script type="text/javascript" src="../js/buscaFuncionarios.js"></script>
    <script type="text/javascript" src="../js/buscaDetalhesComunicacao.js"></script>
</body>
</html>
