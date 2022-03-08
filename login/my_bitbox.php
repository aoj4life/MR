<?php include 'head.php'; 
   include 'connect.php';
   $email = $_SESSION['email']; 
   
   ?>
<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>

<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>


<link rel="stylesheet" href="stylebank.css">
<div class="content-wrapper">
   
   <div style="background-color: #00ffcc; margin: 0; padding-bottom: 15px; border-radius: 20px;">
      <section class="content-header">
         <h1>
            All Donations Attract 100% Reward HERE!!!!!!!!!!<br>
            <i style="color: red"><strong> Up and Running...!!!</strong> </i>
         </h1>
         <ol class="breadcrumb">
            <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
            
            <li class="active">My BitBox</li>
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
               <h4><u>Overview of all Donations: A Progress report:</u></h4>
               <ul>
                  <li><strong>My StrongBox..... </strong></li>
                  <ol>
                     <li><strong>The Status of each Donation. </strong></li>
                      <li><strong>The Expected Reward Return. </strong></li>
                     <li><strong>The Maximum Numbers of Business days. Donations and Rewards are usualy concluded within these days. </strong></li>
                    
                  </ol>
               </ul>
            </div>
         </div>
      </div>
      <!--table with pagination-->
      <div class="row">
         <div class="col-md-12">
            <div id="resp" style="overflow-x: auto; border: solid #999FA1;">
               <!--div>
                  <h4  style="background-color: blue; color: #fff;"><a href="#">Bank and BitCoin Detail.</a></h4>
                  </div-->
               <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>Donation ID</th>
                        
                        <th>Status</th>
                        <th>Amount Donated</th>
                        <th>Expected Return</th>
                        <th>Date created</th>
                        <th>20 Business Days</th>
                        <!--th>Amount Now</th>
                        <th>Expected amount</th-->
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                       $i = 1;
                        $sql_query="SELECT * FROM givedonations WHERE email='$email' AND status IN ('confirmed', 'unconfirmed') ORDER by time DESC";
                        $result_set=mysqli_query($con,$sql_query);
                        while($row=mysqli_fetch_row($result_set))
                        {

                           $amount1 = number_format($row[6], 2, '.', ',');
                           $amount2 = number_format($row[5], 0, '.', ',');
                         ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        
                        <td><?php echo $row[7]; ?></td>
                        <td><?php echo $amount2 . 'NGN'; ?></td>
                        <td><?php echo $amount1 . 'NGN'; ?></td>
                        <td><?php echo $row[8]; ?></td>
                        <td><?php echo $row[9]; ?></td>
                        <!--td><?php  $row[5]; ?></td>
                        <td><?php  $row[3]; ?></td-->
                     </tr>
                     <?php
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!--end of table with pagination-->
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