<?php
  

include'connect.php';
session_start();
session_regenerate_id(true);

$email = $password = "";



if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: login_res.php");
          exit;
           
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: login_res.php");
            exit;

     }
    }


if(isset($_POST['login_btn'])){
 
$email=$_POST['email'];
$password=$_POST['password'];

if ($_POST['password'] == "" || $_POST['email'] == "") {
   $_SESSION['errMsg'] = "Error. Please All Input Fields are mandatory. Thanks..";
        header("Location: login_res.php");
            exit;

}





 $email = trim($email);
 $password = trim($password);

 $email = stripslashes($email);
 $password = stripslashes($password);

 $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
 $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

$email = htmlentities($email, ENT_QUOTES, 'UTF-8');
 $password = htmlentities($password, ENT_QUOTES, 'UTF-8');

 $email = strip_tags(trim($email));
 $password = strip_tags(trim($password));



 // data validation

   $cleanfield=filter_var($email, FILTER_SANITIZE_EMAIL);
if($cleanfield != $email){

   $_SESSION['errMsg'] =  "Email contain questionable character set.Please try again.Thanks.!";
         header("Location: login_res.php");
          exit;

}

 $email = mysqli_real_escape_string($con, $email);
 $password = mysqli_real_escape_string($con, $password);
   

 $password = md5(md5("moj".$password."SUBOtosi"));

 $sql = "SELECT * FROM registration WHERE email='".$email."' AND password='".$password."'";

 $result = mysqli_query($con, $sql);
 $count = mysqli_num_rows($result);
 $row  = mysqli_fetch_array($result, MYSQLI_BOTH);


include('securimage/securimage.php');
include('securimage/config.inc.php');

$securimage = new Securimage();

if ($securimage->check($_POST['captcha_code']) == false) {

   $_SESSION['errMsg'] = "Security code is Incorrect";
    header("Location: login_res.php");
  
  exit;
}
   if ($count !== 1) {

       $_SESSION['errMsg'] = "Invalid Email or Password. Please Try Again!";
                 header("Location: login_res.php");
              exit;
              
   }



if($count == 1) {
           if(is_array($row)) {
                      
                $_SESSION["email"] = $row[2];
                $_SESSION["yourname"] = $row[1];
                $_SESSION["phone"] = $row[3];
                $_SESSION["timestamp"] = $row[7];
                $_SESSION["userid"] = $row[0];
                $_SESSION["invite"] = $row[5];
                $_SESSION["status"] = $row[8];


             }

             if ($_SESSION["status"]=='blocked') {

               header("Location: blockpage2.php");
              
             }else{

           
          if(isset($_SESSION["yourname"])) {
           header("Location: dash.php");
      }
      }
}
}
?>