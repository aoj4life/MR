<?php session_start(); 
   if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
   header("Location: login_res.php");
   exit;
   }
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>BITFund P2P</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="hold-transition skin-blue sidebar-mini" >
      <div class="wrapper" style="max-height: 800px;">
         <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               
               <!-- logo for regular state and mobile devices -->
               <span class="logo-lg"><b>MR</b>eserves</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
               <!-- Sidebar toggle button-->
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- Messages: style can be found in dropdown.less-->

                         <li class="dropdown messages-menu">
                        <a href="logout.php" class="fa fa-diamond">
                        <i class="fa fa-times"></i>
                        <span class="label label-success">Logout</span>
                        </a>
                        
                        <ul class="dropdown-menu">
                           <li class="header"></li>
                           <li>
                              <!-- inner menu: contains the actual data -->
                              <ul class="menu">
                              </ul>
                           </li>
                           <li class="footer"><a href="#"></a></li>
                        </ul>
                     </li>
                   
                     <!-- Notifications: style can be found in dropdown.less -->
                   
                    
                     <!-- User Account: style can be found in dropdown.less -->
                     <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../images/user.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php if($_SESSION["yourname"]) { ?> <?php echo $_SESSION["yourname"]; ?> <?php } ?></span>
                        </a>
                        <ul class="dropdown-menu">
                           <!-- User image -->
                           <!-- Menu Body -->
                           <!-- Menu Footer-->
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
                  <div style="color: red;">
                  Blocked User</div>
                  <small>For some reason(s) your account remain blocked.</small>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Blocked page</li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <!-- Default box -->
               <div class="box">
                  <div class="box-header with-border">
                     <h3 class="box-title">Options</h3>
                     <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                     </div>
                  </div>
                  <div class="box-body">
                     Send a mail to admin stating reasons why your account remain blocked. Herein are the admin mail contact<br>
                     <strong> support@mreserves.com<br> admin@bmreserves.com.</strong>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     Response will be ASAP.<br> If reasons given are not convincing your account will be deleted. <br>THANKS.
                  </div>
                  <!-- /.box-footer-->
               </div>
               <!-- /.box -->
            </section>
            <!-- /.content -->
         </div>


              <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-headers">
               <h1><div style="color: red;">
                  Blocked User</div>
                  <small>For some reason(s) your account remain blocked.</small>

               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
                  <li class="active"></li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <!-- Default box -->
               <div class="box">
                  <div class="box-header with-border">
                     <h3 class="box-title">Options</h3>
                     <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                     </div>
                  </div>
                  <div class="box-body">
                     Send a mail to admin stating reasons why your account remain blocked. Herein are the admin mail contact<br>
                     <strong> support@mreserves.com<br> admin@mreserves.com.</strong>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     Response will be ASAP.<br> If reasons given are not convincing your account will be deleted. <br>THANKS.
                  </div>
                  <!-- /.box-footer-->
               </div>
               <!-- /.box -->
            </section>
            <!-- /.content -->
         </div>
         

          <footer class="main-footer">
            <div class="pull-right hidden-xs">
               <b>Version</b> 2.3.7
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
            reserved.
         </footer>
        
      </div>

      
      <!-- /.content-wrapper -->
      <!-- jQuery 2.2.3 -->
      <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
      <!-- Bootstrap 3.3.6 -->
      <script src="../../bootstrap/js/bootstrap.min.js"></script>
      <!-- SlimScroll -->
      <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="../../plugins/fastclick/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/app.min.js"></script>
   </body>
</html>