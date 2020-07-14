<?php
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['cod_funcionario'] == null){
	header("Location: ../controle/logout.php");
}
  include('../controle/conexao.php');
  require_once('../controle/preenchimentos/reservas.php');
  require_once('../controle/preenchimentos/publicacoes.php');
  require_once('../controle/preenchimentos/arquivos.php');
  require_once('../controle/preenchimentos/funcionarios.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Potig&aacute;s</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- BOODSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/painel.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <header>
            <?php
                include "../includes/nav.php";
                include "../includes/menu.php";
            ?>
        </header>
    	<!-- Carrega notícias do site oficial -->
    	<script type="text/javascript">
               	var xhr = new XMLHttpRequest();
               	xhr.open("GET", "../includes/noticias.php", true);
               	xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4)
                    {
                        result = xhr.responseText;
                        document.getElementById('internet_noticias').innerHTML = result;
                    }else{

                    }
                };
               	xhr.send(null);
        </script>
        

        <div class="container">
            <div class="gridBanner">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                          <div class="item active">
                            <img src="https://unsplash.it/1400/600?image=114">
                          </div>
                          <div class="item">
                            <img src="https://unsplash.it/1400/600?image=62">
                          </div>
                          <div class="item">
                            <img src="https://unsplash.it/1400/600?image=315">
                          </div>
                          <div class="item">
                            <img src="https://unsplash.it/1400/600?image=622">
                          </div>
                          <div class="item">
                            <img src="https://unsplash.it/1400/600?image=401">
                          </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" id="controlLeft" href="#carousel-example-generic" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" id="controlRight" href="#carousel-example-generic" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
        	<div class="gridNoticias">
        		<h4>NOTÍCIAS</h4>
            <hr>
						<section id="internet_noticias">
							<img src="../img/carregando.gif" />
						</section>
        	</div>
        	<div class="gridComunicados">
        		<h4>COMUNICADOS</h4>
            <hr>
            <?php
            if ($total_de_publicacoes > 0){
              //Se o número de publicacoes for maior que 0
					    do{
            ?>
               		<a href="../principal/comunicados.php"><img src="../img/ico_seta_dir.png" width="16" height="16" border="0" align="absmiddle" />
               			<?php echo date("d/m/Y", strtotime($publicacao['data_publicacao'])); ?> - <?php echo utf8_encode($publicacao['titulo']); ?>
                  </a>
                  <br>
            <?php
              } while ($publicacao= mysqli_fetch_assoc($result_publicacoes));
            }else{
              echo "Não há publicações no momento.";
            }
            ?>
        	</div>
        	<div class="gridReservas">
        	<h4>SALA DE REUNIÕES</h4>
          <hr>
          <?php
              if ($total_de_reservas > 0){
                // Show if recordset not empty
                do{
            ?>
                	<img src="../img/ico_seta_dir.png" alt="Seta ilustrativa" width="16" height="16" border="0" align="absmiddle" />
                  <a href="../principal/reservas_detalhes.php?cod_reserva=<?php echo $row_rssalareuniao['cod_reserva']; ?>">
                    <?php echo $reserva['data_inicio']; ?> - <?php echo $reserva['assunto']; ?>
                  </a>
                  <br>
			      <?php
                  } while ($reserva = mysqli_fetch_assoc($result_reservas));
              }else {
                		echo "Não há eventos agendados hoje para as salas de reuniões.";
              }
            ?>
        	</div>
        	<div class="gridAniversarios">
        		 <h4>ANIVERSARIANTES</h4>
                 <hr>
                    <?php
						if ($total_de_aniversariantes > 0){
                            // Se houverem aniversariantes neste dia
                            do{
                    ?>
                    			<a href="#"> <?php echo $aniversariante['nome']; ?> </a>
                                <br>
                    <?php
                            }
                            while ($aniversariante = mysqli_fetch_assoc($result_aniversariante));
                        }
                        else {
                        	echo "Não há aniversariantes no dia de hoje.";
                        }
                    ?>
        	</div>
        	<div class="gridArquivos">
        		<h4>ARQUIVOS RECENTES</h4>
                <hr>
                <?php
				if($total_de_arquivos > 0){
				//Se o total de arquivos no banco for maior que 0
                    do{
                ?>
						<a href="../arquivos/<?php echo $arquivo['caminho']; ?>" target="_blank"><img src="../img/download.png" width="16" height="16" border="0" align="absmiddle" />
                           	<?php echo utf8_encode($arquivo['descricao']); ?>
                        </a>
                        <br>
                <?php
                    }
					while ($arquivo = mysqli_fetch_assoc($result_arquivos));
				}else{
					echo "Não há arquivos a serem exibidos no momento";
				}
                ?>
        	</div>
            <div class="gridTV">
                <h4>TV POTIGÁS</h4>
                <hr>
                <iframe src="https://www.youtube.com/embed/p6PAcwLgm2k" frameborder="0" allowfullscreen></iframe>
            </div>

        </div>
    </body>

