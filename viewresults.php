<?php
include_once("connect.php");
session_start();


$query= "SELECT COUNT(result) AS Votesy FROM results
WHERE result='yes'";
$result=mysql_query($query) or die(mysql_error());

$query2= "SELECT COUNT(result) AS Votesn FROM results
WHERE result='yes'";
$result2=mysql_query($query2) or die(mysql_error());

$query3= "SELECT COUNT(result) AS Votess FROM results
WHERE result='yes'";
$result3=mysql_query($query3) or die(mysql_error());

if ($result && $result2 && $result3)
 {
	
?>
