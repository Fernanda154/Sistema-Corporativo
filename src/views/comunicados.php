<?php
    require_once('../controle/conexao.php');

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Potigás</title>
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
          while ($array_feed = mysqli_fetch_array($result_table)) {
            echo "
            <div class='borda'>
              <div class='post'>
                <h4>".$array_feed['titulo']."</h4>
                <p><i>".$array_feed['data_publicacao']."</i></p>
                <div class='texto'>".$array_feed['texto']."</div>
              </div>
              <a>ver mais</a>
            </div>
            ";
          }
        ?>
      </div>
  </body>
</html>
