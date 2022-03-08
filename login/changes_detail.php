<?php 

include 'head.php';
include 'token.php';



 ?>


 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
  <link rel="stylesheet" href="style2.css">
    <!-- Content Header (Page header) -->
    <div style="background-color: #00ffcc; margin: 0; max-height: auto; max-width: auto; padding-bottom: 15px; border-radius: 20px;">
    <section class="content-header">
      <h1>
          Changes ..... <br /> Phone number, Secret word!!!!!<br>
        <i style="color: red"><strong> Up and Running...!!!</strong> </i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="profilepage.php"><i class="fa fa-dashboard"></i> My Page</a></li>
        <!--li><a href="#">Examples</a></li-->
        <li class="active">Changes</li> 
      </ol>
    </section>
    </div>
    <!-- Main content -->
    <section class="content">

        <?php 
         if (isset($_SESSION['errMsg'])) {
           echo "<div id='error_msg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg']."</div>";
           unset($_SESSION['errMsg']);
         }
         ?>

          <?php 
         if (isset($_SESSION['errMsg5'])) {
           echo "<div id='error_smsg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg5']."</div>";
           unset($_SESSION['errMsg5']);
         }
         ?>

        <!-- note-->
  <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           
                           <h4><u>Password Resest and Other changes:</u></h4>
      <ul>
          <li><strong>Understand that..... </strong></li>
        <ol>
          <li><strong>Account details cannot be changed. Only admin can effect a change. </strong></li>
          <li><strong>Ensure to reset your password after the forgot password procedure is engaged  . </strong></li>
          
        </ol>
        <li><strong>Make sure your new password is not the same as the previous secret code.  </strong></li>
      </ul>

                </div>
      </div>
    </div>
  <!-- end note-->
      <div class="row">
        


         <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border" style="background-color: #3462F7; color: white;">
              <h3 class="box-title">Password Change</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="resetpass.php">


        <?php 
         if (isset($_SESSION['errMsg'])) {
           echo "<div id='error_msg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg']."</div>";
           unset($_SESSION['errMsg']);
         }
         ?>


              <div class="box-body">
                <div class="form-group">
                  <label for="bankname"  class="col-sm-2 control-label">Present Pass</label>

                  <div class="col-sm-10">
                    <input type="password" name="prepass" class="form-control" id="bankname" placeholder="Current Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bankname" class="col-sm-2 control-label">Desire Pass</label>

                  <div class="col-sm-10">
                    <input type="password" name="newpass" class="form-control" id="bankname" placeholder="New Password" required>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="bankname" class="col-sm-2 control-label">Confirm Desire Pass</label>

                  <div class="col-sm-10">
                    <input type="password" name="confirmpass" class="form-control" id="bankname" placeholder="Confirm New Password" required>
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

        
         <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border" style="background-color: #4670FA; color: white;">
              <h3 class="box-title">Contact</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="resetphone.php">

            <?php if(!empty($_SESSION['errMsg2'])) { ?><div id="errMsg" class="btn btn-lg btn-primary btn-block" style="background-color: #FF8205; margin-bottom: 5px; margin-top: 5px; margin-right: 35%;"> <?php echo $_SESSION['errMsg2']; ?> </div><?php } ?>

     
            <?php unset($_SESSION['errMsg2']); ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Current Phone Number</label>

                  <div class="col-sm-10">
                    <input type="number"  name="cuphone" class="form-control" id="inputEmail3" placeholder="Current Phone Number" required>
                  </div>
                </div>
               </div>

                <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">New Phone Number</label>

                  <div class="col-sm-10">
                    <input type="number"  name="newphone" class="form-control" id="inputEmail3" placeholder="New Phone Number" required>
                    <input type="hidden" name="_token1" value="<?php echo $_SESSION['_token1']; ?>">
                  </div>
                </div>
               </div>
              
              <!-- /.box-body -->
              <div class="box-footer">
                <!--button type="submit" class="btn btn-default">Cancel</button-->
                <button type="submit" name=phoneno class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>



          
      </div>


  </div>



    </section>
 


  </div>
 


<?php include 'footer.php'; ?>