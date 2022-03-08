<?php include 'head.php'; 
   include 'connect.php';
   include 'token.php';
   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname']; 
   $userid = $_SESSION['userid'];
   $invite = $_SESSION['invite'];
   $phone = $_SESSION['phone'];
   
   
   ?>
   <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

<!--link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"-->

<div class="content-wrapper">
   
  
   <div style="background-color: #00ffcc; margin: 0; max-height: auto; max-width: auto; padding-bottom: 15px; border-radius: 20px;">
      <section class="content-header">
         <h1>
            Give Donations without compulsion!!!!<br>
            <i style="color: red"><strong> Up and Running...!!!</strong> </i>
         </h1>
         <ol class="breadcrumb">
            <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
            <!--li><a href="#">Examples</a></li-->
            <li class="active">Give Donations</li>
         </ol>
      </section>
   </div>
   <!-- Main content -->
   <?php 
      if (isset($_SESSION['errMsg2'])) {
        echo "<div id='error_smsg' style='margin-top: 5px; margin-bottom: 5px; color: #000;'>".$_SESSION['errMsg2']."</div>";
        unset($_SESSION['errMsg2']);
      }
      ?>
   <?php 
      if (isset($_SESSION['errMsg'])) {
        echo "<div id='error_msg' style='margin-top: 5px; margin-bottom: 5px; color: #000;'>".$_SESSION['errMsg']."</div>";
        unset($_SESSION['errMsg']);
      }
      ?>
   <section class="content">
      <!-- note-->
      <div class="pad margin no-print">
         <div class="callout callout-info" style="margin-bottom: 0!important; margin-top: 0;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            <div class="alert alert-warning alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4 class="">By participating and making donation, you understand that:</h4>
               <ul>
                  <li>
                     the  <strong>2 steps</strong> herein must be completed
                     <ol>
                        <li><strong>Donate desire amount without any compulsion.</strong></li>
                        <li><strong>Submit the Donation form.</strong></li>
                     </ol>
                  </li>
                  <li style="color: #000;"><strong>You will have to wait for a given period before you are matched to another participant(s).</strong></li>
                  <li><strong>Details of the assigned participant(s) will be displayed on your DASHBOARD for appropriate actions. Channels of communication can be opened.</strong></li>
                  <li style="color: #000;"><strong>You need to upload POP {Proof of Payment} of transaction to the assigned participant(s) for confirmation of donation within stipulated time.</strong></li>
                  <li style="color: #000;"><strong><u>All confirmed donations are voluntary and irreversible.</u></strong></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- end note-->
      <!--hotizontal form-->
      <div class="row">
         <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="box box-info">
               <div class="box-header with-border" style="background-color: #3462F7; color: white;">
                  <h3 class="box-title">Donations Form</h3>
               </div>
               <form class="form-horizontal"  method="post" action="give_do_action.php">
                  <?php 
                     if (isset($_SESSION['errMsg'])) {
                       echo "<div id='error_msg' style='margin-top: 5px; margin-bottom: 5px;'>".$_SESSION['errMsg']."</div>";
                       unset($_SESSION['errMsg']);
                     }
                     ?>
                  <div class="box-body">
                     <div class="form-group">
                     
                        <label for="inputPassword3" class="col-sm-2 control-label">Bundles</label>
                   
                        <div class="col-xs-10">
                        
                    <select class="selectpicker" name="Payment" id="Payment_paybank"  required>
                           
                              <option value="8" selected="selected">Select a Bundle</option>
                              <option value="0">EASY..5,000</option>
                              <option value="1">BASIC..10,000</option>
                              <option value="2">COOL..20,000</option>
                              <option value="3">OPEN..50,000</option>
                              <option value="4">GOLD..100,000</option>
                              <option value="5">SUPER..200,000</option>
                              <option value="6">SOLID..250,000</option>
                              <option value="7">ROYAL..500,000</option>
                          
                           </select>
                         
                        </div>
                          <!--/a-->
                     </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Currency</label>
                        <div class="col-xs-10">
                  <select class="selectpicker" name="Payment2" id="Payment_currency" required>
                              <option value="aud">Australia Dollar</option>
                              <option value="bit">BitCoin</option>
                              <option value="gbp">British Pound</option>
                              <option value="can">Canada Dollar</option>
                              <option value="eur">Euro</option>
                              <option value="hkd">Hong Kong Dollar</option>
                              <option value="isk">Iceland Krona</option>
                              <option value="inr">India Rupee</option>
                              <option value="idr">Indonesia Rupiah</option>
                              <option value="jpy">Japan Yen</option>
                              <option value="kes">Kenyan Shilling</option>
                              <option value="myr">Malaysia Ringgit</option>
                              <option value="mxn">Mexico Peso</option>
                              <option value="nzd">New Zealand Dollar</option>
                              <option value="usd">US Dollar</option>
                              <option value="php">Philippine Peso</option>
                              <option value="rub">Russia Ruble</option>
                              <option value="sar">Saudi Arabia Riyal</option>
                              <option value="sgd">Singapore Dollar</option>
                              <option value="zar">South Africa Rand</option>
                              <option value="krw">South Korea Won</option>
                              <option value="sek">Sweden Krona</option>
                              <option value="chf">Switzerland Franc</option>
                              <option value="twd">Taiwan New Dollar</option>
                              <option value="thb">Thailand Baht</option>
                              <option value="ngn">Nigeria Naira</option>
                              <option value="ngn" selected="selected">Nigeria Naira</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="bankname" class="col-sm-2 control-label">Bundle Value</label>
                        <div class="col-xs-10">
                           <input type="number" name="ddamount" class="form-control" id="amount" placeholder="Donate Desire Amount. only number allow e.g 5000 not 5,000" required>
                        </div>
                     </div>
                     <div class="box-footer">
                        <button style="height: 90px; border-radius: 40px; background-color:#5AFA39;  box-shadow: 0 8px 0 #1b383b;" type="submit" class="btn btn-block btn btn-lg"><span>Give Donations {Help a pal}.</span></button>
                        <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                     </div>
                  </div>
                  <!-- /.box-footer -->
               </form>
            </div>
         </div>
         <div class="col-md-5">
            <!-- call out start here -->
            <?php
               $sql_query="SELECT * FROM givedonations WHERE userID='$userid' AND status='unconfirmed' ORDER by time DESC limit 10";
               $result_set=mysqli_query($con,$sql_query);
               
               while($row=mysqli_fetch_row($result_set))
               {
               
                $date = $row[8];
                $money = number_format($row[5], 0, '.', ',');
                    echo "
                     <table>
                    <tr>
                      <td>
                      
                      <!--div class=\"col-md-5\"-->
                        <div class=\"box box-default\" style=\"height:210px;\">
                          <div class=\"box-header with-border\">
                            <i class=\"fa fa-bullhorn\"></i>
               
                            <h3 class=\"box-title\">Callouts</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class=\"box-body\" >
                            <div class=\"callout callout\" style=\"height:150px; background-color:#5AFA39;\">
                              <h4>Donation Request</h4>
               
               
                              <p>Participant: <strong><span class=\"hidden-xs\">$yourname</span></strong><br>
                              Amount:<strong> $money <span>NGN</span> </strong><br>
                              Date: <strong>$date </strong><br>
                              Status: Your request has been received. Detail of beneficiary will be on your PO soon.Thanks.</p>
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
               mysqli_close($con);
               ?>
            <!--end form-->
         </div>
      </div>
   </section>
</div>
<!-- /.content-wrapper -->



<?php include 'footer.php'; ?>