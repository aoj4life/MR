<?php
include 'head.php';
include 'connect.php';
// $phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$yourname = $_SESSION['yourname'];
$userid = $_SESSION['userid'];
$invite = $_SESSION['invite'];



$sql_query = "SELECT invite FROM registration WHERE invite='$email'";
$sql2_query = "SELECT amount FROM givedonations WHERE email='$email' AND status IN ('confirmed', 'cashout')";
$sql3_query = "SELECT amount FROM getdonations WHERE email='$email' AND status='settled'";
$sql4_query = "SELECT Integerity FROM registration WHERE email='$email'";
$result4 = mysqli_query($con, $sql4_query);
$int = mysqli_fetch_row($result4);
$inte = $int[0];
$result3 = mysqli_query($con, $sql3_query);
$count3 = mysqli_num_rows($result3); //help received
$result5 = mysqli_query($con, $sql2_query);
$count5 = mysqli_num_rows($result5);
$result6 = mysqli_query($con, $sql_query);
$count6 = mysqli_num_rows($result6);

if ($count5 >= 0) {
    # code...
    $_SESSION["totalph1"] = $count5;
} else {

    $_SESSION["totalph1"] = 0;
}


if ($count6 >= 0) {
    # code...
    $_SESSION["totalph"] = $count6;
} else {

    $_SESSION["totalph"] = 0;
}
?>

<!--link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"-->
<!--link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"-->

