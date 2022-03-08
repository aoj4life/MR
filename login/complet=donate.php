<?php include 'head.php';
   include 'connect.php';
   $email = $_SESSION['email']; 
   
   
   ?>
<!-- Content Wrapper. Contains page content -->

<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="stylebank.css">



<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div style="background-color: #00ffcc; margin: 0; padding-bottom: 15px; border-radius: 20px;">
      <section class="content-header">
         <h1>
            Completed Donations In and Out overview!!!!<br>
            <i style="color: red"><strong> Up and Running...!!!</strong> </i>
         </h1>
         <ol class="breadcrumb">
            <li><a href="profilepage.php"><i class="fa fa-dashboard"></i> My Page</a></li>
            <!--li><a href="#">Examples</a></li-->
            <li class="active">Completed Donations</li>
         </ol>
      </section>
   </div>
   <!-- Main content -->
   <section class="content">
      <!-- note-->
      <div class="pad margin no-print">
         <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><u>Transaction Historical details:</u></h4>
               <ul>
                  <li><strong>Overview of..... </strong></li>
                  <ol>
                     <li><strong>Details of all Donations. Sent and Received . </strong></li>
                     <li><strong>Details of all bonuses cashed out are embeded in the Reward Returned. </strong></li>
                  </ol>
               </ul>
            </div>
         </div>
      </div>
      <!-- end note-->
      <!--hotizontal form-->
      <!--end form-->
      <!--div class="container" style="border: solid #999FA1;"-->
         <h2><strong>Completed Donations</strong></h2>
         <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><strong>Donations Sent</strong></a></li>
            <li><a data-toggle="tab" href="#menu1"><strong>Donations Received</strong></a></li>
            <!--li><a data-toggle="tab" href="#menu2"><strong>Bonuses</strong></a></li-->
         </ul>
         <div class="tab-content">

            <div id="home" class="tab-pane fade in active">

               <h3><strong><em>Sent</em></strong></h3>
               <!--div id="resp" style="overflow-x: auto;"-->

                  <!--table align="center" style="max-width: 100%;"-->
                  <div id="resp" style="overflow-x: auto; border: solid #999FA1;">
               <div id="body">
                  <table id="myTable" class="table table-striped" >
                     
                     <tr>
                         <th>S/N</th>
                        <th>GD ID</th>
                        <th>Date created</th>
                        <th>Donation Value</th>
                        <th>Reward Expected</th>
                        <th>Status</th>
                       
                     </tr>
                     <?php
                       $i = 1;
                        $sql_query="SELECT * FROM givedonations WHERE email='$email' AND status='cashout' ORDER by time DESC limit 20";
                        $result_set=mysqli_query($con,$sql_query);
                        while($row=mysqli_fetch_row($result_set))
                        {

                           $amount1 = number_format($row[5], 2, '.', ',');
                           $amount2 = number_format($row[6], 2, '.', ',');
                         ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row[0]; ?></td>
                        
                        <td><?php echo $row[8]; ?></td>
                        <td><?php echo $amount1 . 'NGN'; ?></td>
                        <td><?php echo $amount2 . 'NGN'; ?></td>
                        <td><a class="label center bg-green"><?php echo "Confirmed"; ?></a></td>
                       
                     </tr>
                     <?php
                        }
                        ?>

                  </table>
                  </div>
                  </div>
               <!--/div-->


            </div>
            <div id="menu1" class="tab-pane fade">
               <h3><strong><em>Received</em></strong></h3>
               <div id="resp" style="overflow-x: auto;">
                  <table id="myTable2" class="table table-striped">
                     
                     <tr>
                        <th>S/N</th>
                        <th>RD ID</th>
                        <th>Date created</th>
                        <th>Reward Returned</th>
                        <th>Status</th>
                        
                        
                     </tr>
                     <?php
                     $i = 1;
                        $sql_query="SELECT * FROM getdonations WHERE email='$email' AND status='settled' ORDER by time DESC limit 20";
                        $result_set=mysqli_query($con,$sql_query);
                        while($row=mysqli_fetch_row($result_set))
                        {

                           $amount1 = number_format($row[5], 2, '.', ',');
                         ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo  $row[7]; ?></td>
                        <td><?php echo $amount1 . 'NGN'; ?></td>
                        <td><a class="label center bg-green"><?php echo "Cleared"; ?></a></td>
                       
                     </tr>
                     <?php
                        }
                        ?>
                  </table>
               </div>
            </div>
           
         </div>
      <!--/div-->
   </section>
   <!-- /.content- all your desire contents must be within this section -->
</div>
<!-- /.content-wrapper -->



<?php include 'footer.php'; ?>