<?php
session_start();
include_once("connect.php");
  
if (isset($_GET['submit'])) 
 {
  $pollid=$_GET['pollid'];
  $query3="SELECT * from polls where pollid='$pollid'";
  $res4=mysql_query($query3) or die(mysql_error());

     if(mysql_num_rows($res4)==1)
     {
      $roow=mysql_fetch_assoc($res4);
      $pollids=$roow['pollid'];
      $question=$roow['question'];
      

    $sqll="INSERT INTO retiredpolls (pollid, question)
  VALUES ('$pollids','$question')";
  $ress=mysql_query($sqll) or die(mysql_error());
 

  if($ress)
  {
   
       $sql2="DELETE from polls where (pollid= '$pollid')";
      $res2=mysql_query($sql2) or die(mysql_error());

    echo "
  
<script>
                alert('Poll retired, no longer available to users!')
                 alert(window.location='options.php');
                

                </script><br/>";
}

 }            
} //end if statement for finding required rows - successful query
              
