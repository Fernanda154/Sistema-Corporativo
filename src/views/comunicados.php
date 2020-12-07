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
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/feed.css">
  </head>
  <script>
    function verMais(id, idBt, idBtMenos){
      var post = document.getElementById(id);
      var verMais = document.getElementById(idBt);
      var verMenos = document.getElementById(idBtMenos); 
      idBt.style.display = "none";
      post.style.overflow = "visible";
      verMenos.style.display = "block";
    }
    function verMenos(id, idBt){
      var post = document.getElementById(id);
      var verMais = document.getElementById(idBt);
      idBt.style.display = "visible";
      post.style.overflow = "hidden";
      borda.style.heigth = "10vh";

    }
  </script>
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

              <div class='post' id=".$array_feed['cod_publicacao'].">
                <h4>".$array_feed['titulo']."</h4>
                <p><i>".$array_feed['data_publicacao']."</i></p>
                <div class='texto'>".$array_feed['texto']."</div>
            </div>
            <a onclick='verMenos(".$array_feed['cod_publicacao'].", btmenos_".$array_feed['cod_publicacao'].")' id='btmenos_".$array_feed['cod_publicacao']."' class='bt_menos'>ver menos</a>
            <a onclick='verMais(".$array_feed['cod_publicacao'].", bt_".$array_feed['cod_publicacao'].", btmenos_".$array_feed['cod_publicacao'].")' id='bt_".$array_feed['cod_publicacao']."'>ver mais</a>
            </div>
            ";
          } 
        ?>
      </div>
  </body>
</html>

<div class='borda'>
  <div class='card mb-3' id=".$array_feed['cod_publicacao'].">
    <img class='card-img-top' src='...' alt='Card image cap'>
    <div class='card-body'>
      <h5 class='card-title'>.$array_feed['titulo'].</h5>
      <p class='card-text'>.$array_feed['data_publicacao'].</p>
      <p class='card-text'><small class='text-muted'>.$array_feed['data_publicacao'].</small></p>
    </div>
  </div>
  <div class='card'>
    <div class='card-body'>
      <h5 class='card-title'>Card title</h5>
      <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
    </div>
    <img class='card-img-bottom' src='...' alt='Card image cap'>
  </div>
</div>