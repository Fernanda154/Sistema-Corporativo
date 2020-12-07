<?php
	if (!isset($_SESSION)) {
		session_start();
	}
    if($_SESSION['cod_funcionario'] == null){
    	header("Location: ../../index.php");
    }
    //-----------------------------------------
	$cod_funcionario = $_SESSION['cod_funcionario'];
	$busca_funcionario = "SELECT * FROM funcionario WHERE cod_funcionario = $cod_funcionario;";
	$result_funcionario = mysqli_query($poti_con, $busca_funcionario) or die(mysqli_error($poti_con));
	$funcionario = mysqli_fetch_assoc($result_funcionario);

?>

<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
<div class="gridBarraMenu">
	<meta charset="utf-8">
	<a href="../painel.php">
		<img src="../../img/logo_poti_white.png" class="logoNav">
	</a>
	<ul id="menu">
		<li>
			<a href="../painel.php"><img src="../../img/home.png" class="iconsMenu"><p>INÍCIO</p></a>
		</li>
		<li>
			<a href="../apresentacao.php"><img src="../../img/apresentacao.png" class="iconsMenu"><p>QUEM SOMOS</p></a>
		</li>
		<li>
			<a href="../cips.php"><img src="../../img/cip.png" class="iconsMenu"><p>CIP</p></a>
		</li>
		<li>
			<a href="../reservas.php"><img src="../../img/calendario.png" class="iconsMenu"><p>RESERVAS</p></a>
		</li>
		<li>
			<a href="#"><img src="../../img/empresa.png" class="iconsMenu" id="dropEmpresa"><p>EMPRESA</p></a>
			<ul class="dropEmpresa">
				<li>
					<a href="setores.php"><img src="../../img/setores.png" class="iconsSubMenu"><p>SETORES</p></a>
				</li>
				<li>
					<a href="../administracao.php"><img src="http://localhost/poticorp/Sistema-Corporativo/src/img/administracao.png" class="iconsSubMenu"><p>ADMINISTRAÇÃO</p></a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#"><img src="../../img/sistemas.png" class="iconsMenu"><p>SISTEMAS</p></a>
			<ul class="dropSistemas">
				<li>
					<a href="https://intranet/helpdesk"><img src="../../img/setores.png" class="iconsSubMenu"><p>HELPDESK</p></a>
				</li>
				<li>
					<a href="https://intranet/sagsup"><img src="../../img/setores.png" class="iconsSubMenu"><p>SAGSUP</p></a>
				</li>
				<li>
					<a href=".php"><img src="../../img/setores.png" class="iconsSubMenu"><p>REGISTRO 117</p></a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#"><img src="../../img/globo.png" class="iconsMenu"><p>PORTAIS</p></a>
			<ul class="portaisUL">
				<li>
					<a href="http://portalsms.potigas.com.br/"><img src="../../img/setores.png" class="iconsSubMenu"><p>SMS</p></a>
				</li>
				<li>
					<a href="https://potigas.macroerp.com.br/index.php?class=LoginForm"><img src="../../img/setores.png" class="iconsSubMenu"><p>Portal RH</p></a>
				</li>
			</ul>
		</li>
		<li>
			<a href="../comunicacao.php"><img src="../../img/comunicacao.png" class="iconsMenu"><p>COMUNICAÇÃO</p></a>
		</li>
<!-- VISÍSIVEL SOMENTE POR ADMINS -->


		<?php
			if ($funcionario['permissao'] == '99'){
		?>
					<li><a href="controles.php"><img src="../../img/admin.png" class="iconsMenu"><p>ADMINISTRAÇÃO</p></a>
						
					</li>
			<?php
			}
			?>
					<li><a href="../controle/logout.php"><img src="../../img/sair.png" class="iconsMenu"><p>SAIR</p></a></li>

				</ul>
	</div>
