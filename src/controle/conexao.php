
<?php

$env = getenv('ENV');
if ($env == 'PRODUCTION') {
	$host="us-cdbr-east-02.cleardb.com";
	$port=3306;
	$socket="";
	$user="bab14c1cdab5d0";
	$password="8a891d12";
	$dbname="heroku_d52404dbf2a4e92";
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


