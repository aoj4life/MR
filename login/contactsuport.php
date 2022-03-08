<?php 
include 'head.php';
include 'connect.php'; 
$email = $_SESSION['email']; 




  if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   // $human = intval($_POST['human']);
    $header = "FROM: support";
    $from = 'Contact Form'; 
    $to = 'aoj4life@gmail.com'; 
    $subject = "$name";
    
    $body = "Issue: $name\n E-Mail: $email\n Message:\n $message";
 
   $captchaResult = $_POST['captchaResult'];
   $firstNumber = $_POST['firstNumber'];
   $secondNumber = $_POST['secondNumber'];
 $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
 $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
 $subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
 $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
 $captchaResult = htmlspecialchars($captchaResult, ENT_QUOTES, 'UTF-8');
 $firstNumber = htmlspecialchars($firstNumber, ENT_QUOTES, 'UTF-8');
 $secondNumber = htmlspecialchars($secondNumber, ENT_QUOTES, 'UTF-8');



 $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
 $message = htmlentities($message, ENT_QUOTES, 'UTF-8');
 $subject = htmlentities($subject, ENT_QUOTES, 'UTF-8');
 $email = htmlentities($email, ENT_QUOTES, 'UTF-8');
 $captchaResult = htmlentities($captchaResult, ENT_QUOTES, 'UTF-8');
 $firstNumber = htmlentities($firstNumber, ENT_QUOTES, 'UTF-8');
 $secondNumber = htmlentities($secondNumber, ENT_QUOTES, 'UTF-8');


$checkTotal = $firstNumber * $secondNumber;

if ($captchaResult != $checkTotal) {
  $errHuman = 'Your anti-spam is incorrect';
}
    // Check if name has been entered
    if (!$name) {
      $errName = 'Please enter the subject matter';
    }
    
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Please enter a valid email address';
    }
    
    //Check if message has been entered
    if (!$message) {
      $errMessage = 'Please enter your message';
    }


// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
  if (mail ($to, $subject, $body, $header)) {
    $result='<div class="alert alert-success">Thank You. Support will respond ASAP!</div>';
  } else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
  }
}
  }

?>


 <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div style="background-color: #00ffcc; margin: 0; max-height: auto; max-width: auto; padding-bottom: 15px; border-radius: 20px;">
    <section class="content-header">
      <h1>
        Support Options----!!!<br>
       <i style="color: red"><strong> Up and Running...!!!</strong> </i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dash.php"><i class="fa fa-dashboard"></i> My Page</a></li>
        <!--li><a href="#">Examples</a></li-->
        <li class="active">Get Support</li> 
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
              <span class="info-box-text">Fantanstics Interactions</span>
              <span class="info-box-number">First Level Support...... Your Upline</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                   Second Level Support........ Platform Admin.
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
      </div>
    </div>
  <!-- end note-->


  <div class="row">

  <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Problem Resolution Tools</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Your Upline
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                     <div class="callout callout-success">
                <h4>Success callout!</h4>

                <p><strong> Herein is the detail of the pal who invited you to MutualReserves.</strong><br>

                <?php 
                  $up = "SELECT * FROM registration WHERE email='$email'";
                  $resultu = mysqli_query($con, $up);
                  $row = mysqli_fetch_row($resultu);

                  $invite=$row[5];

                  $up1 = "SELECT * FROM registration WHERE email='$invite'";
                  $resultu1 = mysqli_query($con, $up1);
                  $row1 = mysqli_fetch_row($resultu1);

                  echo $row1[1]; echo "<br>";
                  echo $row1[2]; echo "<br>";
                  echo $row1[3]; echo "<br>";

                  mysqli_close($con);

                ?>.

                </p>
              </div>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                         The Truth is FREEDOM
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                  <div class="box-body">
                         <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               Please let people know only what the platform offer. It is purely a means by which two mutually aware adults DONATE to one another. Be explicit about the warnings and our rules of engagement. When all is said and done, let them take their decision without compulsion.<strong> Opportunity is only meant for those who will recognize it.</strong>
              </div>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Admin Contact
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                         <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="info" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               If there is any issue(s) with your account; let support team know. Response will be prompt.<!--strong> Send an email to the team <br> support@mreserves.com<br> admin@mreserves.com.</strong-->
              </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  <div class="col-md-6" style="border-style: solid; background-color: #A5E5FA">
  <div style="text-align: center;font-size: 30px;"><em><strong><u>Contact Us.</u></strong></em></div>
    <?php 

     $min_number = 1;
     $max_number = 7;

  $random_number1 = mt_rand($min_number, $max_number);
  $random_number2 = mt_rand($min_number, $max_number);
      echo $result;

       ?>
   <form class="form-horizontal" role="form" method="post"  style="margin-top: 20px;">
      <div class="col-sm-10 col-sm-offset-2">
       
    </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Subject</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="name" name="name" placeholder="Core issue" value="<?php echo htmlentities($_POST['name']); ?>">
      <?php echo "<p class='text-danger'><strong>$errName</strong></p>";?>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlentities($_POST['email']); ?>">
      <?php echo "<p class='text-danger'><strong>$errEmail</strong></p>";?>
    </div>
  </div>
  <div class="form-group">
    <label for="message" class="col-sm-2 control-label">Message</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="4" name="message"><?php echo htmlentities($_POST['message']);?></textarea>
      <?php echo "<p class='text-danger'><strong>$errMessage</strong></p>";?>
    </div>
  </div>
  <div class="form-group">
    <label for="human" class="col-sm-2 control-label"><?php echo $random_number1 . ' * ' . $random_number2 .' = ';?></label>

    <div class="col-sm-10">

  <input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
  <input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />
      <input type="text" class="form-control" id="human" name="captchaResult" placeholder="Your Answer" >
      <?php echo "<p class='text-danger'><strong>$errHuman</strong></p>";?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      <input id="submit" name="submit" type="submit"  class="btn btn-primary">
    </div>
  </div>
  <div class="form-group">
   
  </div>
</form> 

</div>


  </div>
  

    </section>
    <!-- /.content- all your desire contents must be within this section -->


  </div>
  <!-- /.content-wrapper -->


<?php include 'footer.php'; ?>