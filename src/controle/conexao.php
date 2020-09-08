
<?php

$env = getenv('ENV');
if ($env == 'PRODUCTION') {
	$host="us-cdbr-east-02.cleardb.com";
	$socket="";
	$port=3306;
	$user="bfdb92c39415ed";
	$password="61499fd8";
	$dbname="heroku_7e47145fe11065e";
}
else {
	$host="127.0.0.1";
	$socket="";
	$port=3300;
	$user="root";
	$password="cabeloloco154";
	$dbname="intranet_corporativa";
}


$poti_con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
?>
