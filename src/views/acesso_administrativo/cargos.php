<?php
    //AUTORIZAÇÃO DE ACESSO A PÁGINA
    if (!isset($_SESSION)) {
        session_start();
      }
      if($_SESSION['cod_funcionario'] == null){
        header("Location: ../../index.php");
      }
    //-----------------------------------------
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/funcionarios.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Potigás</title>
</head>
<body>
    <?php
        require_once('../../controle/conexao.php');
        include('../../includes/nav.php');
        include('menu.php');
        include('../../controle/preenchimentos/cargos.php');
    ?>
    <div class="container">
        <div class="box_table" id="box_table">
            <form method="POST" id="form-pesquisa" action="">
                <input type="search" class="busca" id="busca" name="busca" alt="table table-striped" placeholder="Buscar">
            </form>
            <div class="add_user" onclick="window.location='cadastro_cargo.php';">
                <img src="../../img/icons8-recepção-52.png" class="iconAddUser" alt="Ilustração para adição de novo usuário">
                <p>Adicionar cargo</p>
            </div>
            <table class="table table-striped" id="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Nomenclatura</th>
                    </tr>
                </thead>
                <tbody class="resultado">
                    <?php
                        while ($array_cargos = mysqli_fetch_assoc($result_cargos)) {
                            echo "<tr>
                                    <th><input type='checkbox' id='vehicle3' name='vehicle3' value=".$array_cargos['cod_cargo']."></th>
                                    <td>". $array_cargos['nomenclatura'] ."</td>
                                    <td> 
                                        <form method='POST' action=''>
                                            <input type='hidden' id='cod_setor' name='cod_setor' value=".$array_cargos['cod_cargo'].">
                                            <img class='icons_opcoes detalhes' data-setor=".$array_cargos['cod_cargo']." src='../../img/icons8-mais-zoom-52.png' alt='Ilustração para opção de ver mais detalhes'  data-toggle='modal' data-target='#exampleModalCenter'>
                                        </form>
                                        <img class='icons_opcoes' src='../../img/icons8-editar-52.png' alt='Ilustração para opção de editar'> <img class='icons_opcoes' src='../../img/icons8-excluir-52.png' alt='Ilustração para opção de apagar'></td>
                                </tr>
                                ";
                        }
                    ?>
                    
                </tbody>
            </table>
            
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
	<script type="text/javascript" src="../../js/buscaSetores.js"></script>
    <script type="text/javascript" src="../../js/buscaDetalhesSetor.js"></script>
</body>
</html>
