<?php

// include 'head.php'; 
  session_start();
   include 'connect.php';
   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname']; 
   $userid = $_SESSION['userid'];
   $invite = $_SESSION['invite'];
   $phone = $_SESSION['phone'];
   $pm = $pc = $dda = "";

  
  if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: give_do.php");
          exit;
           
    }



     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: give_do.php");
            exit;

     }
      }
   


   if(isset($_POST) & !empty($_POST)){
   
    $sqlc = "SELECT * FROM bankdetail WHERE email='".$email."'";
    $resultc = mysqli_query($con, $sqlc);
    $countc = mysqli_num_rows($resultc);

    if($countc>=1) {




  $pm = $_POST['Payment'];
  $pc = $_POST['Payment2'];
  $dda = $_POST['ddamount'];
   
   if (!preg_match("/^[0-9]*$/", $dda)){
   
    $_SESSION['errMsg'] = "Only numbers are allowed in Bundle value! Thanks";
          header("Location: give_do.php");
            exit;


}

 if (!preg_match("/^[0-9]*$/", $pm)){
   
    $_SESSION['errMsg'] = "Only numbers are allowed in Bundle value! Thanks";
          header("Location: give_do.php");
            exit;


}

if (!preg_match("/^[a-zA-Z ]*$/",$pc)) {

      $_SESSION['errMsg'] = "Only letters allowed in Currency. Thanks!";
           header("Location: give_do.php");
            exit;
}


    $pm = stripslashes($pm);
    $pc = stripslashes($pc);
   $dda = stripslashes($dda);

   $dda = strip_tags(trim($dda));
    $pc = strip_tags(trim($pc));
     $pm = strip_tags(trim($pm));
   
   
 $pm = htmlspecialchars($pm, ENT_QUOTES, 'UTF-8');
 $pc = htmlspecialchars($pc, ENT_QUOTES, 'UTF-8');
  $dda = htmlspecialchars($dda, ENT_QUOTES, 'UTF-8');

  
  $pm = htmlentities($pm, ENT_QUOTES, 'UTF-8');
 $pc = htmlentities($pc, ENT_QUOTES, 'UTF-8');
  $dda = htmlentities($dda, ENT_QUOTES, 'UTF-8');

 

    $pm = mysqli_real_escape_string($con,$_POST['Payment']);
    $pc = mysqli_real_escape_string($con,$_POST['Payment2']);
   $dda = mysqli_real_escape_string($con,$dda);



   $timestamp = time()-8640;
   $date1 = strtotime("+28 day", $timestamp);
    $date = date('Y-m-d H:i:s', $date1);
    $return1 = ($dda*0.40)+$dda;
    $return2 = $dda*2;
    $refer = $dda*0.1;
    $type1 = "Referral Bonus";
    $tid2 = mt_rand(1,1000000). "-".rand(100,10000);







    if ($dda<=4999) {

       $_SESSION['errMsg'] = "Sorry you cannot donate less than 5,000ngn...Thanks";
        header("Location: give_do.php");
            exit;
   
    }else{


       $sql11 = "SELECT amount FROM givedonations where email='".$email."' AND status='unconfirmed' ORDER by time DESC";
      $result22 = mysqli_query($con, $sql11);
      $rowc=mysqli_fetch_row($result22);
       $count22 = mysqli_num_rows($result22);

      if ($count22>=1) {

         $_SESSION['errMsg'] = "Sorry you cannot Donate NOW. Wait to Make Payment on last Bundle Selected. Thanks ....";
        header("Location: give_do.php");
            exit;
      }

     $sql1 = "SELECT amount FROM givedonations where email='".$email."' AND status='confirmed' ORDER by time DESC";
      $result2 = mysqli_query($con, $sql1);
      $row=mysqli_fetch_row($result2);


      if ($result2) {
        # code...

        $count = mysqli_num_rows($result2);
      }else{

        $count = 0;
      }
      

      if ($count>=1) {
            if ($dda>$row[0]) {
              
               $bitbonus = $dda*0.05;
            }else{

        $bitbonus = 0;
      }
            
           
      
      }else{

        $bitbonus = 0;
      }
   // sql query for inserting data into database

      

    

    if ($dda==5000 && $pm==0) {

        $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
          $result = mysqli_query($con,$sql_query);

    }

    elseif ($dda==10000 && $pm==1) {


      $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
   $result = mysqli_query($con,$sql_query);
 
     
    }
    elseif ($dda==20000 && $pm==2) {


      $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
   $result = mysqli_query($con,$sql_query);
 
    
    }
    elseif ($dda==50000 && $pm==3) {

      $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
   $result = mysqli_query($con,$sql_query);
 
      # code...
    }
       elseif ($dda==100000 && $pm==4) {

        $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
   $result = mysqli_query($con,$sql_query);
 
         # code...
       }
       elseif ($dda==200000 && $pm==5) {

        $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
   $result = mysqli_query($con,$sql_query);
 
         # code...
       }
       elseif ($dda==250000 && $pm==6) {
         

         $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
   $result = mysqli_query($con,$sql_query);
 
       }
       elseif ($dda==500000 && $pm==7) {
         
         $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
   $result = mysqli_query($con,$sql_query);
 
       }else{

          $_SESSION['errMsg'] = "Unsuccessful--The Value You Supplied Do Not Matched Buddle Selected. Try again. Thanks. ";
        header("Location: give_do.php");
            exit;

       }
       
  /* $sql_query = "INSERT INTO givedonations (userID, email, paymedium, currency, amount, box45, maturedate, invite, referralbonus, donorname, bitbonus, phone, TID) VALUES ('$userid', '$email', '$pm', '$pc', '$dda', '$return2', '$date', '$invite', '$refer', '$yourname', '$bitbonus', '$phone', '$tid2')";
   $result = mysqli_query($con,$sql_query);*/
 
  if ($result)
   { 
         $_SESSION['errMsg2'] = "Successful-- Your Intension is well Received. Wait for your Callout within 10 business days. Thanks ";
        header("Location: give_do.php");
            exit;

}
   else
   { 
   
        $_SESSION['errMsg'] = "Unsuccessful-- an ERROR has occurred please try again. Thanks";
        header("Location: give_do.php");
            exit;
          }
   }
    }

    else{
       $_SESSION['errMsg'] = "Your Bank Detail will be Required before Donation.Click User Account on the navigation and complete the form. Thanks";
        header("Location: give_do.php");
            exit;

    }

   mysqli_close($con);
   
  }


 
    
   
   ?>