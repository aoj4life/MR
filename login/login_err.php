<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<!-- Tell the browser to be responsive to screen width -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> 

	<title>User Login</title>

	<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" type="text/css" href="style2.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.min.css">
<!-- Optional theme >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"-->

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background:#e2f6ff url('images/background.gif') center top no-repeat;">


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



      <form class="form-signin" method="POST" action="action-login.php">
        <h2 class="form-signin-heading">Login</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
         <label for="inputEmail" class="sr-only">Email address</label>
	      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email(Email use during signup) " required>
	</div>
       
       <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>



       <!--this is captcha intro-->
       <img id="captcha" style="margin: 10px;" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
       <input type="text" name="captcha_code" size="10" maxlength="6" />
       <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>







         <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
        <a class="btn btn-lg btn-primary btn-block" href="register_user.php">Register</a>
      </form>
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