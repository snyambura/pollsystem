<?php
session_start();
include_once 'connect.php';

if(isset($_POST['username']) && $_POST['password'])
 {
	$username= $_POST['username'];
	$password= $_POST['password'];
	$password= md5($password);

	$query= "SELECT * FROM users WHERE username='$username' AND password='$password' ";
	$result= mysql_query($query) or die(mysql_error());

	if (mysql_num_rows($result)==1) 
	{

		$row= mysql_fetch_assoc($result);
		$_SESSION['username']=$row['username'];
		$_SESSION['userid']=$row['userid'];

		echo "Welcome ";
		echo $_SESSION['username'];
		$_SESSION['start_time'] = time();
		header("Location: home.php");
		exit();

	}	

	else
	{
		echo "Invalid username or password <br/><p></p> ";
		echo "<a href ='signup.php'> Sign Up</a> <br/><p></p>";
		echo "<a href ='login.php'> Return to login </a><p></p>";
		echo "<a href ='visitorhome.php'> Proceed to site as guest </a>";
	}
}
		

?>

