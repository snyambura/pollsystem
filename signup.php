
<?php

// If the form was submitted, scrub the input (server-side validation)
// see below in the html for the client-side validation using jQuery

$firstname = '';
$surname = '';
$email = '';
$username = '';
$password = '';
$password_again = '';
$output = '';

if($_POST) {
  // collect all input and trim to remove leading and trailing whitespaces
  $firstname = trim($_POST['firstname']);
  $surname = trim($_POST['surname']);
  $email = trim($_POST['email']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $password_again = trim($_POST['password_again']);
  
  $errors = array();
  
  // Validate the input
  if (strlen($firstname) == 0)
    array_push($errors, "Please enter your first name");

  if (strlen($surname) == 0)
    array_push($errors, "Please enter your surname");
   
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    array_push($errors, "Please specify a valid email address");
    
  if (strlen($username) == 0)
    array_push($errors, "Please enter a valid username");
    
  if (strlen($password) < 5)
    array_push($errors, "Please enter a password. Passwords must contain at least 5 characters.");

  if (strlen($password_again !=$password) )
    array_push($errors, "Passwords do not match.");
    
    
  // If no errors were found, proceed with storing the user input
  if (count($errors) == 0) {
    array_push($errors, "No errors were found. Thanks!");
    include_once("connect.php");
    $username=$_POST['username'];
      $password= $_POST['password'];
      $password= md5($password);
      $email=$_POST['email'];
                
      $query= "SELECT  username FROM users WHERE username = '$username' ";
      $result=mysql_query($query) or die(mysql_error());

         if(mysql_num_rows($result)==1)
           {
            //echo "The username ".$username." already exists";
            echo "<script>
                            alert('The username ".$username." already exists')
                            
                            alert(window.location='signup.php');
                            </script>";
            }
                else
                  {
                     $query2="INSERT INTO users (firstname, surname, username, password,email ) VALUES ('$firstname','$surname','$username','$password', '$email') ";
                     $result2= mysql_query($query2) or die(mysql_error());
                       if($result2)
                         {
                            echo "<script>
                            alert('Successfully registered!!! Now login to access the site')
                            
                            alert(window.location='index.php');
                            </script>";
                                                  
                          }
                            else
                                 {
                                    echo "Sorry not registered";
                                  }
                    } 
  
  }
  
  //Prepare errors for output
  $output = '';
  foreach($errors as $val) {
    $output .= "<p class='output'>$val</p>";
  }
  
}

?>

<html>
<head>
  <link rel="stylesheet" href="pharmacy.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <div id="wrapper">
    <title>Register</title>
   </div>
  
  <h1>MyPharmacy</h1>
  <h3>Convenience Pharmacy at your finger tips</h3> 
  <a class="togglemenu" href="#"> Menu Options </a>
  </div>

   <style type="text/css">
    .label {width:100px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
    #register-form label.error, .output {color:#FB3A3A;font-weight:bold;}
  </style>
  <h1>Register Below</h1>
  
  <!-- Load jQuery and the validate plugin -->
 <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
 <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>-->
  
  <!-- jQuery Form Validation code -->
  <script>
  

  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            firstname: "required",
            surname: "required",
            email: {
                required: true,
                email: true
            },
            username: "required",
            password: {
                required: true,
                minlength: 5
            password_again : "required";
            }
        },
        messages: {
            firstname: "Please enter your first name",
            surname: "Please enter your surname"
            
            email: "Please enter a valid email address",
            username: "Please enter a valid username",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }
            password_again: "Passwords do not match";
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
</head>
<body>
  <?php echo $output; ?>
  <!--  The form that will be parsed by jQuery before submit  -->
  <form action="signup.php" method="post" id="signup.php" novalidate="novalidate">
  
    First Name<br/> <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" /><br />
    <p></p>
    Surname <br/><input type="text" id="surname" name="surname" value="<?php echo $surname; ?>" /><br />
    <p></p>
    Email <br/><input type="text" id="email" name="email" value="<?php echo $email; ?>" /><br />
    <p></p>
    Username<br/> <input type="text" id="username" name="username" value="<?php echo $username; ?>" /><br />
    <p></p>
    Password (Must be at least 5 characters)<br/><input type="password" id="password" name="password" /><br />
    <p></p>
    Confirm password <br/> <input type="password" id="password_again" name="password_again" /><br />
    <p></p>
    <input type="submit" name="submit" value="Submit" /></div>
    
  </form>
</div>
  <div class="navbar">
<h2>Menu</h2>
<nav>

  
    <a href="signup.php ">Sign Up </a>  
    <a href="login.php "> Log In</a>  
      
    <a href="adminlogin.php "> Admin login</a>
    </nav>
    </div>
  
  
    <div class="text">
  
  
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