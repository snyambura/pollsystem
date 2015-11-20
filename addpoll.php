<?php
include_once("connect.php");
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="poll_parse.php" method="POST">
Enter poll question
<br/>
<textarea name='poll' rows='5' cols= '75' required></textarea>
<br/>

<input type="submit" name="submit" value="activate poll">
</form>
</body>
</html>

