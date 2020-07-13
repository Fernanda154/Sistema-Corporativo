<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_conxao_potigas = "localhost";
$database_conxao_potigas = "helpdesk";
$username_conxao_potigas = "us_potigas";
$password_conxao_potigas = "intra2010poti";
$conxao_potigas = mysql_pconnect($hostname_conxao_potigas, $username_conxao_potigas, $password_conxao_potigas) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_set_charset('utf8');

?>
