<?php
include 'connect.php';
session_start();

   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname'];

$password=$newpass=$confirmpass="";


 if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: changes_detail.php");
          exit;
           
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: changes_detail.php");
            exit;

     }
    }

  



if(isset($_POST) & !empty($_POST)){

$password = $_POST['prepass'];
$newpass = $_POST['newpass'];
$confirmpass = $_POST['confirmpass'];

if ($_POST['prepass'] == "" || $_POST['newpass'] == "" || $_POST['confirmpass'] == "") {
   $_SESSION['errMsg'] = "Error. Password cannot be empty. Retry. Thanks.";
        header("Location: changes_detail.php");
            exit;

}

   $password = trim($password);
   $newpass = trim($newpass);
   $confirmpass = trim($confirmpass);
    
   $password = strip_tags(trim($password));
   $newpass = strip_tags(trim($newpass));
   $confirmpass = strip_tags(trim($confirmpass));


   $password = stripcslashes($password);
   $newpass = stripcslashes($newpass);
   $confirmpass = stripcslashes($confirmpass);

   $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
   $newpass = htmlspecialchars($newpass, ENT_QUOTES, 'UTF-8');
   $confirmpass = htmlspecialchars($confirmpass, ENT_QUOTES, 'UTF-8');

   $password = htmlentities($password);
   $newpass = htmlentities($newpass);
   $confirmpass = htmlentities($confirmpass);



    $password = mysqli_real_escape_string($con, $password);
   $newpass = mysqli_real_escape_string($con, $newpass);
   $confirmpass = mysqli_real_escape_string($con, $confirmpass);

   if ($newpass === $confirmpass) {
       $password1 = md5(md5("moj".$password."SUBOtosi"));
        

        $query = mysqli_query($con,"SELECT * FROM registration WHERE password='$password1' AND email='$email'");
        $numrow = mysqli_num_rows($query);

        if ($numrow == 1) {

            $newpassword = md5(md5("moj".$newpass."SUBOtosi"));
             //update the db with new pass
        mysqli_query($con, " UPDATE registration SET password='$newpassword' WHERE email='$email'");

           $query = mysqli_query($con,"SELECT * FROM registration WHERE password='$newpassword' AND email='$email'");
        $numrows = mysqli_num_rows($query);

        if ($numrows == 1) {

        	$_SESSION['errMsg5'] = "Password Reset Successful. Logout to use the new pass!";
          
        	header("Location: changes_detail.php");
          //include 'logout.php';
      	    exit;


        }else{

        	$_SESSION['errMsg'] = "Sorry Password reset FAIL!";
        	header("Location: changes_detail.php");
      	    exit;


        }


        }else{

        	$_SESSION['errMsg'] = "Current Password is not correct!";
        	header("Location: changes_detail.php");
      	    exit;
        }


   	# code...
   }else{

   	   $_SESSION['errMsg'] = "Sorry New Password must be identical!";
   	   header("Location: changes_detail.php");
      	    exit;
   }


}


?>