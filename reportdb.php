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
Reported Confessions verification page
</div>
<!-- <center>
<p>Due to some peoples mischievous activities, we're turning off our reporting feature temporarily<br> It'll soon be updated</p>
<p>Till then keep confessing</p>
</center>-->
<?php
	require_once('secret.php');
  	$db=mysqli_connect($host, $username, $password, $database)  or die('Error connecting to database')

    or die('Error connecting to database');

    $report=$_POST['report'];
    $id=$_POST['id'];
    
    $sql="update adminperm set report=1 where id=$id and permission=1;";
    mysqli_query($db, $sql);
    /*$sqlb="update adminperm set permission=0 where id=$id;";
    mysqli_query($db, $sqlb);*/

    $sqla="INSERT INTO report (confno,report) values('$id','$report')";
    mysqli_query($db,$sqla);
    echo "<center>The admin is notified about Confession no ".$id." and will take necessary actions in sometime.</center>";

    echo "<center>Report Submitted, We'll get to it soon</center><br>";
    if(isset($_POST['submit']))
    header( "refresh:6;url=index.php" );

  ?>
</center>
</body>
</html>
