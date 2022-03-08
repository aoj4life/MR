<?php include 'head.php';
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
   <div style="background-color: #00ffcc; margin: 0; padding-bottom: 15px; border-radius: 20px;">
      <section class="content-header">
         <h1>
            All Donations Bonuses -Referral,Bit and other Bonuses!!!!!!!!!!<br>
            <i style="color: red"><strong><em> Up and Running...!!!</em></strong> </i>
         </h1>
         <ol class="breadcrumb">
            <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
            <!--li><a href="#">Examples</a></li-->
            <li class="active">Bonuses</li>
         </ol>
      </section>
   </div>
   <!-- Main content -->
   <section class="content">
      <!-- note-->
      <div class="pad margin no-print">
         <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            <!--div class="callout callout-success"-->
            <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><u>Overview of all Bonuses: A Progress report:</u></h4>
               <ul>
                  <ol>
                     <li><strong>Referral Bonus 10%. When you register another, endeavour to include your email in the invite column of the registration form. </strong></li>
                     <li><strong>Bit Bonus. 5% is allowed for bit bonus only when subsequence donation is greater than the previous. It is a WIN WIN. </strong></li>
                  </ol>
               </ul>
            </div>
         </div> 
      </div>
      <!-- end note-->
      <!--table with pagination-->
      <div class="row">
         <div class="col-md-12">
            <div id="resp" style="overflow-x: auto; border: solid #999FA1;">
               <!--div>
                  <h4  style="background-color: blue; color: #fff;"><a href="#">Bank and BitCoin Detail.</a></h4>
                  </div-->
               <table id="myTable" class="table table-striped" >
                  <thead>
                     <tr>
                        <th>Donation ID</th>
                        <th>Root</th>
                        <th>Donation Value</th>
                        <th>Bonuses</th>
                        <th>Bonus Value</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>20 Business Days</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i = 1;
                        $sql_query="SELECT * FROM givedonations WHERE invite='$email' AND referral_state IN ('confirmed', 'unconfirmed') ORDER by time DESC";
                        $sql2_query="SELECT * FROM givedonations WHERE email='$email' AND bitbonus!=0 AND status IN ('confirmed', 'unconfirmed') ORDER by time DESC";
                        $sql3= "SELECT * FROM bonuses_balance WHERE email='$email' ORDER by datedone DESC";
                        $result3=mysqli_query($con,$sql3);
                        $result_set2=mysqli_query($con,$sql2_query);
                        $result_set=mysqli_query($con,$sql_query);
                        while($row=mysqli_fetch_row($result_set))
                        {
                        
                        $amount1 = number_format($row[11], 0, '.', ',');
                        $amount2 = number_format($row[5], 0, '.', ',');
                        
                        ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row[12]; ?></td>
                        <td><?php echo $amount2.'NGN'; ?></td>
                        <td><?php echo 'Referral Bonus'; ?></td>
                        <td><?php echo $amount1.'NGN'; ?></td>
                        <td><?php echo $row[15]; ?></td>
                        <td><?php echo $row[8]; ?></td>
                        <td><?php echo $row[9]; ?></td>
                     </tr>
                     <?php
                        }
                         
                         ?>
                     <?php
                        while($row2=mysqli_fetch_row($result_set2))
                        {
                        
                        $amount1 = number_format($row2[13], 0, '.', ',');
                         $amount2 = number_format($row2[5], 0, '.', ',');
                        
                        ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo 'Bit Reward'; ?></td>
                        <td><?php echo $amount2.'NGN'; ?></td>
                        <td><?php echo 'BIT Bonus'; ?></td>
                        <td><?php echo $amount1.'NGN'; ?></td>
                        <td><?php echo $row2[7]; ?></td>
                        <td><?php echo $row2[8]; ?></td>
                        <td><?php echo $row2[9]; ?></td>
                     </tr>
                     <?php
                        }
                         
                         ?>
                     <?php
                        while($row3=mysqli_fetch_row($result3))
                        {
                        
                        $amount1 = number_format($row3[3], 0, '.', ',');
                         //$amount2 = number_format($row2[5], 0, '.', ',');
                        
                        ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo 'Other Bonuses'; ?></td>
                        <td><?php echo 'Not Applicable'; ?></td>
                        <td><?php echo 'Bonus Brought Forward'; ?></td>
                        <td><?php echo $amount1.'NGN'; ?></td>
                        <td><?php echo 'Pending Cashout'; ?></td>
                        <td><?php echo $row3[4]; ?></td>
                        <td><?php echo 'Matured'; ?></td>
                     </tr>
                     <?php
                        }
                         
                         ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!--end form-->
   </section>
   <!-- /.content- all your desire contents must be within this section -->
</div>
<!-- /.content-wrapper -->
<script>
   $(document).ready(function(){
       $('#myTable').dataTable();
   });
</script>

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!--script src="../dist/js/app.min.js"></script-->
<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>

<?php include 'footer.php'; ?>