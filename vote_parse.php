<?php
session_start();
include_once("connect.php");
$name=$_SESSION['username'];
  
   if ($_SERVER['REQUEST_METHOD']==='GET') 
      {    
      $pollid= $_GET['pollid'];

      

      $query="SELECT * FROM polls WHERE pollid= '$pollid' ";
      $result=mysql_query($query) or die(mysql_error());

      $row=mysql_num_rows($result);

      if($row==1)
      {
        $rows= mysql_fetch_assoc($result);
        $question=$rows['question'];
        $pollid=$rows['pollid'];
  
            if ($_GET['option']=="yes") 
                {
                  $option="yes";
                  $sql="INSERT INTO results (result, votedby, timevoted ) VALUES ('$option', '$name', now())";
                  $res=mysql_query($sql) or die(mysql_error());
                  
                    if($res)
                    {
                       echo ";
                    <script>

                    alert(\"Voted yes\");
                    alert(window.location='home.php');

                    </script>
                     ";
                    }

                
                
              }//end of clicking yes button result
              elseif  ($_GET['option']=="no") 
                {
                  $option2="no";
                  $sql="INSERT INTO results (result, votedby, timevoted ) VALUES ('$option2', '$name', now())";
                  $res=mysql_query($sql) or die(mysql_error());
                  
                    if($res)
                    {
                       echo ";
                    <script>

                    alert(\"Voted no\");
                    alert(window.location='home.php');

                    </script>
                     ";
                    }

                
                
              }//end of clicking remove no result

              elseif  ($_GET['option']=="sometimes") 
                {
                  $option3="sometimes";
                  $sql="INSERT INTO results (result, votedby, timevoted ) VALUES ('$option3', '$name', now())";
                  $res=mysql_query($sql) or die(mysql_error());
                  
                    if($res)
                    {
                       echo ";
                    <script>

                    alert(\"Voted sometimes\");
                    alert(window.location='home.php');

                    </script>
                     ";
                    }

                
                
              }//end of clicking sometimes button result

               
              }
               
                
           } //end if statement for finding required rows - successful query
              
