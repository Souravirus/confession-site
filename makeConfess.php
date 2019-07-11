<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Confession site by - Team .EXE">
    <meta name="author" content="Team .EXE">
    <link rel="icon" href="exe.nith.ac.in/images/confess.png">
    <link rel="stylesheet" href="css/makeconfess.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="/jquery/jquery-3.2.0.min.js"></script>
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
    <title>Confess here</title>
    <style type="text/css">
      .demo-card {
        padding-top: 20px;
        padding-left: 5%;
        padding-right: 5%;
        padding-bottom: 10px;
      }
    </style>
  
  </head>
<?php 
      include_once('stylesheets.php');
      include_once('header.php');
      require_once('recaptcha_keys.php');
?>
    <body>
      <div class="demo-card">
      <div class="page-header">
        <h1>Confess here</h1>
          </div>
            <div id="main1"> 
                <form class="recaptchaForm" method="POST" >
                    <div class="input">
                        <textarea class="inpf" name="confmsg" rows="10" cols="10">
                        </textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey=<?php echo $site_key;?>></div>
                    <br/>
                    <input type="submit" class="btn btn-info" id="submission" value="Submit" name="submit">
                </form>
            </div>
          </div>
        <?php
    include_once('footer.php');
?>
      <script>
        $(document).ready(function(){
          $(".recaptchaForm").on('submit', function(event){
            var recaptcha = $('#g-recaptcha-response').val();
            if(recaptcha===""){
              event.preventDefault();
              alert("Please check Recaptcha");
            }
            $.post("verify.php", {
              "response": recaptcha
            });
          });
        });
      </script>

    </body>
</html>
