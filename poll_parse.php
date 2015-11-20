<?php
include_once("connect.php");
session_start();

if (isset($_POST['submit']))
 {
 	$question=$_POST['poll'];

	$query="INSERT INTO polls(question) VALUES('$question')";
	$result=mysql_query($query) or die(mysql_error());

	if ($result)
	 {
		echo "question posted";
	}
}
?>