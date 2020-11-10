<?php
	if (!isset($_SESSION)) {
		session_start();
    }
    $cargo = $_SESSION['cargo'];
?>
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
        include('../controle/preenchimentos/cips.php');
    ?>
    <div class="container">
        <div class="box_table" id="box_table">
            <form method="POST" id="form-pesquisa" action="">
                <input type="search" class="busca" id="busca" name="busca" alt="table table-striped" placeholder="Buscar">
            </form>
            <?php

                if($cargo == 1){
            ?>
                <div class='add_user' onclick="window.location='acesso_administrativo/cadastro_cip.php';">
                    <img src='../img/icons8-new-post-52.png' class='iconAddUser' alt='Ilustração para adição de novo comunicado interno'>
                    <p>Escrever cip</p>
                </div>
            <?php
                }
            ?>

            <table class="table table-striped" id="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody class="resultado">
                    <?php
                        while ($array_cip = mysqli_fetch_assoc($result_table)) {
                            echo "<tr>
                                    <th><input type='checkbox' id='vehicle3' name='vehicle3' value=".$array_cip['cod_comunicado']."></th>
                                    <td>". $array_cip['titulo']."</td>
                                    <td>". utf8_encode ($array_cip['nome']) ."</td>
                                    <td>".$array_cip['data_emissao']."</td>
                                    <td>
                                        <form method='POST' action=''>
                                            <input type='hidden' id='cod_cip' name='cod_cip' value=".$array_cip['cod_comunicado'].">
                                            <img class='icons_opcoes detalhes' data-cip=".$array_cip['cod_comunicado']." src='../img/icons8-mais-zoom-52.png' alt='Ilustração para opção de ver mais detalhes'  data-toggle='modal' data-target='#exampleModalCenter'>
                                        </form>

                                </tr>
                                ";
                        }
                    ?>

                </tbody>
            </table>
            <nav aria-label="Navegação de página exemplo">
                <ul class="pagination justify-content-end">
                    <li class="page-item <?php echo $pagina_atual == 0 ? 'disabled': ''?>">
                        <a class="page-link" href="cips.php" tabindex="-1"><<</a>
                    </li>
                    <?php
                        for($i=0;$i<$numero_de_paginas;$i++){
                            $estilo = "class=\"active\"";
                    ?>
                    <li <?php echo $estilo; ?>><a class="page-link" href="cips.php?pagina=<?php echo ($i+1); ?>"><?php echo $i+1; ?></a></li>
                    <li class="page-item">
                        <?php } ?>
                    <a class="page-link" href="cips.php?pagina=<?php echo $numero_de_paginas; ?>">>></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
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
	<script type="text/javascript" src="../js/buscaDetalhesCip.js"></script>
    <script type="text/javascript" src="../../js/buscaDetalhesCip.js"></script>
</body>
</html>
