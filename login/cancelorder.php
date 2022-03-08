<?php 
include 'connect.php';
   session_start();
   $email = $_SESSION['email']; 
   $yourname = $_SESSION['yourname']; 

   $date1=0;
     if(isset($_POST['cancel']) & !empty($_POST['cancel'])){

     $date1 = $_POST['date'];
     $date1 = stripcslashes($date1);
     $date1 = htmlspecialchars($date1);
     $date1 = mysqli_real_escape_string($con,$date1);

     $sql = "DELETE FROM givedonations WHERE time='$date1'";
     $result = mysqli_query($con, $sql);

     }

    mysqli_close($con);
     header("Location: give_do.php");


?>