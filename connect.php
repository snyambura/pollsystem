<?php

$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$db="poll";

mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die(mysql_error());
mysql_select_db($db);


?>