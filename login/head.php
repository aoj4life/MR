<?php 
error_reporting(0);
   // the first is the lifetime of cookie, places cookie can be accsss,domain, shh connectn, http only only by php
     session_set_cookie_params(time()+600,'/','localhost','false','true');
     //require_once 'lib/PHPMailer-master/PHPMailerAutoload.php'
      session_start(); 
      require_once '../lib/PHPMailer/PHPMailerAutoload.php';
      //session_regenerate_id(true);
   
   $timeout = 600; // Number of seconds until it times out.
    
   // Check if the timeout field exists.
   if(isset($_SESSION['timeout'])) {
       // See if the number of seconds since the last
       // visit is larger than the timeout period.
       $duration = time() - (int)$_SESSION['timeout'];
       if($duration > $timeout) {
           // Destroy the session and restart it.
           //session_destroy();
          // session_start();
          include 'logout.php';
   
   
       }
   }
    
   // Update the timout field with the current time.
   $_SESSION['timeout'] = time();
   
      
      if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
      header("Location: login_res.php");
      exit;
      }
      
      
      ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
      <meta name="keywords" content="Community,Helpers,mmm,money,fund,bitcoin"/>
      <!--script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script-->
      <script src="js/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



      <title>Donations. Provide Help AND Get Help. #The World Best Platform for Funding Your Daily Projects</title>
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="style2.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
      <script type='application/javascript' src="../plugins/fastclick/fastclick.js"></script>
      
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
      <header class="main-header" >
         <!-- Logo -->
         <a href="../index.php" class="logo">
         <span class="logo-mini"><b>M</b>R</span>
         <span class="logo-lg"><b>MR</b>eserves</span>
         </a>
         <!-- Header Navbar: style can be found in header.less -->
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  <li class="dropdown messages-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-envelope-o"></i>
                     <span class="label label-success">Mail</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="header">Your Messages</li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                     </ul>
                  </li>
                  <!-- Notifications: style can be found in dropdown.less -->
                  <li class="dropdown notifications-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-bell-o"></i>
                     <span class="label label-warning">Note</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="header">Your Notifications</li>
                        <li>
                           <!-- inner menu: contains the actual data -->
                           <ul class="menu">
                           </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                     </ul>
                  </li>
                  <!-- Tasks: style can be found in dropdown.less -->
                  <li class="dropdown tasks-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-flag-o"></i>
                     <span class="label label-danger">Onus</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="header">Your Tasks</li>
                        <li>
                           <!-- inner menu: contains the actual data -->
                           <ul class="menu">
                           </ul>
                        </li>
                        <li class="footer">
                           <a href="#">View all tasks</a>
                        </li>
                     </ul>
                  </li>
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <img src="images/user.png" class="user-image" alt="User Image">
                     <span class="hidden-xs"><?php if($_SESSION["yourname"]) { ?> <?php echo $_SESSION["yourname"]; ?> <?php } ?></span>
                     </a>
                     <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                           <img src="images/user.png" class="img-circle" alt="User Image">
                           <p>
                              <?php if($_SESSION["yourname"]) { ?> <?php echo $_SESSION["yourname"]; ?> <?php } ?>
                              <small>Member Since...<?php if($_SESSION["timestamp"]) { ?> <?php echo $_SESSION["timestamp"]; ?> <?php } ?></small>
                           </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                           <div class="row">
                              <div class="col-xs-4 text-center ">
                                 <a href="give_do.php">Give Donations</a>
                              </div>
                              <div class="col-xs-4 text-center">
                                 <a href="get_do.php">Get Donations</a>
                              </div>
                              <div class="col-xs-4 text-center">
                                 <a href="complet=donate.php">Completed Donations</a>
                              </div>
                           </div>
                        </li>
                        <li class="user-footer">
                           <div class="row">
                              <div class="col-xs-4 text-center ">
                                 <a href="bank_acc.php" class="btn btn-default btn-flat">Bank Acc.</a>
                              </div>
                              <div class="col-xs-4 text-center ">
                                 <a href="changes_detail.php" class="btn btn-default btn-flat">Changes</a>
                              </div>
                              <div class="col-xs-4 text-center ">
                                 <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
               <div class="pull-left image">
                  <img src="images/user.png" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                  <p><?php if($_SESSION["yourname"]) { ?> <?php echo $_SESSION["yourname"]; ?> <?php } ?> </p>
                  <a href=""><i class="fa fa-circle text-success"></i> Online </a>
               </div>
            </div>
            <ul class="sidebar-menu">
               <li class="header">MAIN MENU</li>
               <li class="treeview">
                  <a href="dash.php">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-balance-scale"></i>
                  <span>MY Donations</span>
                  <span class="pull-right-container">
                  <span class="label label-primary pull-right">GD_RD</span>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="give_do.php"><i class="fa fa-diamond"></i> Give Donation</a></li>
                     <li><a href="get_do.php"><i class="fa fa-heart"></i> Get Donation</a></li>
                     <li><a href="pop.php"><i class="fa fa-exchange"></i> Proof of Payment {POP}</a></li>
                     <li><a href="pay=confirmation.php"><i class="fa fa-exchange"></i> Confirm Donation Received</a></li>
                     <li><a href="complet=donate.php"><i class="fa fa-check-square-o"></i> Completed Donations</a></li>
                     <li><a href="letter_approver.php"><i class="fa fa-thumbs-o-up"></i> Letter of Proof</a></li>
                  </ul>
               </li>
               <li>
                  <a href="#">
                  <i class="fa fa-line-chart text-green"></i> <span>BIT BOX</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green">my money</small>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="my_bitbox.php"><i class="fa  fa-heartbeat"></i>My BitBox</a></li>
                     <li><a href="bonus_ref.php"><i class="fa fa-object-group"></i>My Bonuses</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-user"></i>
                  <span>User Account</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="bank_acc.php"><i class="fa fa-bank"></i> Bank Accounts</a>
                     <li><a href="changes_detail.php"><i class="fa fa-eraser"></i> Changes</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-users"></i>
                  <span>Downline</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="d_downline.php"><i class="fa fa-circle-o"></i> Direct Downline</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-bullhorn"></i> <span>Tell A Friend<br />{Build Capacity}</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="referral_url.php"><i class="fa fa-circle-o"></i> Referral Link</a></li>
                     <li><a href="telegram_url.php"><i class="fa fa-circle-o"></i> Telegram Link</a></li>
                  </ul>
               </li>
               <li>
                  <a href="mailbox.php">
                  <i class="fa fa-envelope"></i> <span>Mailbox</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">.</small>
                  <small class="label pull-right bg-green">.</small>
                  <small class="label pull-right bg-red">.</small>
                  </span>
                  </a>
               </li>
               <li class="header">Wrap Up</li>
               <li><a href="contactsuport.php"><i class="fa fa-circle-o text-aqua"></i> <span>Contact Support</span></a></li>
               <li><a href="logout.php"><i class="fa fa-sign-out text-red"></i> <span>Sign Out</span></a></li>
            </ul>
         </section>
         <!-- /.sidebar -->
      </aside>