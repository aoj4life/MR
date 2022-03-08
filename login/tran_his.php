<?php include 'head.php'; 
include 'connect.php';
 
 //$email = $_SESSION["email"]; 
 $email = $_SESSION['email']; 
?>

 <!-- Content Wrapper. Contains page content -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
 <link rel="stylesheet" href="stylebank.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="background-color: #00ffcc; margin: 0; max-height: auto; max-width: auto; padding-bottom: 15px; border-radius: 20px;">
    <section class="content-header">
      <h1>
       Transaction History!!!!!!!!!<br>
        <i style="color: red"> we are not going on break anytime. up and running 247.!!! </i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="profilepage.php"><i class="fa fa-dashboard"></i> My Page</a></li>
        <!--li><a href="#">Examples</a></li-->
        <li class="active">Historical Activities</li> 
      </ol>
    </section>
    </div>
    <!-- Main content -->
    <section class="content">

        <!-- note-->
  <div class="pad margin no-print">
      <div class="callout callout-info">
        <h4><i class="fa fa-info"></i> Note:</h4>
             <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           
                           <h4><u>Transaction Historical details:</u></h4>
      <ul>
          <li><strong>Overview of..... </strong></li>
        <ol>
          <li><strong>Details of all Donations. Sent and Received . </strong></li>
          <li><strong>Details of all bonuses cashed out. </strong></li>
          
        </ol>
        
      </ul>

                </div>
      </div>
    </div>
  <!-- end note-->

   <!--hotizontal form-->
   <div style="overflow-x: auto;">
       <table align="center" style="width: 100%;">
       <thead>
          <tr>
              <th colspan="7" style="background-color: blue; color: #fff;"><a href="#">Transaction History.</a></th>
          </tr>
              <th>Donations Made </th>
               <th>Donations Recieved</th>
               <th>Bank Name</th>
                <th>Account Name</th>
                <th>Account Number</th>
              <th>Email</th>
               <th>Date</th>
       </thead>
       <tbody id="myTableBody">
    
    <?php
 $sql_query="SELECT * FROM bankdetail WHERE email='$email' ORDER by time DESC";
 $result_set=mysqli_query($con,$sql_query);
 while($row=mysqli_fetch_row($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo $row[5]; ?></td>
        <td><?php echo $row[5]; ?></td>
 
        </tr>

        <?php
        "$('#myTableBody').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:4});";
 }
 ?>
    

             
              </tbody>
    
  </table>
     <div class="col-md-12 text-center">
           <ul class="pagination pagination-lg pager" id="myPager"></ul>
       </div>

    </div>

      <!--end form-->



    </section>
    <!-- /.content- all your desire contents must be within this section -->


  </div>
  <script>$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  <!-- /.content-wrapper -->


<?php include 'footer.php'; ?>