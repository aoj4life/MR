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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" >
    <!-- Logo -->
    <a href="../home22.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>FD</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BITF</b>und</span>
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
      
          <!-- Notifications: style can be found in dropdown.less -->
       
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../images/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php if($_SESSION["yourname"]) { ?> <?php echo $_SESSION["yourname"]; ?> <?php } ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../images/user.png" class="img-circle" alt="User Image">

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
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="changes_detail.php" class="btn btn-default btn-flat">Changes</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li-->
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
          <img src="../images/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if($_SESSION["yourname"]) { ?> <?php echo $_SESSION["yourname"]; ?> <?php } ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!--form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>
        <li class="treeview">
          <a href="dash.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <!--ul class="treeview-menu">
            <li><a href="../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul-->
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
            <!--li><a href="pro_update.php"><i class="fa fa-database"></i> Update Profile </a></li-->
            
            <!--li><a href="tran_his.php"><i class="fa fa-money"></i> Transaction History</a></li-->
            <!--li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li-->
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
            <li><a href="tree_view.php"><i class="fa fa-sitemap"></i> Tree View</a></li>
          
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
            <li><a href="ads_gen.php"><i class="fa fa-circle-o"></i> Ads</a></li>
          </ul>
        </li>
       
        <li>
          <a href="mailbox.php">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
     
        <li class="header">Wrap Up</li>
        <li><a href="contactsuport.php"><i class="fa fa-circle-o text-aqua"></i> <span>Contact Support</span></a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out text-red"></i> <span>Sign Out</span></a></li>
        <!--li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>S</span></a></li-->
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>