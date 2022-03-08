<?php
                   
    session_start();
include 'connect.php';
$email = $_SESSION['email']; 
  $yourname = $_SESSION['yourname']; 
   $userid = $_SESSION['userid'];
   $invite = $_SESSION['invite'];


    if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
      $_SESSION['errMsg'] = "Sorry Invalid Request Type...";
        header("Location: get_do.php");
            exit;

    }
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])) {
   

     $_SESSION['errMsg'] = "Invalid CSRF token...";
        header("Location: pay=confirmation.php");
            exit;

     }
    }

                 if(isset($_POST['confirmed2'])) {

                        $unitid1 = $_POST['tid11'];
                        $uniemail1 = $_POST['demail1'];

                      $sql22 = "UPDATE matched1
                       SET status='cashout_closed'
                       WHERE id = '$unitid1'";
                       $result22=mysqli_query($con,$sql22);

                       $sql20 = "UPDATE getdonations SET status='settled' WHERE email='$email' AND status='pending cashout'";
                       $result20=mysqli_query($con,$sql20);
                    //also set the donation value to confirmed in the givedonations table-->

                       $sql11 = "SELECT * FROM matched1 where donoremail='$uniemail1' AND status='cashout_open'";
                       $result12 = mysqli_query($con, $sql11);
                       $count = mysqli_num_rows($result12);

    if ($count===0) {
        
                       $sql211 = "UPDATE givedonations SET status='confirmed', referral_state='confirmed' WHERE email='$uniemail1' AND status='unconfirmed' AND referral_state='unconfirmed'";
                       $result211=mysqli_query($con,$sql211);

                        mysqli_close($con);

                       

                     }


                         $_SESSION['errMsg'] = "Donation Received--- Confirmation Successful. Auto Renewal effective after 48hrs without recommitment. Thanks.";

                          header("Location: pay=confirmation.php");
                 ?>