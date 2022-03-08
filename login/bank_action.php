<?php
session_start();
//include 'head.php';
include 'connect.php';
 
 //$email = $_SESSION["email"]; 
 $email = $_SESSION['email']; 
 $phone = $_SESSION['phone'];
 $yourname = $_SESSION['yourname'];

 $bname = $accname = $accnumber = $acctype = "";

 if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: bank_acc.php");
          exit;
           
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: bank_acc.php");
            exit;

     }
    }




if(isset($_POST['btn-save']))
{

 
 $bname = $_POST['bankname'];
 $accname = $_POST['accname'];
 $accnumber = $_POST['accnumber'];
 $acctype = $_POST['acctype'];
 // variables for input data

if ($_POST['bankname'] == "" || $_POST['accname'] == "" || $_POST['accnumber'] == "" || $_POST['acctype'] == "") {
   $_SESSION['errMsg'] = "Error. Please all fields are required.It will not take much time. Thanks..";
        header("Location: bank_acc.php");
            exit;

}

 if (!preg_match("/^[a-zA-Z ]*$/",$bname)) {

      $_SESSION['errMsg'] = "Only letters and white space allowed in bankname,account name and account type!";
          header("Location: bank_acc.php");
            exit;
}

 if (!preg_match("/^[a-zA-Z ]*$/",$accname)) {

      $_SESSION['errMsg'] = "Only letters and white space allowed in bankname,account name and account type!";
          header("Location: bank_acc.php");
            exit;
}

if (!preg_match("/^[0-9]*$/", $accnumber)){
   
    $_SESSION['errMsg'] = "Only numbers are allowed in account numbers!";
          header("Location: bank_acc.php");
            exit;


}

if (!preg_match("/^[a-zA-Z ]*$/",$acctype)) {

$_SESSION['errMsg'] = "Only letters and white space allowed in bankname,account name and account type!";
          header("Location: bank_acc.php");
            exit;
}


 
 $bname = stripslashes($_POST['bankname']);
 $accname = stripslashes($_POST['accname']);
 $accnumber = stripslashes($_POST['accnumber']);
 $acctype = stripslashes($_POST['acctype']);
 
 $bname = trim($bname);
 $accname = trim($accname);
 $accnumber = trim($accnumber);
 $acctype = trim($acctype);

 $bname = strip_tags(trim($bname));
 $accname = strip_tags(trim($accname));
 $accnumber = strip_tags(trim($accnumber));
 $acctype = strip_tags(trim($acctype));


 $bname = htmlspecialchars($bname, ENT_QUOTES, 'UTF-8');
 $accname = htmlspecialchars($accname, ENT_QUOTES, 'UTF-8');
 $accnumber = htmlspecialchars($accnumber, ENT_QUOTES, 'UTF-8');
 $acctype = htmlspecialchars($acctype, ENT_QUOTES, 'UTF-8');

$bname = htmlentities($bname, ENT_QUOTES, 'UTF-8');
 $accname = htmlentities($accname, ENT_QUOTES, 'UTF-8');
 $accnumber = htmlentities($accnumber, ENT_QUOTES, 'UTF-8');
 $acctype = htmlentities($acctype, ENT_QUOTES, 'UTF-8');


 $bname = mysqli_real_escape_string($con,$bname);
 $accname = mysqli_real_escape_string($con,$accname);
 $accnumber = mysqli_real_escape_string($con,$accnumber);
 $acctype = mysqli_real_escape_string($con,$acctype);
 // sql query for inserting data into database

$sql11 = "SELECT accnumber FROM bankdetail WHERE email='".$email."'";
 $resume1 = mysqli_query($con, $sql11);
 $countme1 = mysqli_num_rows($resume1);



 $sql1 = "SELECT email FROM bankdetail WHERE email='".$email."'";
 $resume = mysqli_query($con, $sql1);
 $countme = mysqli_num_rows($resume);

 if ($countme==3) {


    $_SESSION['errMsg'] = "Sorry Only Three Account Details are Allowed. Thanks!";
          header("Location: bank_acc.php");
            exit;

  
 }
 
$sql_query = "INSERT INTO bankdetail (bankname, accname, accnumber, acctype, email, phone, yourname) VALUES ('".$bname."', '".$accname."', '".$accnumber."', '".$acctype."', '".$email."', '".$phone."', '".$yourname."')";
$result = mysqli_query($con,$sql_query);

 if ($result)
    {
    $_SESSION['errMsg79'] = "Successful..... Bank Detail Updated!";
          header("Location: bank_acc.php");
            exit;


}
else
    { 
    $_SESSION['errMsg'] = "Error... Bank Detail Update failure. Please Retry and ensure your account number is unique. Thanks!";
          header("Location: bank_acc.php");
            exit;

}

mysqli_close($con);
}
 

?>
