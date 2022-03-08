<?php
   //session_start();
   include 'head.php';
   include 'connect.php';
   include 'token.php';
    
    //$email = $_SESSION["email"]; 
    $email = $_SESSION['email']; 
    $phone = $_SESSION['phone'];
    $yourname = $_SESSION['yourname'];
   
   
           
           // sql query for inserting data into database
    
   
   ?>
<!-- Content Wrapper. Contains page content -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>

<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="stylebank.css">
<link rel="stylesheet" href="style2.css">
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div style="background-color: #00ffcc; margin: 0;  padding-bottom: 15px; border-radius: 20px;">
      <section class="content-header">
         <h1>
            Bank Account .....<br /> Conventional Bank Details!!!!!!!!!!!!!<br>
            <i style="color: red"><strong> Up and Running...!!!</strong> </i>
         </h1>
         <ol class="breadcrumb">
            <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
            <li class="active">Bank Account detail</li>
         </ol>
      </section>
   </div>
   <!-- Main content -->
   
    <?php 
         if (isset($_SESSION['errMsg'])) {
           echo "<div id='error_msg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg']."</div>";
           unset($_SESSION['errMsg']);
         }
         ?>


    <?php 
         if (isset($_SESSION['errMsg79'])) {
           echo "<div id='error_smsg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg79']."</div>";
           unset($_SESSION['errMsg79']);
         }
         ?>
   
   
   <section class="content">
      <!-- note-->
      <div class="pad margin no-print">
         <div class="callout callout-info">
            <h4><i class="fa fa-info"></i> Note:</h4>
            <div class="alert alert-warning alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><u>Conventional Bank:</u></h4>
               <ul>
                  <li><strong>Understand that..... </strong></li>
                  <ol>
                     <li><strong>Account details cannot be changed. Only admin can effect a change. </strong></li>
                     <li><strong>More than one account is permmitted provided they are unique. </strong></li>
                  </ol>
                  <li><strong>Please know the maximum deposit your account can accommodate to avoid stress with your bank. Some accounts cannot support deposit more than 999999 NGN.  </strong></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- end note-->
      <div class="row">
         <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="box box-info">
               <div class="box-header with-border" style="background-color: #3462F7; color: white;">
                  <h3 class="box-title">Conventional Bank Form</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form class="form-horizontal" method="post" action="bank_action.php">
                  <div class="box-body">
                     <div class="form-group">
                        <label for="bankname"  class="col-sm-2 control-label">Bank Name</label>
                        <div class="col-sm-10">
                           <input type="text" name="bankname" class="form-control" id="bankname" placeholder="Bank Name" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="bankname" class="col-sm-2 control-label">Account Name</label>
                        <div class="col-sm-10">
                           <input type="text" name="accname" class="form-control" id="bankname" placeholder="Account Name" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="bankname" class="col-sm-2 control-label">Account Number</label>
                        <div class="col-sm-10">
                           <input type="number" name="accnumber" class="form-control" id="bankname" placeholder="Account Nunmber" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="bankname" class="col-sm-2 control-label">Account Type</label>
                        <div class="col-sm-10">
                           <input type="text" name="acctype" class="form-control" id="bankname" placeholder="Account Type" required>
                           <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                        </div>
                     </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <!--button type="submit" class="btn btn-default">Cancel</button-->
                     <button type="submit" name="btn-save" class="btn btn-info pull-right">Submit</button>
                  </div>
                  <!-- /.box-footer -->
               </form>
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
               <table id="myTable" class="table table-striped" >
                  <thead>
                     <tr>
                        <th>S/N</th>
                        <th>Bank Name</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Account Type</th>
                        <!--th>Email</th-->
                        <th>Date Created</th>
                        <!--th>Account Type</th>
                           <th>Account Type</th-->
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $i=1;
                        $sql_query="SELECT * FROM bankdetail WHERE email='$email' ORDER by datecreated DESC";
                        $result_set=mysqli_query($con,$sql_query);
                        while($row=mysqli_fetch_row($result_set))
                        {
                        ?>
                     <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[6]; ?></td>
                     </tr>
                     <?php
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
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