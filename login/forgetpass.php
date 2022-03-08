<?php
session_start();

include 'token.php'; 
require_once '../lib/PHPMailer/PHPMailerAutoload.php';
     
   
   $timeout = 420; // Number of seconds until it times out.
    
   // Check if the timeout field exists.
   if(isset($_SESSION['timeout'])) {
      
       $duration = time() - (int)$_SESSION['timeout'];
       if($duration > $timeout) {
        
          include 'logout.php';
   
   
       }
   }
    
   // Update the timout field with the current time.
   $_SESSION['timeout'] = time();


?>



<html>
<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 

  <title>Forgot Password</title>

  <link href="forgetpass-style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="securimage/securimage.css" media="screen">
  <link rel="stylesheet" href="securimage/securimage.css" media="screen">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div> 
<form name="frmForgot" id="frmForgot" method="POST" action="forgetpass_action.php">
 <?php 
                     if (isset($_SESSION['errMsg'])) {
                       echo "<div id='error_msg' style='margin-top: 5px; margin-bottom: 5px;'>".$_SESSION['errMsg']."</div>";
                       unset($_SESSION['errMsg']);
                     }
                     ?>
                     <?php 

                      if (isset($_SESSION['errMsg2'])) {
                       echo "<div id='error_smsg' style='margin-top: 5px; margin-bottom: 5px;'>".$_SESSION['errMsg2']."</div>";
                       unset($_SESSION['errMsg2']);

                     }
                     ?>

<h1>Password Recovery?</h1>
<div class="field-group">
    <div><label for="email">Email</label></div>
    <div><input type="email" name="email" id="user-email" class="input-field" required></div>
  </div>
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
  
  <div class="field-group">
    <div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>

  </div>  

<br>
<br>

<input type="hidden" name="_token1" value="<?php echo $_SESSION['_token1']; ?>">
<a class="btn btn-lg btn-primary" href="login_res.php">Login</a>
     
</form>

</div> 



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>