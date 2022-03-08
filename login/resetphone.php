<?php 
include 'connect.php';
session_start();

   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname'];


$cuphone = $newphone = "";


if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: changes_detail.php");
          exit;
           
    }



  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token1']) || ($_POST['_token1'] !== $_SESSION['_token1'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: changes_detail.php");
            exit;

     }
    }


if(isset($_POST['phoneno'])){

$cuphone = $_POST['cuphone'];
$newphone = $_POST['newphone'];


if (!preg_match("/^[0-9]*$/", $newphone)){
   
    $_SESSION['errMsg'] = "Only numbers are allowed in Newphone numbers!";
          header("Location: changes_detail.php");
            exit;


}

if (!preg_match("/^[0-9]*$/", $cuphone)){
   
    $_SESSION['errMsg'] = "Only numbers are allowed in phone numbers!";
          header("Location: changes_detail.php");
            exit;


}



if ($_POST['cuphone'] == "" || $_POST['newphone'] == "") {
   $_SESSION['errMsg'] = "Error. Phone Number cannot be empty. Retry. Thanks.";
        header("Location: changes_detail.php");
            exit;

}

$cuphone = trim($cuphone);
$newphone = trim($newphone);

$cuphone = strip_tags(trim($cuphone));
$newphone = strip_tags(trim($newphone));

$cuphone = stripcslashes($cuphone);
$newphone = stripcslashes($newphone);

$cuphone = htmlspecialchars($cuphone, ENT_QUOTES, 'UTF-8');
$newphone = htmlspecialchars($newphone, ENT_QUOTES, 'UTF-8');

$cuphone = htmlentities($cuphone);
$newphone = htmlentities($newphone);



$cuphone = mysqli_escape_string($con, $cuphone);
$newphone =mysqli_escape_string($con, $newphone);


        $query1 = mysqli_query($con,"SELECT phone FROM registration WHERE phone='".$cuphone."' AND email='".$email."'");
        $numrow1 = mysqli_num_rows($query1);

        if ($numrow1 == 1){
          
               mysqli_query($con, " UPDATE registration SET phone='".$newphone."' WHERE email='".$email."'");
               mysqli_query($con, " UPDATE bankdetail SET phone='".$newphone."' WHERE email='".$email."'");

        $query2 = mysqli_query($con,"SELECT phone FROM registration WHERE phone='".$newphone."' AND email='".$email."'");
        $numrows2 = mysqli_num_rows($query2);

        if ($numrows2 == 1) {

        	$_SESSION['errMsg5'] = "Phoneno Reset Successful!";
        	header("Location: changes_detail.php");
      	    exit;


        }else{

        	$_SESSION['errMsg'] = "Sorry Phoneno Reset FAIL!";
        	header("Location: changes_detail.php");
      	    exit;


        }


        }else{

        	$_SESSION['errMsg'] = "Sorry Current Phoneno is not correct!";
        	header("Location: changes_detail.php");
      	    exit;


        }

}






?>