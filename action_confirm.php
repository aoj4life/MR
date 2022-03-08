<?php
session_start();
include 'connect.php';
$email = $_SESSION['email']; 
  $yourname = $_SESSION['yourname']; 
   $userid = $_SESSION['userid'];
   $invite = $_SESSION['invite'];


    if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: pay=confirmation.php");
            exit;

    }
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token1']) || ($_POST['_token1'] !== $_SESSION['_token1'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: pay=confirmation.php");
            exit;

     }
    }

                 if(isset($_POST['confirmed1'])) {

                        $unitid = $_POST['tid1'];
                        $uniemail = $_POST['demail'];

                      $sql22 = "UPDATE matched
                       SET status='cashout_closed'
                       WHERE id = '$unitid'";
                       $result22=mysqli_query($con,$sql22);

                       $sql20 = "UPDATE getdonations SET status='settled' WHERE email='$email' AND status='pending cashout'";
                       $result20=mysqli_query($con,$sql20);
                    //also set the donation value to confirmed in the givedonations table-->
                      
         $sql21 = "UPDATE givedonations SET status='confirmed', referral_state='confirmed' WHERE email='$uniemail' AND status='unconfirmed' AND referral_state='unconfirmed'";
                       $result21=mysqli_query($con,$sql21);

                       mysqli_close($con);

                       if ($result21) {
                         $_SESSION['errMsg'] = "Donation Received--- Confirmation Successful. Auto Renewal effective after 48hrs without recommitment. Thanks.";

                              header("Location: pay=confirmation.php");
                             }
                         //  }
                   
                 }
              
                 ?>