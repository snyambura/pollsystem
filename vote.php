<?php
include_once("connect.php");
session_start();
//$poll=" ";

$query="SELECT * FROM polls";
$res=mysql_query($query) or die(mysql_error());

if(mysql_num_rows($res)>0)
 {
 	while ( $row=mysql_fetch_assoc($res)) 
 	{
 		$question=$row['question'];
	$pollid=$row['pollid'];

echo 
      "
          <br/>
          ".$question." <br/> 
          <p><p/>
               <form action='vote_parse.php' method='GET'>
    <input type='radio' name='option' value='yes' required='required'> Yes 
    <br>
    <input type='radio' name='option' value='no' required='required'>No
    <br/>
    <input type='radio' name='option' value='sometimes' required='required'>Sometimes
    <br/>
    <input type='submit' name='submit' value='Vote'>
    <input type='hidden' name='pollid' value='$pollid'/>
    
    </form>
       <hr/>
      ";
 	}

	
}

else
echo "There are no active polls";

?>