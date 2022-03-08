<?php
session_start();
include('action-login.php'); // Includes Login Script


?>


<html>
<head>
<!--script>alert("Incorrect security code entered");</script-->
<meta charset="utf-8">
<!-- Tell the browser to be responsive to screen width -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<title>User Login</title>

  

	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="securimage/securimage.css" media="screen">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.min.css">
<!-- Optional theme >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"-->

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background: url('background2.jpg') center-top repeat-x;">


 <div id="navbar" class="navbar navbar-default navbar-fixed-top" style="background-color: #0088ff;">
            <div class="navbar-container" id="navbar-container">
                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left" >
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="../home.php" class="navbar-brand" style="color: #ffffff;">
                       
                           <i class="fa fa-university" aria-hidden="true"></i><strong>
                            BIT<span>Fund</span></strong>
                              
                    </a>

                    <!-- /section:basics/navbar.layout.brand -->

                    <!-- #section:basics/navbar.toggle -->

                    <!-- /section:basics/navbar.toggle -->
                </div>
                </div>
                </div>


<div class="container">

         <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
         <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>



         <?php 
             if (isset($_SESSION['message'])) {
               echo "<div id='error_msg'>".$_SESSION['message']."</div>";
               unset($_SESSION['message']);
             }
          ?>

       

   <div style="max-width:50% ; height: auto; border-radius: 10px; border: solid blue; margin-top: 40px; margin-left: 300px; background-color: #fff;">

    <div style="height: 50px; margin: 0px; max-width:200% ;  background-color: blue;">
        <h2 class="form-signin-heading" style="margin: 0px; padding: 10px; color: #fff;">Login</h2>

      </div>

      <form class="form-signin" method="POST">

           
            <?php if(!empty($_SESSION['errMsg'])) { ?><div id="errMsg" class="btn btn-lg btn-primary btn-block" style="background-color: #FF8205; margin-bottom: 10px;"> <?php echo $_SESSION['errMsg']; ?> </div><?php } ?>
        
       <?php unset($_SESSION['errMsg']); ?>

        <span style="color: red;"><?php echo $error; ?></span>
     
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
         <label for="inputEmail" class="sr-only">Email address</label>
	      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email(Email use during signup) " required>
	</div>
       
       <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>



       <!--this is captcha intro-->
      


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






        <button class="btn btn-lg btn-primary btn-block" name="login_btn" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="forgot-pass/index.php">Forgot Password</a>
        <a class="btn btn-lg btn-primary btn-block" href="register_user.php">Register</a>
      </form>


      </div>
</div>


<!-- offline/online -->
<!-- jQuery (necessary for Bootstrap’s JavaScript plugins) -->
<script type="text/javascript" src="jama.js"></script>
<script type="text/javascript"  src="script/js/jquery-3.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="script/js/bootstrap.min.js"></script>

<!-- use this when you are live -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
   
 
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>