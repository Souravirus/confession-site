<?php
    include_once 'includes/sql_config.php';
$db=mysqli_connect(HOST, USER, PASSWORD, DATABASE)
              or die('Error connecting to database');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Confession site by - Team .EXE">
    <meta name="author" content="Team .EXE">
    <link rel="icon" href="images/title.png">
    <meta property="og:image" content="http://exe.nith.ac.in/images/confess.png"/>
    <meta property="og:title" content="NITH Confessions - Team .EXE"/>
    <meta property="og:url" content="http://exe.nith.ac.in/confess"/>
    <meta property="og:site_name" content="NITH Confession site by - Team .EXE"/>

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
    z-index: 2147483;
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
    z-index: 2147483;
}
#return-to-top:hover {
    background: rgba(0, 0, 0, 0.9);
    z-index: 2147483;
}
#return-to-top:hover i {
    color: #fff;
    top: 5px;
    z-index: 2147483;
}
#direction {
     margin-bottom:3%;   
     text-align: center;
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

<!--script for facebook plugins-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
    </script>
<center>
<div id="topp" class="page-header">
<h1>NITH Confessions<small> - Team .EXE</small></h1>
</div>
</center>
<?php
        include_once('loadconfession.php');
?>

   <!-- Return to Top -->
    <a href="#topp" id="return-to-top"><i class="icon-chevron-up"></i></a>

<?php
    include_once('footer.php');
?>
</body>
</html>