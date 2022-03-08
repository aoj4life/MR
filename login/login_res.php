<?php

session_start();
session_regenerate_id(true);
//include('action-login.php'); // Includes Login Script
include 'token.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Get Help Round the World. Fund | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
 
  <link rel="stylesheet" href="securimage/securimage.css" media="screen">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

</head>
<body class="hold-transition login-page">


<div id="navbar" class="navbar navbar-default navbar-fixed-top" style="background-color: #0088ff;">
            <div class="navbar-container" id="navbar-container">
              
                <div class="navbar-header pull-left" >
                   
                    <a href="../index.php" class="navbar-brand" style="color: #ffffff;">
                       
                           <i class="fa fa-university" aria-hidden="true"></i><strong>
                            M<span>Reserves</span></strong>
                              
                    </a>

                </div>
                </div>
                </div>

<div class="login-box" style="margin-top: 50px;">
  <div class="login-logo">
    <a href=""><b>MR...</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="border: solid;">
    <p class="login-box-msg">Start Your Session</p>



           <?php 
                     if (isset($_SESSION['errMsg'])) {
                       echo "<div id='error_msg' style='margin-top: 5px; margin-bottom: 5px;'>".$_SESSION['errMsg']."</div>";
                       unset($_SESSION['errMsg']);
                     }
                     ?>
    <form action="action-login.php" method="post">
     

     <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">@</span>
         <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email(Email use during signup) " required>
  </div>


       <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>



           <div id="captcha_container_1" style="margin: 10px;">
<img style="float: left; padding-right: 5px" id="captcha_image" src="securimage/securimage_show.php" alt="CAPTCHA Image">
<div id="captcha_image_audio_div">
<audio id="captcha_image_audio" preload="none" style="display: none">
<source id="captcha_image_source_wav" src="securimage/securimage_play.php" type="audio/wav">
<br>
</audio>
</div>

<div id="captcha_image_audio_controls">
<a tabindex="-1" class="captcha_play_button" href="securimage/securimage_play.php" onclick="return false">
<img class="captcha_play_image" height="32" width="32" src="securimage/images/audio_icon.png" alt="Play CAPTCHA Audio" style="border: 0px">
<img class="captcha_loading_image rotating" height="32" width="32" src="securimage/images/loading.png" alt="Loading audio" style="display: none">
</a>
<noscript>Enable Javascript for audio controls</noscript>
</div>
<script type="text/javascript" src="securimage/securimage.js"></script>
<script type="text/javascript">captcha_image_audioObj = new SecurimageAudio({ audioElement: 'captcha_image_audio', controlsElement: 'captcha_image_audio_controls' });</script>

<a tabindex="-1" style="border: 0" href="#" title="Refresh Image" onclick="if (typeof window.captcha_image_audioObj !== 'undefined') captcha_image_audioObj.refresh(); document.getElementById('captcha_image').src = 'securimage/securimage_show.php?' + Math.random(); this.blur(); return false"><img height="32" width="32" src="securimage/images/refresh.png" alt="Refresh Image" onclick="this.blur()" style="border: 0px; vertical-align: bottom"></a><br>
<div style="clear: both">
  
</div>
<label for="captcha_code"" style="margin: 5px;">Refresh.Type the text(not case sensitive):</label> <br>
<input type="text" name="captcha_code" id="captcha_code" style="margin: 5px;" required>
</div>



         <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
        <button class="btn btn-lg btn-primary btn-block" name="login_btn" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="forgetpass.php">Forgot Password</a>
        <a class="btn btn-lg btn-primary btn-block" href="register_user.php">Register</a>
    </form>



  </div>
 
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>



        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96132279-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
