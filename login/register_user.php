<?php
error_reporting(0);
   session_start();
   include 'token.php'; 
   ?>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <title>My Money Methods. Twin Donations Hub :User Registration</title>
      <link rel="stylesheet" href="securimage/securimage.css" media="screen">
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
      <script type='application/javascript' src="../plugins/fastclick/fastclick.js"></script>
   </head>
   <body>
      <div id="navbar" class="navbar navbar-default navbar-fixed-top" style="background-color: #0088ff;">
         <div class="navbar-container" id="navbar-container">
            <!-- /section:basics/sidebar.mobile.toggle -->
            <div class="navbar-header pull-left" >
               <!-- #section:basics/navbar.layout.brand -->
               <a href="../index.php" class="navbar-brand" style="color: #ffffff;">
               <i class="fa fa-university" aria-hidden="true"></i><u><strong>
               M<span>Reserves</span></strong></u>
               </a>
            </div>
         </div>
      </div>
      <div class="register-box"  style="margin-top: 50px;">
         <div class="register-logo">
            <b>MR...</b>Registration
         </div>
         <div class="register-box-body" style="border: solid;">
            <p class="login-box-msg">New Membership</p>
            <form action="action-register.php" method="post">
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
               <div class="form-group has-feedback">
                  <input type="text" class="form-control" name="yourname" placeholder="Full name" required>
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="number" class="form-control" name="phone" placeholder="Phone Number" required>
                  <span class=" fa-phone form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="password2" placeholder="Retype password" required>
                  <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                  <label>Referrer Email Address.<span><em> Edit if not admin</em></span></label>
                  <input type="email" class="form-control" value="admin@mreserves.com" name="invite" placeholder="Invite: Email address of your Upline">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
               </div>
               <div>
                  <h4>How did you find out</h4>
               </div>
               <label class="block clearfix">
                  <select class="form-control" required="required" name="medium" id="RegistrationForm_location">
                     <option value="0">On the Web</option>
                     <option value="5">Friends</option>
                     <option value="6">SMS</option>
                     <option value="7">social network</option>
                     <option value="8">Banners</option>
                     <option value="9">Video message</option>
                     <option value="11">other webadd</option>
                     <option value="12">others</option>
                  </select>
               </label>
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
                  <label for="captcha_code">Type the text:</label> <br>
                  <input type="text" name="captcha_code" id="captcha_code" style="margin: 5px;" required>
               </div>
               <div class="row" style="margin: 10px;">
                  <div class="col-xs-12">
                     <div class="checkbox icheck">
                        <label>
                        <input type="checkbox"  required> <i><strong>I agree to the condition that I am in the best condition 
                        of mind and memory, that I am not under any compulsion to engage in MReserves. I am responsible for my decisions. This undertaking is clearly understood</strong></i>  <a href="#"></a>
                        </label>
                     </div>
                  </div>
                  <!-- /.col -->
               </div>
               <input type="hidden" name="_token1" value="<?php echo $_SESSION['_token1']; ?>">
               <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
               <a class="btn btn-lg btn-primary btn-block" href="login_res.php">Login</a>
            </form>
         </div>
         <!-- /.form-box -->
      </div>
      <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
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