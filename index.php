<!DOCTYPE html>
<head>

	
	<link rel="stylesheet" type="text/css" href="style.css">
	<div class="navbar">
<h2>Menu</h2>
<nav>	
		<a href="signup.php ">Sign Up </a>	
		<a href="login.php "> Log In</a>	
			
		<a href="adminlogin.php "> Admin login</a>
		</nav>
		</div>
	
	
    <div class="text">
	
	</div>
	<div class="text">
	<h1>Internet Poll Framework</h1>
		
	<a class="togglemenu" href="#"> Click Here To Proceed</a>
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


</head>
</body>
</html>