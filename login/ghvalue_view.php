<?php 
   include 'connect.php';
   session_start();
   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname']; 
   $userid = $_SESSION['userid'];



 if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...Thanks";
        header("Location: get_do.php");
          exit;
           
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])) {
   

     $_SESSION['errMsg45'] = "Invalid CSRF token...Thanks";
        header("Location: get_do.php");
            exit;

     }
    }



if (isset($_POST['submitgd2'])) {

// this is for the sum of confirmed values

$sql3 = "SELECT COALESCE(sum(box45),0), COALESCE(sum(bitbonus),0) FROM givedonations WHERE email='$email' AND status='confirmed'";
$results3 = mysqli_query($con, $sql3);

$sql_query4="SELECT COALESCE(sum(referralbonus),0) FROM givedonations WHERE invite='$email' AND status='confirmed'";

$sql6 = "SELECT COALESCE(sum(bbalance),0) FROM bonuses_balance WHERE email='$email'";
$result6 = mysqli_query($con, $sql6);


  $results4 = mysqli_query($con, $sql_query4);

	$row3=mysqli_fetch_array($results3);
	$row4=mysqli_fetch_array($results4);

$_SESSION['bit'] = $row3['COALESCE(sum(bitbonus),0)'];
$_SESSION['refer'] =  $row4['COALESCE(sum(referralbonus),0)'];
$_SESSION['bbalance'] = $row6['COALESCE(sum(bbalance),0)'];
$_SESSION['box45'] = $row3['COALESCE(sum(box45),0)'];


//$tbonuses = $bit+$re;
$_SESSION['tbonuses'] = $_SESSION['bit'] + $_SESSION['refer'] + $_SESSION['bbalance'];
$_SESSION['tgh'] = $_SESSION['tbonuses']+$_SESSION['box45'];
$bcon = 0.5*$_SESSION['tgh'];
   $tid = mt_rand(1,1000000). "-".rand(100,10000);
  //$amount = $_POST['ghvalue'];


      

if ($_SESSION['box45']==0) {

  $_SESSION['errMsg44'] = "Sorry You Cannot Cashout Without Matured Donations.. Thanks";
  header("Location: get_do.php");
            exit;

  
}else{

  if ($_SESSION['tbonuses']>$bcon) {

    $_SESSION['bcontrol'] = $bcon; 


    $_SESSION['tgh'] = $_SESSION['bcontrol']+$_SESSION['box45'];
   

   $_SESSION['bonusb'] = $_SESSION['tbonuses']-$_SESSION['bcontrol'];
	
	
	if (!preg_match("/^[0-9]*$/", $_SESSION['bcontrol'])){
   
    $_SESSION['errMsg44'] = "Only numbers are allowed in Reward value!";
          header("Location: get_do.php");
            exit;


}

 if (!preg_match("/^[0-9]*$/", $_SESSION['box45'])){
   
    $_SESSION['errMsg44'] = "Only numbers are allowed in Reward value!";
          header("Location: get_do.php");
            exit;


}

 if (!preg_match("/^[0-9]*$/", $_SESSION['bonusb'])){
   
    $_SESSION['errMsg44'] = "Only numbers are allowed in Reward value!";
          header("Location: get_do.php");
            exit;


}



    $sqlb = "INSERT INTO bonuses_balance (email, name, bbalance) VALUES('$email', '$yourname', '$_SESSION[bonusb]')";
   $resultb = mysqli_query($con,$sqlb);

   $sql_q2 = "INSERT INTO getdonations(tID, email, name, amount) VALUES('$tid', '$email', '$yourname', '$_SESSION[box45]')";
   $resultq = mysqli_query($con,$sql_q2); 



 /*  
    upadte the give donation table where the gh value is obtain to prevent 
    multiple gh on the same donation value . set all confirmed donation to cashout
    if

  }
   */
   if ($resultq) {

  $sql_prevent = "UPDATE givedonations SET status='cashout' WHERE email='$email' AND status='confirmed'";
  $resultqp = mysqli_query($con,$sql_prevent); 

       $_SESSION['errMsg77'] = "Your Intension is Well Received.... You will be matched within 10 business days. Thanks";
  header("Location: get_do.php");
      mysqli_close($con);
           exit;


      }


  
  }
  else
  {

    $_SESSION['bcontrol'] = $_SESSION['tbonuses'];
    $_SESSION['tgh'] = $_SESSION['tbonuses']+$_SESSION['box45'];

   $sql_q2 = "INSERT INTO getdonations(tID, email, name, amount) VALUES('$tid', '$email', '$yourname', '$_SESSION[box45]')";
   $resultq = mysqli_query($con,$sql_q2); 


    if ($resultq) {

  $sql_prevent = "UPDATE givedonations SET status='cashout' WHERE email='$email' AND status='confirmed'";
  $resultqp = mysqli_query($con,$sql_prevent); 

  $_SESSION['errMsg77'] = "Your Intension is Well Received.... You will be matched within 10 business days. Thanks";
  header("Location: get_do.php");



     }

  }


  }

 

  
  
  
    


}

    header("Location: get_do.php");


mysqli_close($con);


?>