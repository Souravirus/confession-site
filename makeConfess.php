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
    <script>
             tinymce.init({
            selector: "textarea",   
             plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars fullscreen autoresize',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools toc'
            
            ],
              toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
              toolbar2: 'preview media | forecolor backcolor emoticons',
              image_advtab: true,
              templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
              ],
              content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
              ],
                image_advtab: true,
                 statusbar:false,
                toolbar_items_size: 'small',
                height: "300",
                plugin_preview_width: 250
            });
        </script>
    <title>Confess here - Team .EXE</title>

<?php 
      include_once('stylesheets.php');
      echo "</head><body>";
      include_once('header.php');
?>
    <body>
    <div class="page-header">
  <h1>Confess here <small> - Team .EXE</small></h1>
  NOTE - Use * when mentioning someone's name.<br>Please be sensible towards feelings of others and don't post abusive things.  Posting such things can result in increased security for the website and monitoring of confessors IP.
</div>
        <div id="main1"> 
            <form role="form" action="verify.php" method="post" >
                <div class="input">
                    <textarea class="inpf" name="confmsg" rows="10" cols="10">
                    </textarea>
                </div>
                <?php
                      require_once('recaptchalib.php');
                      $publickey = "6LfUPRsUAAAAAGgzv96APuiXYvUtxkHoUKs4pki7"; // you got this from the signup page
                      echo recaptcha_get_html($publickey);
                ?>

                <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit">
            </form>
        </div>
        <?php
    include_once('footer.php');
?>
    </body>
</html>
