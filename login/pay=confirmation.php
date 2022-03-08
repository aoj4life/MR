<?php 
      include 'head.php';
      include 'token.php';
     //session_start();
      include 'connect.php';
      $email = $_SESSION['email']; 
      $yourname = $_SESSION['yourname']; 
      $userid = $_SESSION['userid'];
      $invite = $_SESSION['invite'];
   
   
   
   ?>
<!-- Content Wrapper. Contains page content -->


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>

<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<link rel="stylesheet" href="stylebank.css">
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div style="background-color: #00ffcc; margin: 0;padding-bottom: 15px; border-radius: 20px;">
      <section class="content-header">
         <h1>
            Payment Confirmation of received Donations!!!!<br>
            <i style="color: red"><strong> Up and Running...!!!</strong> </i>
         </h1>
         <ol class="breadcrumb">
            <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
            <!--li><a href="#">Examples</a></li-->
            <li class="active">Payment Confirmations</li>
         </ol>
      </section>
   </div>
   <!-- Main content -->
   <section class="content">

    <?php 
         if (isset($_SESSION['errMsg33'])) {
           echo "<div id='error_msg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg33']."</div>";
           unset($_SESSION['errMsg33']);
         }
         ?>
      <?php 
         if (isset($_SESSION['errMsg'])) {
           echo "<div id='error_smsg' style='margin-top: 5px; margin-bottom: 5px; color: #000;'>".$_SESSION['errMsg']."</div>";
           unset($_SESSION['errMsg']);
         }
         ?>
      <!-- note-->
      <div class="pad margin no-print">
         <div class="callout callout-info" style="">
            <h4><i class="fa fa-info"></i> Note:</h4>
            <!--div class="callout callout-danger"-->
            <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>     
               <h4>Confirmation of Fund Received is Irreversible: The Understanding of the Following is Paramount:</h4>
               <ul>
                  
                     <li><strong>I am not under any duress or compulsion to confirmed fund.</strong></li>
                     <li><strong>That the POP am confirming is Genuine.</strong></li>
                     <li><strong>Expected/Actual donation amount is confirmed in my conventional bank account.Do not confirmed without deposit in your bank account. Thanks.</strong></li>
                  
                  <li style="color: #000;"><strong>All donations are voluntary.</strong></li>
                  <li style="color: #000;"><strong><u>Fake POP when established; the participant will automatically forfeit all of his/her exiting bonuses otherwise the negative value will subsist pending bonuses accretion.</u></strong></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- end note-->
     
      <div class="row">
         <div class="col-md-12">
            <div id="resp" style="overflow-x: auto; border: solid #999FA1;">
               <div id="body">
                  <table id="myTable" class="table table-striped">
                     <thead>
                        <tr>
                           <td>TID</td>
                           <td>Date Created</td>
                           <td>Receiver Value</td>
                           <td>Donor Name</td>
                           <td>Donor Contact</td>
                         
                           <td>Actions</td>
                           <td>Status</td>
                           <td>View POP</td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $sql="SELECT * FROM matched WHERE receiveremail='$email' AND status='cashout_open' ORDER BY datecreated";
                           $result_set=mysqli_query($con,$sql);
                           
                           
                           $datas = array();       // create a variable to hold the information from the queries
                           // $row = mysqli_fetch_assoc($result_set);
                           
                           
                           
                            
                           
                           
                           while ($row=mysqli_fetch_array($result_set))
                           {
                             //$data[0] = $row;
                           
                            $_SESSION['tid'] = $row[0];
                            $tid = $row[0];
                             $_SESSION['donoremail'] = $row[2];
                             $donoremail = $row[2];
                             $_SESSION['noimage'] = $row[6];
                           
                            $sql2="SELECT * FROM bankdetail WHERE email='$row[2]'";
                            $reb = mysqli_query($con,$sql2);
                            $row2 = mysqli_fetch_array($reb);
                            $_SESSION['name'] = $row2[8];
                            $_SESSION['contact'] = $row2[7];
                           
                            ?>
                        <tr>
                           <td><?php echo $row[1]; ?></td>
                           <td><?php echo $row[7]; ?></td>
                           <td><?php echo $row[5]; ?></td>
                           <td><?php echo $row2[8]; ?></td>
                           <td><?php echo $row2[7]; ?></td>
                           <td>
                              <?php
                                 //if ($row[6]) {
                                  echo " $row[6]
                                  <form  method=\"post\" action=\"action_confirm.php\">
                                  <input type=\"submit\" style=\"background-color: red;\" name=\"confirmed1\" value=\"Confirm Donation Received\">
                                  <input type=\"hidden\" name=\"_token1\" value=\"$_SESSION[_token1]\">
                                  <input type=\"hidden\" name=\"tid1\" value=\"$tid\">
                                  <input type=\"hidden\" name=\"demail\" value=\"$donoremail\">
                                  </form>  ...Awaiting confirmation.";
                                 // }
                                 
                                 ?>
                              ..POP Image.
                           </td>
                           <td><?php echo $row[8]; ?></td>
                           <td>click below.<br><a href="uploads/<?php echo $row[6] ?>" target="_blank" rel="noopener noreferrer"><?php if($row[6]) { ?> <?php echo "view file"; ?> <?php } ?> </a></td>
                        </tr>
                        </td>
                        </tr>
                        <?php
                           }
                           ?>
                        <?php
                           $sql1="SELECT * FROM matched1 WHERE receiveremail='$email' AND status='cashout_open' ORDER BY datecreated";
                           $result_set1=mysqli_query($con,$sql1);
                           
                           
                           $datas = array();       // create a variable to hold the information from the queries
                           // $row = mysqli_fetch_assoc($result_set);
                           
                           
                           
                            
                           
                           
                           while ($row1=mysqli_fetch_array($result_set1))
                           {
                             //$data[0] = $row;
                           
                            $_SESSION['tid'] = $row1[0];
                            $tid2 = $row1[0];
                             $_SESSION['donor'] = $row1[2];
                             $donor2 = $row1[2];
                             $_SESSION['noimage'] = $row1[6];
                           
                            $sql21="SELECT * FROM bankdetail WHERE email='$row1[2]'";
                            $reb1 = mysqli_query($con,$sql21);
                            $row3 = mysqli_fetch_array($reb1);
                            $_SESSION['name'] = $row3[8];
                            $_SESSION['contact'] = $row3[7];
                           
                            ?>
                        <tr>
                           <td><?php echo $row1[1]; ?></td>
                           <td><?php echo $row1[7]; ?></td>
                           <td><?php echo $row1[5]; ?></td>
                           <td><?php echo $row3[8]; ?></td>
                           <td><?php echo $row3[7]; ?></td>
                           <td>
                              <?php
                                 //if ($row1[6]) {
                                  echo " $row1[6]
                                  <form  method=\"post\" action=\"action_confirm2.php\">
                                  <input type=\"submit\" style=\"background-color: red;\" name=\"confirmed2\" value=\"Confirm Donation Received\">
                                  <input type=\"hidden\" name=\"_token\" value=\"$_SESSION[_token]\">
                                  <input type=\"hidden\" name=\"tid11\" value=\"$tid2\">
                                  <input type=\"hidden\" name=\"demail1\" value=\"$donor2\">
                                  </form>  ...Awaiting confirmation. ";
                                 //}
                                 
                                 ?>
                              ..POP Image.
                              
                           </td>
                           <td><?php echo $row1[8]; ?></td>
                           <td>click below.<br><a href="uploads/<?php echo $row1[6] ?>" target="_blank" rel="noopener noreferrer"><?php if($row1[6]) { ?> <?php echo "view file"; ?> <?php } ?> </a></td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script>
   $(document).ready(function(){
       $('#myTable').dataTable();
   });
</script>
<?php include 'footer.php'; ?>