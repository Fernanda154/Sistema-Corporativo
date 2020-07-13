<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_intranet = "localhost";
$database_conn_intranet = "intranet";
$username_conn_intranet = "intranet";
$password_conn_intranet = "sqlinet#9t15p";
$conn_intranet = mysqli_connect('p:'.$hostname_conn_intranet, $username_conn_intranet, $password_conn_intranet, $database_conn_intranet) or trigger_error(mysqli_error(),E_USER_ERROR);
mysqli_set_charset($conn_intranet,'utf8');
?>

