<?php session_start();
?>
<!DOCTYPE html> 
<head>	
	
	<link rel="stylesheet" href="poll.css" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<div class="text">
	<h4> Admin login</h4>
	</div>
	</div>	
	<fieldset>
	 <?php

   if(!isset($_SESSION['user_id']))
     { 
     	echo "<h3> <form action='admincheck.php' method='POST'>
		Username<br/><input type='text' name='username' required/> &nbsp;
		<br/>
		Password<br/><input type='password' name='password' required/>&nbsp;
		<br/><p></p>
		<input type='submit'value='Log In' name='login'/> 
		</form>
		</h3>
		"; 
     }

  ?>	
 
</fieldset>
<div class="container">
	<div class="text">
	<a class="togglemenu" href="#"> Menu Options</a>
	</div>
	</div>	
<div class="navbar">
<h2>Menu</h2>
<nav>
    	<a href="signup.php ">Sign Up </a>	
		<a href="login.php "> Log In</a>				
		<a href="adminlogin.php "> Admin login</a>
		</nav>
		</div>
	
	<script type="text/javascript" src="jquery-1.11.1.js"></script>
	
<script type="text/javascript">

$(document).ready(function()
{
	var menu="close";

	$('.togglemenu').click(function()
	{
		
	   if (menu=="close")
	   {
	 	$('.navbar').css('-webkit-transform','translate(0,0)');
	 	menu="open";
	   }
	   else
	   {
	   	$('.navbar').css('-webkit-transform','translate(-100%, 0)');
	   	menu="close";
	   }
		
	});
});

   
</script>
</body>
</html>