<?php
  include 'connect.php';
  session_start();
  require_once '../lib/PHPMailer/PHPMailerAutoload.php';
 $yourname = $email ="";


if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: forgetpass.php");
          exit;
           
    }



  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token1']) || ($_POST['_token1'] !== $_SESSION['_token1'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: forgetpass.php");
            exit;

     }
    }


 
if(isset($_POST) & !empty($_POST)){
  

 
   $email = $_POST['email'];

  
   $email = trim($email);
   
   $email = stripslashes($email);
   
   $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
   $email = htmlentities($email, ENT_QUOTES, 'UTF-8');
      $cleanfield=filter_var($email, FILTER_SANITIZE_EMAIL);
     if($cleanfield != $email){

   $_SESSION['errMsg'] = "Email contain questionable character set.Please try again.Thanks.!";
         header("Location: forgetpass.php");
          exit;

}


   $email = mysqli_real_escape_string($con, $email);

   $query = "SELECT * FROM registration WHERE email='$email'";
    $result = mysqli_query($con, $query);
      $count = mysqli_num_rows($result);


include('securimage/securimage.php');

$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == false) {
  
   $_SESSION['errMsg'] = "Security code Wrong";
    header("Location: forgetpass.php");
  
  exit;
}
   if ($count !== 1) {

       $_SESSION['errMsg'] = "Invalid Email!";
        header("Location: forgetpass.php");
              exit;
              
   }


      if ($count==1) {

        // generate pass
        $pass = rand();
        $pass = md5($pass);
        $pass = substr($pass, 0, 15);

 

        $password = md5(md5("moj".$pass."SUBOtosi"));

        //update the db with new pass
        mysqli_query($con, " UPDATE registration SET password='$password' WHERE email='$email'");

           //make sure the password was send
        $query = mysqli_query($con,"SELECT * FROM registration WHERE password='$password' AND email='$email'");
        $numrow = mysqli_num_rows($query);

        if ($numrow == 1) {
           //create email variable
         // $webmaster = "188.166.154.214";
          $header = "FROM: admin";
          $subject = "Your New Password";
          $message = "Hello. Your password has been reset. Your new password is below. please change this pass ASAP\n \n";
         $message .= "password: $pass\n";

           //$to = 'user@example.com';
//$subject = "Beautiful HTML Email using PHP by CodexWorld";
           $_SESSION['pass'] = $pass;
/*$message = '
    <html>
    <head>
        <title>Your new secret words</title>
    </head>
    <body>
        <h1>Thank you for joining us!</h1>
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 400px; height: 400px;">
            <tr>
                <th>Name:</th><td>MutualReserves</td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Email:</th><td>contact@mreserves.com</td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th><p>Hello. Your password has been reset. Your new password is below. please change this pass ASAP</p>
                Pasword: </th><td> " .$_SESSION[pass]. "</td>
            </tr>
            <tr>
                <th>Website:</th><td><a href="https://mutualreserves.com">www.mutualreserve.com</a></td>
            </tr>
        </table>
        <?php echo "$_SESSION[pass]"; ?>
    </body>
    </html>';*/

    //$message = "password: $pass\n";

// Set content-type header for sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: Mreserves<admin@mutualreserve.com>' . "\r\n";
//$headers .= 'Cc: welcome@example.com' . "\r\n";
//$headers .= 'Bcc: welcome2@example.com' . "\r\n";

// Send email
//if(mail($to,$subject,$htmlContent,$headers)):
 //   $successMsg = 'Email has sent successfully.';
//else:
  //  $errorMsg = 'Email sending fail.';
//endif;


          //echo $pass ."<br />";

           if (mail($email, $subject, $message, $headers)) {
                $_SESSION['errMsg2'] = "Your password has been reset and an email sent to your mail box. please check spam also.Thanks!";
                echo $pass ."<br />";
                 header("Location: forgetpass.php");
                 exit;
             
           }else{
              $_SESSION['errMsg'] = "An error occured and password was not sent to your email!";

               //header("Location: forgetpass.php");
              //exit;
           }

          
        }else{
             $_SESSION['errMsg'] = "An error occured and password was not reset!";
              header("Location: forgetpass.php");
              exit;


              }
        
          

      }





 }

?>