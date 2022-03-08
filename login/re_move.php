<?php 
error_reporting(0);
session_start(); ?>

<html>
<head>
<meta charset="utf-8">
<!-- Tell the browser to be responsive to screen width -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> 

	<title>Registration.</title>

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="style2.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
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





    <form>

                <div class="register-box"  style="margin-top: 50px;">
  <div class="register-logo">
    <a href="#"><b>MR</b>eserves</a>
  </div>

           <?php 
                  if (isset($_SESSION['errMsg2'])) {
                   echo "<div id='error_smsg' style='margin-top: 5px; margin-bottom: 5px;'>".$_SESSION['errMsg2']."</div>";
                   unset($_SESSION['errMsg2']);
                  
                  }
                  ?>
       

         <a class="btn btn-lg btn-primary btn-block" href="login_res.php">Login</a>
        <a class="btn btn-lg btn-primary btn-block" href="register_user.php">Register</a>
       
      <div class="row" style="margin: 10px;">
        <div class="col-xs-12">
        

        </div>


        <!-- /.col -->
    
      </div>
    


    <!--a href="login.html" class="text-center">I already have a membership</a-->
  </div>
  </form>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

