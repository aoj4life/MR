<?php 

include 'connect.php'; 
$email = $_SESSION['email']; 




  if (isset($_POST["submit"])) {
    $name = check_input ($_POST['name']);
    $email1 = check_input ($_POST['email']);
    $message = check_input ($_POST['message']);
   // $human = intval($_POST['human']);
    $from = 'Contact Form'; 
    $to = 'aoj4life@gmail.com'; 
    $subject = "$name";
    
    $body = "Issue: $name\n E-Mail: $email1\n Message:\n $message";
 
   $captchaResult = $_POST['captchaResult'];
   $firstNumber = $_POST['firstNumber'];
   $secondNumber = $_POST['secondNumber'];

    $checkTotal = $firstNumber * $secondNumber;

if ($captchaResult != $checkTotal) {
  $errHuman = 'Your anti-spam is incorrect';
}
    // Check if name has been entered
    if (!$_POST['name']) {
      $errName = 'Please enter the subject matter';
    }
    
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Please enter a valid email address';
    }
    
    //Check if message has been entered
    if (!$_POST['message']) {
      $errMessage = 'Please enter your message';
    }
     
function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
   
    return $data;
}



// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
  if (mail ($to, $subject, $body, $from)) {
    $result='<div class="alert alert-success">Thank You. Support will respond ASAP!</div>';
  } else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
  }
}
  }

?>