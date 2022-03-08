<?php include 'head.php'; 

include 'connect.php';
   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname']; 
   $userid = $_SESSION['userid'];
   $invite = $_SESSION['invite'];


?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>

<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
 <!-- Content Wrapper. Contains page content -->
 <link rel="stylesheet" href="stylebank.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="background-color: #00ffcc; margin: 0; padding-bottom: 15px; border-radius: 20px;">
    <section class="content-header">
      <h1>
        Direct Downline!!!!!!!!<br>
       <i style="color: red"><strong> Up and Running...!!!</strong> </i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="profilepage.php"><i class="fa fa-dashboard"></i> My Page</a></li>
        <!--li><a href="#">Examples</a></li-->
        <li class="active">My downline</li> 
      </ol>
    </section>
    </div>
    <!-- Main content -->
    <section class="content">

        <!-- note-->
  <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Fantanstics Responsibility</span>
              <span class="info-box-number">Leadership Engagement...... A Good option</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                   Direct Registration
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
      </div>
    </div>
  <!-- end note-->

  <!--start of downline table-->
<div class="row">
         <div class="col-md-12">
            <div id="resp" style="overflow-x: auto; border: solid #999FA1;">
               <!--div>
                  <h4  style="background-color: blue; color: #fff;"><a href="#">Bank and BitCoin Detail.</a></h4>
                  </div-->
               <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>SN</th>
                        <th>Downline</th>
                        <th>Email</th>
                        <th>Phone Contact</th>
                        <th>Membership Date</th>
                        <th>Status</th>
                       
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
                        $sql_query="SELECT * FROM registration WHERE invite='$email' ORDER by recdate DESC";
                        $result_set=mysqli_query($con,$sql_query);
                        while($row=mysqli_fetch_row($result_set))
                        {

                         ?>
                     <tr>
                        <td width="5"><?php echo $i++; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[7]; ?></td>
                        <td class="label pull-left bg-blue"><?php echo $row[8]; ?></td>
                        
                     </tr>
                     <?php
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
        <!--end of downline table-->





    </section>
    <!-- /.content- all your desire contents must be within this section -->


  </div>
  <!-- /.content-wrapper -->

<script>
   $(document).ready(function(){
       $('#myTable').dataTable();
   });
</script>
<?php include 'footer.php'; ?>