
<?php
session_start();
include_once("connect.php");
if(!isset($_SESSION['username'])){
header("Location: index.php");
     } ?>
 <!DOCTYPE html>
       <head>
        <title> 
          MyPharmacy
        </title>
          <link rel="stylesheet" type="text/css" href="poll.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

        <script type="text/javascript" src = "jquery-1.11.1.js"></script>
        <script>
        
        function callViewOption(view_type)
        {         
           switch(view_type)
            {
                
                 case 'activepolls':
                     callSpeciedPage('vote.php');
                  break;

                  case 'viewresults':
                     callSpeciedPage('viewresults.php');
                     break;
              default:
                 break;
            }
        }


        function callSpeciedPage(var_url)
        {
         var ajaxRequest = $.ajax
            ({
              url:var_url,
              datatype:"html",
              type:"POST"
            });

            ajaxRequest.done(function(msg)
            {
              $('#fetch').html(msg);
            });

            ajaxRequest.fail(function(jqXHR, returnText)
            { 
                $('#fetch').html(returnText);

           });
          }


        </script>

       	</head>

      <body>
      
      <h3>Internet Poll Framework</h3>
      
    
        <header>
      	<div id="menu">   
      <ul>
               <li><a href ="#" onclick="callViewOption('activepolls')">View Polls </a> </li> 
                <li><a href ="#" onclick="callViewOption('viewresults')"> View Results </a> </li>               
                      
                <li><a href="logout.php"> Logout </a></li>
      </ul>
  </div>
       <div id = "fetch"></div>
      <div id= "result"></div>
      </div>
      </section>

        </header>
     </section> 
      <p></p>
       
      </body>
      </html>