<!--script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="background-color: #00ffcc; margin: 0; padding-bottom: 15px; border-radius: 20px;">
        <section class="content-header">
            <h1>
                Dashboard.....!!!<br>
                <i style="color: red"><strong> Up and Running...!!!<em>We are committed to ensuring <u>winning</u> becomes an <u>attitude</u>.</em> </strong><br><u style="font-size: 17px;"><b><em>Auto Renewal is on for all Bundles.</em></b></u> </i> 

                
            </h1>
            <ol class="breadcrumb">
                <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
                <li class="active">DashBoard</li>
            </ol>
        </section>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #000;">EASY</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse1"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <strong> NGN5,000 GET  NGN10,000...</strong><a href="give_do.php"><button type="button" class="label pull-right bg-blue">TAKE ME. I'M EASY</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #000;">BASIC</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse2"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong> NGN10,000 GET NGN20,000...</strong><a href="give_do.php"><button type="button" class="label pull-right bg-blue">TAKE ME. I'M BASIC</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #000;">COOL</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse3"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong> NGN20,000 GET NGN40,000...</strong><a href="give_do.php"><button type="button" class="label pull-right bg-blue">TAKE ME. I'M COOL</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #000;">OPEN</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse4"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong> NGN50,000 GET NGN100,000...</strong><a href="give_do.php"><button type="button" class="label pull-right bg-blue">TAKE ME. I'M OPEN</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #000;">GOLD</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse5"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong> NGN100,000 GET NGN200,000...</strong><a href="give_do.php"><button type="button" class="label pull-right bg-blue">TAKE ME. I'M GOLD</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #000;">SUPER</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse6"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong> NGN200,000 GET NGN400,000...</strong><a href="give_do.php"><button type="button" class="label pull-right bg-blue">TAKE ME. I'M SUPER</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #000;">SOLID</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse7"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong> NGN250,000 GET NGN500,000...</strong><a href="give_do.php"><button type="button" class="label pull-right bg-blue">TAKE ME. I'M SOLID</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #000;">ROYAL</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse8"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong> NGN500,000 GET NGN1,000,000...</strong><a href="give_do.php"><button type="button" class="label pull-right bg-blue">TAKE ME. I'M ROYALTY</button></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- Main content -->
    <!-- end note-->
    <div class="row">
        <div class="col-lg-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="images/user.jpg" alt="User profile picture">
                    <h3 class="profile-username text-center"><?php if ($_SESSION["yourname"]) { ?> <?php echo $_SESSION["yourname"]; ?> <?php } ?></h3>
                    </span>
                    <p class="text-muted text-center"></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Help Provided</b> <a class="label pull-right bg-green" href="complet=donate.php"><?php if ($_SESSION["totalph1"]) { ?> <?php echo $_SESSION["totalph1"]; ?> <?php } ?>.</a>
                        </li>
                        <li class="list-group-item">
                            <b>Help Received</b> <a class="label pull-right bg-red" href="complet=donate.php"><?php if ($count3) { ?> <?php echo $count3; ?> <?php } ?>.</a>
                        </li>
                        <li class="list-group-item">
                            <b>Downline</b> <a class="label pull-right bg-blue" href="d_downline.php"><?php if ($_SESSION["totalph"]) { ?> <?php echo $_SESSION["totalph"]; ?> <?php } ?>.</a>
                        </li>
                        <li class="list-group-item">
                            <b>Integrity Quotient</b> <a class="label pull-right bg-green"><?php if ($inte) { ?> <?php echo $inte; ?> <?php } ?>%</a>
                        </li>
                    </ul>
                    <a href="give_do.php" class="btn btn-primary btn-block"><b>Give Donations</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- About Me Box -->

            <div class="box box-primary">
               
                <div class="box-header with-border">

                <div>
                   
                    <ul class="footer-social-list" >
               <li style="display: inline; word-spacing: 20px;"><a href="https://www.facebook.com/Mutual-Reserves-1241990729241782/?hc_ref=SEARCH&fref=nf">
                  <i class="fa fa-facebook-square"></i>
               </a></li>
               <li style="display: inline; word-spacing: 20px;"><a href="https://twitter.com/MutualReserves">
                  <i class="fa fa-twitter"></i>
               </a></li>
              
               
               <li style="display: inline;"><a href="#">
                  <i class="fa fa-instagram"></i>
               </a></li>
               
            </ul>
            </div>
            <hr>
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>INFO</strong>
                    <p class="text-muted">
                        <span class="label label-warning">Name:</span> <?php if ($_SESSION["yourname"]) { ?> <?php echo $_SESSION["yourname"]; ?> <?php } ?>   <br>
                        <span class="label label-warning">Email:</span> <?php if ($_SESSION["email"]) { ?> <?php echo $_SESSION["email"]; ?> <?php } ?>  <br>
                        <span class="label label-warning">Phone:</span> <?php if ($_SESSION["phone"]) { ?> <?php echo $_SESSION["phone"]; ?> <?php } ?>  <br>
                        <span class="label label-warning">Reg Date:</span> <?php if ($_SESSION["timestamp"]) { ?> <?php echo $_SESSION["timestamp"]; ?> <?php } ?>  
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted">Africa, Nigeria</p>
                    <hr>
                    <strong><i class="fa fa-pencil margin-r-5"></i> Options</strong>
                    <p>
                        <span class="label label-danger">BITCOIN</span>
                        <span class="label label-success">Deposit Bank</span>
                    </p>
                    <hr>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                    <p><strong><em>The strength of one is the strength of all..This is a platform where everyone is a winner.<br><br>
                                It is a WIN WIN.Just take it.!!!</em></strong>
                    </p>

                    <p style="color: red; font-size: 20px;"><strong><em><u>100 - 50 Rule of Thumb.</u><br> 
                    <ul style="color: blue;">
                        <li>Select a Bundle you can handle.</li>
                        <li>Pay on your bundle when callout is out.</li>
                        <li>Get your 100% reward.</li>
                        <li>Return 50% of your reward which is equal to initial bundle.</li>
                        <li>Get your 100% reward again. </li>
                        <li>Recycle 50% again. </li>
                        <li>Step up your bundle when you are comfortable and be eligible for <u style="color: red;">Bit Bonus.</u></li>
                    </ul>
                    We will always WIN if we are ready. Just take it.!!!</em></strong>
                    </p>

                   <div>
                   <hr>
                   <p style="color: red;"><u><b>Follow us on Social Networks:</b></u></p>
                    <ul class="footer-social-list" >
               <li style="display: inline; word-spacing: 20px;"><a href="https://www.facebook.com/Mutual-Reserves-1241990729241782/?hc_ref=SEARCH&fref=nf">
                  <i class="fa fa-facebook-square"></i>
               </a></li>
               <li style="display: inline; word-spacing: 20px;"><a href="https://twitter.com/MutualReserves">
                  <i class="fa fa-twitter"></i>
               </a></li>
              
               
               <li style="display: inline;"><a href="#">
                  <i class="fa fa-instagram"></i>
               </a></li>
               
            </ul>
            <hr>
            </div>

                </div>
            
            </div>
        </div>
        <div class="col-lg-9">
            <div class="pad margin no-print">
                <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <h4><i class="fa fa-info"></i> INFO PLATE:</h4>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4 class=""><u>Overview of Your Callout and Profile:</u></h4>
                        <ul>
                            <ol>
                                <li><strong>Donation Callout...Give Donations.</strong></li>
                                <li><strong>Donation Callout ... Receive Donations.</strong></li>
                            </ol>
                            <li style="color: #000;"><strong>Ensure that desire Bundle obligation is available before selection. GD & RD are within 20 Business days.  .</strong></li>
                            <li style="color: #000;"><strong>All donations are voluntary.</strong></li>
                            <li style="color: #000;"><strong>YOU SHOULD MAKE ANOTHER DONATION WITHIN 48hr AFTER YOU RECEIVE A DONATION. <em><span>Otherwise, account degradation function will set in.</span></em>Thanks.</strong></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="box box-solid" style="background-color: #23FA1B;">
                <div class="box-header with-border">
                    <i class="fa fa-bullhorn"></i>
                    <h3 class="box-title" >Donation Callout...Provide Donations</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" >
                    <div class="box-group" id="accordion1" >
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne_1">
                                        <span><small>click Here</small></span> Give Donation Detail...:
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne_1" class="panel-collapse collapse in">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-block btn-success btn-small">Details of your intension to give donations will be herein.    </button>
                                        <?php
                                        $sql_query = "SELECT * FROM givedonations WHERE userID='$userid' AND status='unconfirmed' ORDER by time DESC limit 5";
                                        $result_set = mysqli_query($con, $sql_query);
                                        while ($row = mysqli_fetch_row($result_set)) {

                                            $date = $row[8];
                                            // $money = $row[4];
                                            //$amount1 = number_format($row[6], 2, '.', ',');
                                            $money = number_format($row[5], 0, '.', ',');
                                            echo "
                                       <table>
                                      <tr>
                                        <td>
                                            <div class=\"box-body\" >
                                              <div class=\"callout callout\" style=\"height:150px; background-color:#5AFA39;\">
                                                <h4>Donation Request</h4>
                                                 <p>Participant: <strong>$yourname</strong><br>
                                                Amount:<strong> $money <span>NGN</span> </strong><br>
                                                Date: <strong>$date </strong><br>
                                                Status: Request received. Wait to be matched with participant(s).</p>
                                              </div>
                                             
                                            </div>
                                            <!-- /.box-body -->
                                          </div>
                                          <!-- /.box -->
                                        <!--/div-->
                                       
                                        </td>
                                        </tr>
                                        </table>
                                           ";
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $sql_queryc = "SELECT * FROM givedonations WHERE userID='$userid' AND status='confirmed' ORDER by time DESC limit 5";
                                        $result_setc = mysqli_query($con, $sql_queryc);
                                        while ($rowc = mysqli_fetch_row($result_setc)) {

                                            $datec = $rowc[8];
                                            // $money = $row[4];
                                            //$amount1 = number_format($row[6], 2, '.', ',');
                                            $moneyc = number_format($rowc[5], 0, '.', ',');
                                            echo "
                                       <table>
                                      <tr>
                                        <td>
                                 
                                            <div class=\"box-body\" >
                                              <div class=\"callout callout\" style=\"height:170px; background-color:#d8d806;\">
                                                <h4>Donation Request <u style=\"color: red;\">CONFIRMED</u></h4>
                                                 <p>Participant: <strong>$yourname</strong><br>
                                                Amount:<strong> $moneyc <span>NGN</span> </strong><br>
                                                Date: <strong>$datec </strong><br>
                                                Status: Your Donation is Confirmed. Please place Receive Donation Request NOW. Click My Donations => Get Donation.</p>
                                              </div>
                                             
                                            </div>
                                            <!-- /.box-body -->
                                          </div>
                                          <!-- /.box -->
                                        <!--/div-->
                                       
                                        </td>
                                        </tr>
                                        </table>
                                           ";
                                            ?>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-block btn-info btn-small"><span>Details of Matched Participant(s) will be herein.</span></button>

                                           <?php
                                          $sql = "SELECT * FROM matched WHERE donoremail='$email' AND status='cashout_open' ORDER BY datecreated DESC";
                                            $result_set = mysqli_query($con, $sql);


                                         while ($row = mysqli_fetch_array($result_set)) {
                                          $_SESSION['tid'] = $row[1];
                                               $_SESSION['receivermail'] = $row[4];
                                                    $sql2 = "SELECT * FROM bankdetail WHERE email='$row[4]'";
                                                 $reb = mysqli_query($con, $sql2);
                                                $row2 = mysqli_fetch_array($reb);
                                                  $name = $row2[2];
                                                  $accno = $row2[3];
                                                  $bname = $row2[1];
                                                    $contact = $row2[7];
                                                   $accty = $row2[4];

                                                  $date = $row[7];
                                                  $datedue = $row[9];
                                                   // $money = $row[3];
                                                 $money = number_format($row[3], 0, '.', ',');
                                             echo "

                                            <table>
                                            <tr>
                                              <td>
                                                      <div class=\"box-body\" >
                                                           <div class=\"callout callout-info\">
                                                      
                                                      <!--h6>Send Donation To This Pal</h6-->
                                       
                                                      <p style=\"color: #080C0D;\">Participant: $name<br>
                                                      Amount: $money <span>NGN</span> <br>
                                                      Date: $date<br>
                                                      <u style=\"color: red;\">Due Date: $datedue</u><br>   
                                                      Acc Name: $name <br>
                                                      Acc No: $accno<br>
                                                      Bank Name: $bname<br>
                                                      Phone No: $contact<br>
                                                      Status: Ensure payment with the details above.</p>
                                               </div>
                                             
                                              </td>
                                              </tr>
                                              </table>
                                       
                                                 ";
                                                  ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $sql = "SELECT * FROM matched1 WHERE donoremail='$email' AND status='cashout_open' ORDER BY datecreated DESC";
                                        $result_set = mysqli_query($con, $sql);


                                        while ($row = mysqli_fetch_array($result_set)) {
                                            $_SESSION['tid'] = $row[1];
                                            $_SESSION['receivermail'] = $row[4];
                                            $sql2 = "SELECT * FROM bankdetail WHERE email='$row[4]'";
                                            $reb = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_array($reb);
                                            $name = $row2[2];
                                            $accno = $row2[3];
                                            $bname = $row2[1];
                                            $contact = $row2[7];
                                            $accty = $row2[4];

                                            $date = $row[7];
                                            $datedue = $row[9];
                                            // $money = $row[3];
                                            $money = number_format($row[3], 0, '.', ',');
                                            echo "
                                            <table>
                                            <tr>
                                              <td>
                                              
                                              <!--div class=\"col-md-5\"-->
                                                
                                                  
                                       
                                                   
                                                  <!-- /.box-header -->
                                                      <div class=\"box-body\" >
                                                           <div class=\"callout callout-info\">
                                                      
                                                      <!--h6>Send Donation To This Pal</h6-->
                                       
                                                      <p style=\"color: #080C0D;\">Participant:<srong>$name</strong><br>
                                                      Amount: $money <span>NGN</span> <br>
                                                      Date: $date<br>
                                                      <u style=\"color: red;\">Due Date: $datedue</u><br>   
                                                      Acc Name: $name <br>
                                                      Acc No: $accno<br>
                                                      Bank Name: $bname<br>
                                                      Phone No: $contact<br>
                                                      Status: Ensure payment with the details above.</p>
                                               </div>
                                             
                                              </td>
                                              </tr>
                                              </table>
                                       
                                                 ";
                                            ?>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo_2">
                                        <span><small>click Here</small></span>  Accept/Decline Payment
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo_2" class="panel-collapse collapse">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="button" class="btn btn-block btn-success btn-small">Accept Payment.Click Appropriate Button herein</button>
                                            <a href="pop.php">
                                                <button type="button" class="btn btn-block btn-success btn-lg">Accept Payment</button>

                                            </a>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" class="btn btn-block btn-danger btn-small">Decline Payment.Click Appropriate Button herein</button>
                                            <button type="button" class="btn btn-block btn-danger btn-lg">Not Avalaible</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree_3">
                                        <span><small>click Here</small></span>  Proof of Payment Box
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree_3" class="panel-collapse collapse">
                                <div class="box-body">
                                    <button type="button" class="btn btn-block btn-info btn-small">Upload Proof of Payment.Click Appropriate Button herein</button>
                                    <a href="pop.php">
                                        <button type="button" class="btn btn-block btn-info btn-lg">POP Upload</button>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid" style="background-color: #F2F061;">
                <div class="box-header with-border">
                    <i class="fa fa-bullhorn"></i>
                    <h3 class="box-title" >Donation Callout --- Receive Donations</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <span><small>click Here</small></span> Get Donation Detail...
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="row">
                                    <div class="col-lg-6"> 
                                        <button type="button" class="btn btn-block btn-warning btn-small">Details of your intension to Receive Donations will be herein.</button>
                                          <?php
                                        $sql_query = "SELECT * FROM getdonations WHERE email='$email' AND amount!=0 AND status='pending cashout' ORDER by time DESC limit 7";
                                        $result_set = mysqli_query($con, $sql_query);
                                        while ($row = mysqli_fetch_row($result_set)) {

                                            $date = $row[7];
                                                $money = number_format($row[5], 0, '.', ',');
                                              $name = $row[3];
                                       echo "
                                      <table>
                                      <tr>
                                        <td>
                                        
                                        <!--div class=\"col-md-5\"-->
                                          <!--div class=\"box box-default\" >
                                            <!--div class=\"box-header with-border\"-->
                                              <!--i class=\"fa fa-bullhorn\"></i-->
                                 
                                              <!--h3 class=\"box-title\">Callouts</h3-->
                                            </div-->
                                            <!-- /.box-header -->
                                            <div class=\"box-body\" >
                                              <div class=\"callout callout-warning\" style=\"height:170px;\">
                                                <h4>Donation Request</h4>
                                 
                                                <p>Participant: <strong>$name</strong><br>
                                                Amount:<strong> $money <span>NGN</span> </strong><br>
                                                Date: <strong>$date </strong><br>
                                                Status: Your request has been received. Wait patiently to be matched with another participant</p>
                                              </div>
                                             
                                            </div>
                                            <!-- /.box-body -->
                                          </div>
                                          <!-- /.box -->
                                        <!--/div-->
                                       
                                        </td>
                                        </tr>
                                        </table>
                                           ";
    ?>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-6"> 
                                        <button type="button" class="btn btn-block btn-info btn-small">Detail of Matched Participant will be herein</button>
                                        <?php
                                        $sql3 = "SELECT * FROM matched WHERE receiveremail='$email' AND status='cashout_open' ORDER BY datecreated DESC";
                                        $result_set3 = mysqli_query($con, $sql3);


                                        while ($row3 = mysqli_fetch_array($result_set3)) {
                                            $_SESSION['tid'] = $row3[1];
                                            $_SESSION['donoremail'] = $row3[2];
                                            $sql2 = "SELECT * FROM bankdetail WHERE email='$row3[2]'";
                                            $reb = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_array($reb);
                                            //$name = $row2[2];
                                            $accno = $row2[3];
                                            $bname = $row2[1];
                                            $contact = $row2[7];
                                            $name = $row2[8];

                                            $date = $row3[7];
                                            $datedue = $row3[9];
                                            $money = number_format($row3[5], 0, '.', ',');

                                            echo "
                                       <table>
                                      <tr>
                                        <td>
                                        
                                        <!--div class=\"col-md-5\"-->
                                          
                                            
                                 
                                             
                                            <!-- /.box-header -->
                                                <div class=\"box-body\">
                                                     <div class=\"callout callout-info\">
                                                
                                                <h4>Received Donation From This Pal</h4>
                                 
                                                <p style=\"color: #080C0D;\">Participant: <strong>$name</strong><br>
                                                Amount: <strong> $money NGN </strong><br>
                                                Date: $date<br>
                                                <u style=\"color: red;\">Due Date: $datedue</u><br>
                                                Contact No: $contact<br>
                                                Status: $name has been notified to pay you ASAP. You can contact the participant.</p>
                                         </div>
                                       
                                        </td>
                                        </tr>
                                        </table>
                                           ";
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $sql3 = "SELECT * FROM matched1 WHERE receiveremail='$email' AND status='cashout_open' ORDER BY datecreated DESC";
                                        $result_set3 = mysqli_query($con, $sql3);


                                        while ($row3 = mysqli_fetch_array($result_set3)) {
                                            $_SESSION['tid'] = $row3[1];
                                            $_SESSION['donoremail'] = $row3[2];
                                            $sql2 = "SELECT * FROM bankdetail WHERE email='$row3[2]'";
                                            $reb = mysqli_query($con, $sql2);
                                            $row2 = mysqli_fetch_array($reb);
                                            //$name = $row2[2];
                                            $accno = $row2[3];
                                            $bname = $row2[1];
                                            $contact = $row2[7];
                                            $name = $row2[8];

                                            $date = $row3[7];
                                            $datedue = $row3[9];
                                            $money = number_format($row3[5], 0, '.', ',');

                                            echo "
                                       <table>
                                      <tr>
                                        <td>
                                        
                                        <!--div class=\"col-md-5\"-->
                                          
                                            
                                 
                                             
                                            <!-- /.box-header -->
                                                <div class=\"box-body\">
                                                     <div class=\"callout callout-info\">
                                                
                                                <h4>Received Donation From This Pal</h4>
                                 
                                                <p style=\"color: #080C0D;\">Participant: <strong>$name</strong><br>
                                                Amount: <strong>$money NGN</strong> <br>
                                                Date: <strong>$date</strong><br>
                                                <u style=\"color: red;\">Due Date: $datedue</u><br>
                                                Contact No: $contact<br>
                                                Status: $name has been notify to pay you ASAP. You can contact the participant.</p>
                                         </div>
                                       
                                        </td>
                                        </tr>
                                        </table>
                                           ";
                                            ?>
                                            <?php
                                        }


                                        mysqli_close($con);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <span><small>click Here</small></span> Payment Confirmation ...Confirm Proof of Payment as Soon as Donation Hit Your Account 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="button" class="btn btn-block btn-success btn-small">Confirm Payment.Click Appropriate Button herein</button>
                                            <a href="pay=confirmation.php">
                                                <button type="button" class="btn btn-block btn-success btn-lg">Confirmation of Payment</button>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        <span><small>click Here</small></span>  Letter of Proof--- Donation Received
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="box-body">
                                    <a href="letter_approver.php">
                                        <button type="button"  class="btn btn-block btn-warning btn-lg"><u><span><small>click Here</small></span> Letter of Proof of Donation Received</u></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
</section>
<!-- /.content- all your desire contents must be within this section -->
</div>
<!-- /.content-wrapper -->
<!-- for menu bar dropdown-->

          <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96132279-1', 'auto');
  ga('send', 'pageview');

</script>

<?php include 'footer.php'; ?>