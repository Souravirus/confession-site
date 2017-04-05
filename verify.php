<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Confession site by - Team .EXE">
    <meta name="author" content="Team .EXE">
    <link rel="icon" href="exe.nith.ac.in/images/confess.png">

    <title>Confession - Team .EXE</title>
    <style type="text/css">
.demo-card {
  padding-top: 20px;
  padding-left: 5%;
  padding-right: 5%;
  padding-bottom: 10px;
}
#return-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.7);
    width: 50px;
    height: 50px;
    display: block;
    text-decoration: none;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    display: none;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top i {
    color: #fff;
    margin: 0;
    position: relative;
    left: 16px;
    top: 13px;
    font-size: 19px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top:hover {
    background: rgba(0, 0, 0, 0.9);
}
#return-to-top:hover i {
    color: #fff;
    top: 5px;
}
    </style>
    

<?php 
      include_once('stylesheets.php');
      echo "</head>";
?>
<body>
<?php
      include_once('header.php');
?> 
<center>
<div id="topp" class="page-header">
<h1>NITH Confessions<small> - Team .EXE</small></h1>
Confession Verification page
</div>
<?php
  require_once('recaptchalib.php');
  require_once('secret.php');
  include_once ('includes/sql_config.php');
  $db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)  or die('Error connecting to database');

  //get the time of the confessions
  $da=date("d/m/Y");
  $cmt="Admin comment coming soon.";

  function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //fixed a bug which was cousing "rn" to appear whenever "enter" key is pressed
        $data = preg_replace( "/rn/", " ", $data );
        return $data;
    }

  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) 
  {
    // What happens when the CAPTCHA was entered incorrectly
    echo "Captcha entered is wrong<br>";
    
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again."."(reCAPTCHA said: ".$resp->error .")");
  } 
  else 
  {
    // Your code here to handle a successful verification
    $message=mysqli_real_escape_string($db,$_POST["confmsg"]);
    $message=test_input($message);

    if($message)
    {
        $sql="INSERT INTO adminperm (message, cmnt, dat, permission) values ('$message','$cmt','$da',1)";
        if(mysqli_query($db,$sql))
        {
            echo '<center><h2>Thanks for posting confession.</h2>';
            echo '<a href="index.php">Check your confession here</a><br>We are redirecting you in 6 seconds.</center>';
            header( "refresh:6;url=index.php" );
        }
        
        else
        {
            echo "<center>Sorry sending failed<br>
            Please do not use <b>'</b> in your messge, It is for secutiry of our server & databases.</center>";
        }
    }
    else
        {
              echo "<center>You have to enter some message<br>
              You're being redirected to previous page within 5 seconds<center>";
              header( "refresh:5;url=makeConfess.php" );
        }
  }

      mysqli_close($db);
  ?>
  </center>
</body>
</html>