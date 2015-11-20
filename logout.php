<?php
session_start();

if(!isset($_SESSION['username']))
{
	header("Location: index.php");
}
else
{
include_once("connect.php");
$username=$_SESSION['username'];
session_destroy();
header("Location: index.php");
}



?>