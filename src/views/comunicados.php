<?php
    require_once('../controle/conexao.php');
    if (!isset($_SESSION)) {
      session_start();
    }
    if($_SESSION['cod_funcionario'] == null){
      header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Potigás</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/feed.css">
  </head>
  <body>
      <?php
          include('../includes/nav.php');
          include('menu.php');
          include('../controle/preenchimentos/comunicados.php');
      ?>
      <div class="container">
        <?php
          while ($array_feed = mysqli_fetch_array($result_feed)) {
            echo "
            <div class='borda'>
              <div class='post' id=".$array_feed['cod_publicacao'].">
                <h1>".$array_feed['titulo']."</h1>
                <p><i>". date("d/m/Y H:i:s", strtotime($array_feed['data_publicacao'])) ."</i></p>
                <div class='texto'>".$array_feed['texto']."</div>
              </div>
            </div>
            ";
          } 
        ?>
      </div>
  </body>
</html>

