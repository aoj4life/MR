<?php
session_start();
include 'connect.php';

 $yourname = $email = $phone = $password = $password2 = $invite = $medium = "";



if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: register_user.php");
          exit;
           
    }



  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token1']) || ($_POST['_token1'] !== $_SESSION['_token1'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: register_user.php");
            exit;

     }
    }


 
if(isset($_POST) & !empty($_POST)){
  

   $yourname = $_POST['yourname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $password = $_POST['password'];
   $password2 = $_POST['password2'];
   $invite = $_POST['invite'];
   $medium = $_POST['medium'];

if ($_POST['yourname'] == "" || $_POST['email'] == "" || $_POST['phone'] == "" || $_POST['password'] == "" || $_POST['invite'] == "" || $_POST['medium'] == "") {
   $_SESSION['errMsg'] = "Error. Please All Input Fields are mandatory.Thanks..";
        header("Location: register_user.php");
            exit;

}


  //validation here 

    if (!preg_match("/^[a-zA-Z ]*$/",$yourname)) {

      $_SESSION['errMsg'] = "Name:Only Letters and spaces are allowed in.Thanks!";
          header("Location: register_user.php");
            exit;
}



  $cleanfield=filter_var($email, FILTER_SANITIZE_EMAIL);
if($cleanfield != $email){

   $_SESSION['errMsg'] =  "Email contain questionable character set.Please try again.Thanks.!";
         header("Location: register_user.php");
          exit;

}

    

if (!preg_match("/^[0-9]*$/", $phone)){
   
    $_SESSION['errMsg'] = "Phone:Only numbers are allowed. Thanks!";
          header("Location: register_user.php");
            exit;


}



  $cleanfield1=filter_var($invite, FILTER_SANITIZE_EMAIL);
if($cleanfield1 != $invite){

   $_SESSION['errMsg'] =  "Invite contain questionable character set.Please try again.Thanks.!";
         header("Location: register_user.php");
          exit;

}



if (!preg_match("/^[0-9]*$/", $medium)){
   
    $_SESSION['errMsg'] = "Only integer are allowed. Thanks!";
          header("Location: register_user.php");
            exit;


}


   $yourname = trim($yourname);
   $email = trim($email);
   $phone = trim($phone);
   $password = trim($password);
   $password2 = trim($password2);
   $invite = trim($invite);
   $medium = trim($medium);

   $$yourname = strip_tags(trim($yourname));
   $email = strip_tags(trim($email));
   $phone = strip_tags(trim($phone));
   $password = strip_tags(trim($password));
   $password2 = strip_tags(trim($password2));
   $invite = strip_tags(trim($invite));
   $medium = strip_tags(trim($medium));

   $yourname = filter_var($yourname, FILTER_SANITIZE_STRING);
  
   $yourname = stripslashes($yourname);
   $email = stripslashes($email);
   $phone = stripslashes($phone);
   $password = stripslashes($password);
   $password2 = stripslashes($password2);
   $invite = stripslashes($invite);
   $medium = stripslashes($medium);

   $yourname = htmlspecialchars($yourname, ENT_QUOTES, 'UTF-8');
   $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
   $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
   $password = htmlspecialchars($password);
   $password2 = htmlspecialchars($password2);
   $invite = htmlspecialchars($invite, ENT_QUOTES, 'UTF-8');
   $medium = htmlspecialchars($medium, ENT_QUOTES, 'UTF-8');

   $yourname = htmlentities($yourname, ENT_QUOTES, 'UTF-8');
   $email = htmlentities($email, ENT_QUOTES, 'UTF-8');
   $phone = htmlentities($phone, ENT_QUOTES, 'UTF-8');
   $password = htmlentities($password, ENT_QUOTES, 'UTF-8');
   $password2 = htmlentities($password2, ENT_QUOTES, 'UTF-8');
   $invite = htmlentities($invite, ENT_QUOTES, 'UTF-8');
   $medium = htmlentities($medium, ENT_QUOTES, 'UTF-8');

   $yourname = mysqli_real_escape_string($con, $yourname);
   $email = mysqli_real_escape_string($con, $email);
   $phone = mysqli_real_escape_string($con, $phone);
   $password = mysqli_real_escape_string($con, $password);
   $password2 = mysqli_real_escape_string($con, $password2);
   $invite = mysqli_real_escape_string($con, $invite);
   $medium = mysqli_real_escape_string($con, $medium);

  if ($password == $password2){


    //$password = md5($password);
     $password = md5(md5("moj".$password."SUBOtosi"));
   

    include('securimage/securimage.php');

$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == false) {
 
  $_SESSION['errMsg'] = "The security code is incorrect. Refresh and Retry. Thanks";
    header("Location: register_user.php");
  
 exit;
}

      $sql1 = "SELECT * FROM registration where email='$email'";
      $result2 = mysqli_query($con, $sql1);
      $count = mysqli_num_rows($result2);

      if ($count==1) {
      	
      	    $_SESSION['errMsg'] = "Email already in use..";
      	    header("Location: register_user.php");
      	    exit;

      }

               if ($email == $invite) {
                 
                  $_SESSION['errMsg'] = "Sorry you cannot refer yourself..Retry with a referrer email.Thanks.";
                   header("Location: register_user.php");
                   exit;
       
     }

       



     $sql = "INSERT INTO registration (yourname, email, phone, password, invite, medium) VALUES ('$yourname', '$email', '$phone', '$password', '$invite', '$medium')";
         mysqli_query($con, $sql);


         $_SESSION['errMsg2'] = "Successful Registration. Click Login to Continue. Thanks";
     
        header("Location: re_move.php");
          
      
         


   }
   else{

    $_SESSION['errMsg'] = "password do not matched";
    header("Location: register_user.php");
    exit;
   }


       
  }                            

 ?>