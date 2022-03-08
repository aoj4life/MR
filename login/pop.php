<?php include 'head.php'; 
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
   <div style="background-color: #00ffcc; margin: 0; padding-bottom: 15px; border-radius: 20px;">
      <section class="content-header">
         <h1>
            Upload all Proof of Payment to Begin Donation Closure!!!!<br>
            <i style="color: red"><strong> Up and Running...!!!</strong> </i>
         </h1>
         <ol class="breadcrumb">
            <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
            <!--li><a href="#">Examples</a></li-->
            <li class="active">Proof of Payment</li>
         </ol>
      </section>
   </div>
   <!-- Main content -->
   <section class="content">
      <?php 
         if (isset($_SESSION['errMsg2'])) {
           echo "<div id='error_msg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsg2']."</div>";
           unset($_SESSION['errMsg2']);
         }
         
          if (isset($_SESSION['errMsggoo'])) {
           echo "<div id='error_smsg' style='margin-top: 5px;  margin-bottom: 5px;'>".$_SESSION['errMsggoo']."</div>";
           unset($_SESSION['errMsggoo']);
         }
         ?>
      <!-- note-->
      <div class="pad margin no-print">
         <div class="callout callout-info" style="">
            <h4><i class="fa fa-info"></i> Note:</h4>
            <!--div class="callout callout-danger"-->
            <div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>     
               <h4>The Upload of a copy of POP is needed to begin donation closure: The Understanding of the Following is Paramount:</h4>
               <ul>
                  <ol>
                     <li><strong>I am not under any duress or compulsion.</strong></li>
                     <li><strong>Expected/Actual donation amount POP is being uploaded.</strong></li>
                     <li><strong>That the POP am uploading is Genuine.</strong></li>
                  </ol>
                  <li>All donations are voluntary and final.</li>
                  <!--li>The upload of POP does not stop time countdown. upload of fake POP attract penalty like expulsion from the community. You can ask for more time or decline payment.</li-->
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
                           <td>Donation Value</td>
                           <td>Receiver Value</td>
                           <td>Receiver Contact</td>
                           <td>Payment Medium</td>
                           <td>Actions</td>
                           <td>Status</td>
                           <td>View POP</td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $sql="SELECT * FROM matched WHERE donoremail='$email' AND status='cashout_open' ORDER BY id ASC";
                           $result_set=mysqli_query($con,$sql);
                           while($row=mysqli_fetch_array($result_set))
                           {
                           
                             $_SESSION['tid'] = $row[1];
                             $tid = $row[0];
                             $_SESSION['receivermail'] = $row[4];
                            $sql2="SELECT * FROM bankdetail WHERE email='$row[4]'";
                            $reb = mysqli_query($con,$sql2);
                            $row2 = mysqli_fetch_row($reb);
                            $name = $row2[2];
                            $accno = $row2[3];
                            $bname = $row2[1];
                            $contact = $row2[7];
                            $accty = $row2[4];
                            
                            ?>
                        <tr>
                           <td><?php echo $row[1]; ?></td>
                           <td><?php echo $row[7]; ?></td>
                           <td><?php echo $row[3]; ?></td>
                           <td><?php echo $row[5]; ?></td>
                           <td><?php echo $contact; ?></td>
                           <td><?php echo $name; echo "<br>";  echo $bname; echo "<br>"; echo $accno; echo "<br>"; echo $accty;  ?></td>
                           <!--td><?php //echo $row['pop'] ?></td-->
                           <td>
                              <?php echo $row[6]; ?>
                              <form action="pop_upload.php" method="post" enctype="multipart/form-data">
                                 <input type="file" name="fileToUpload" id="fileToUpload">
                                 
                                 <input type="submit" value="Upload POP Image" name="submit">
                                 <input type="hidden" name="photo1" value="<?php echo htmlspecialchars($tid) ?>" >
                              </form>
                           </td>
                           <td><?php echo $row[8]; ?></td>
                           <td>click below.<br><a href="uploads/<?php echo $row[6] ?>" target="_blank" rel="noopener noreferrer"><?php if($row[6]) { ?> <?php echo"view file"; ?> <?php } ?> </a></td>
                        </tr>
                        <?php
                           }
                           ?>
                        <?php
                           $sql5="SELECT * FROM matched1 WHERE donoremail='$email' AND status='cashout_open' ORDER BY id ASC";
                           $result_set5=mysqli_query($con,$sql5);
                           while($row5=mysqli_fetch_array($result_set5))
                           {
                           
                             $_SESSION['tid'] = $row5[1];
                             $tid1 = $row5[0];
                             $_SESSION['receivermail'] = $row5[4];
                            $sql2="SELECT * FROM bankdetail WHERE email='$row5[4]'";
                            $reb = mysqli_query($con,$sql2);
                            $row2 = mysqli_fetch_row($reb);
                            $name = $row2[2];
                            $accno = $row2[3];
                            $bname = $row2[1];
                            $contact = $row2[7];
                            $accty = $row2[4];
                            
                            ?>
                        <tr>
                           <td><?php echo $row5[1]; ?></td>
                           <td><?php echo $row5[7]; ?></td>
                           <td><?php echo $row5[3]; ?></td>
                           <td><?php echo $row5[5]; ?></td>
                           <td><?php echo $contact; ?></td>
                           <td><?php echo $name; echo "<br>";  echo $bname; echo "<br>"; echo $accno; echo "<br>"; echo $accty;  ?></td>
                           <!--td><?php //echo $row['pop'] ?></td-->
                           <td>
                              <?php echo $row5[6]; ?>
                              <form action="pop_upload1.php" method="post" enctype="multipart/form-data">
                                 <input type="file" name="fileToUpload" id="fileToUpload">
                                 <input type="submit" value="Upload POP Image" name="submit1">
                                 <input type="hidden" name="photo2" value="<?php echo htmlspecialchars($tid1) ?>" >
                              </form>
                           </td>
                           <td><?php echo $row5[8]; ?></td>
                           <td>click below.<br><a href="uploads/<?php echo $row5[6] ?>" target="_blank" rel="noopener noreferrer"><?php if($row5[6]) { ?> <?php echo"view file"; ?> <?php } ?> </a></td>
                           </tr
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
<!-- /.content-wrapper -->
<script>
   $(document).ready(function(){
       $('#myTable').dataTable();
   });
</script>
<?php include 'footer.php'; ?>