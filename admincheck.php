<?php
session_start();
include_once 'connect.php';

if(isset($_POST['username']) && $_POST['password'])
 {
	$username= $_POST['username'];
	$password= $_POST['password'];

	$query= "SELECT * FROM admin WHERE username='$username' AND password='$password' ";
	$result= mysql_query($query) or die(mysql_error());

	if (mysql_num_rows($result)==1) 
	{

		$row= mysql_fetch_assoc($result);
		$_SESSION['username']=$row['username'];
		$_SESSION['userid']=$row['userid'];

		
		$_SESSION['start_time'] = time();
		header("Location: options.php");
		exit();

	}	

	else
	{
		echo "<script>
      alert('Sorry!! Only admin can access this page')
      
      alert(window.location='index.php');
      </script> ";


		
	}
}
		

?>

