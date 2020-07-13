<?php
	if (!isset($_SESSION)) {
    		session_start();
	}
	$nome = $_SESSION['nome'];	
?>
<div class="nav">
	<div class="iconMaisNome">
		<img src="http://localhost/poticorp/Sistema-Corporativo/src/img/user.png" class="userNav"><p><?php echo "$nome";?></p>
	</div>
	
</div>