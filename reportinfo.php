<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Confession site by - Team .EXE">
    <meta name="author" content="Team .EXE">
    <link rel="icon" href="exe.nith.ac.in/images/confess.png">
    <link rel="stylesheet" href="css/makeconfess.css">
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
        
    <title>Report confession</title>

<?php 
      include_once('stylesheets.php');
      echo "</head><body>";
      include_once('header.php');
?>
    <body>
    <center>
        
            <!-- <?php/*
            $name=$_POST['name'];
            $year=$_POST['year'];
            $branch=$_POST['branch'];
            $email=$_POST['email'];
            $report=$_POST['report'];
            $string=$name." of ".$branch." of year ".$year." complained about confession ".$id." report: ".$report." email id:".$email;
            if($name=="" || $year=="" || $branch==""||$email=="")
            {
                $message="Please enter all the required fields";
                echo 
            }
            else
            {
                /*$email1="sahoosourav1996@gmail.com";
                $email2="ankitguleria1@gmail.com";
               $string=wordwrap($string,70);
                if($id!=""){
                    $subject="Confession report";
                }
                else{
                    $subject="Normal report";
                }
                if(mail($email,$subject,$string,"")){
                    $message="Your report has been sent to the admin for a review process";
                    echo 
                    $id="";
                    $name="";
                    $year="";
                    $branch="";
                    $email="";
                    $report="";
                } 
                else{
                    $message="your report can't be sent to the admin1";
                    echo 
                }
                if(mail($email2,$subject,$string,"")){
                    $id="";
                    $name="";
                    $year="";
                    $branch="";
                    $email="";
                    $report="";
                }
                else{
                    $message="your report can't be sent to the admin2";
                    echo 
                }
            }*/
        ?> -->
        <br>
        <div id="info">
            <div id="mainContent">
                <i class="fa fa-exclamation-triangle faa-flash animated" aria-hidden="true"></i>
                <span id="warning">
                <?php
                        if (!isset($id)) 
                        {
                            echo "To report a confession please type the Confession id else submit without it";
                        }
                        else
                        {
                            echo "<center>Thanks for reporting. Your contribution matters.</center>";
                        }
                ?>
                </span>
            </div>
        </div>
        <br><br>
        <div id="main">
            <form role="form" method="post" action="reportdb.php">
                <label for="confessionid">
                    Enter confession id without #
                </label>
                <div class="input">
                    <input class="inpf" name="id" size="34" type="text" placeholder="">
                </div>
                <br>
                <div class="input">
                    <label for="report">
                         Your Report
                    </label><br>
                    <textarea class="inpf" name="report" rows="10" cols="37"></textarea>
                </div>
                <?php
                      require_once('recaptchalib.php');
                      $publickey = "6LfUPRsUAAAAAGgzv96APuiXYvUtxkHoUKs4pki7"; // you got this from the signup page
                      echo recaptcha_get_html($publickey);
                ?>
                <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit"> 
            </form>
        </div>
        </center>
        <?php
    include_once('footer.php');
?>
    </body>
</html>
