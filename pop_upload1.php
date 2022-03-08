<?php 
include 'connect.php';
session_start();
    $email = $_SESSION['email']; 
    $yourname = $_SESSION['yourname']; 
   $userid = $_SESSION['userid'];
   $invite = $_SESSION['invite'];


$target_dir = "uploads/";
//$target_file = addslashes(mt_rand(10,1000000). "-".$_FILES['fileToUpload']['name']) ;
$target_file = addslashes(uniqid('',true). "-".$_FILES['fileToUpload']['name']) ;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$tid = mt_rand(1,1000000). "-".rand(100,10000);




/*$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
*/

// Check if image file is a actual image or fake image
if(isset($_POST["submit1"])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if($check !== false) {
      $_SESSION['errMsg2'] = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
     $_SESSION['errMsg2'] =  "File is not an image.Please select an image of your POP. Thanks";
        $uploadOk = 0;
          header("Location: pop.php");
              exit;

    }
}
// Check if file already exists
if (file_exists($target_file)) {
  $_SESSION['errMsg2'] = "Sorry, file already exists.";
    $uploadOk = 0;
      header("Location: pop.php");
              exit;
}
// Check file size
if ($_FILES['fileToUpload']["size"] > 500000) {
   $_SESSION['errMsg2'] = "Sorry, your file is too large.";
    $uploadOk = 0;

     header("Location: pop.php");
              exit;

}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "PNG"  && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "GIF")  {
    $_SESSION['errMsg2'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    
     header("Location: pop.php");
              exit;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

$_SESSION['errMsg2'] = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_dir.$target_file)) {

        $_SESSION['errMsggoo'] =  "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. Please, Proceed to get donation after your donation is confirmed. Thanks";


        //$sql="INSERT INTO matched(tID, pop) VALUES('$tid','$target_file')";
        $sql2_query="SELECT * FROM matched1 WHERE donoremail='$email' AND status='cashout_open' ORDER BY datecreated ASC";
        $result_set=mysqli_query($con,$sql2_query);
        $row=mysqli_fetch_array($result_set);

       $row1= $row[0][0];
        $row2= $row[1][0];

       $sql1="UPDATE matched1 SET pop='$target_file' WHERE donoremail='$email' AND status='cashout_open' and id='$row[0]'";
       mysqli_query($con, $sql1);

     

        header("Location: pop.php");
        ?>


  <?php
    } 
    else 
    {
      $_SESSION['errMsg2'] =  "The file ". basename( $_FILES["fileToUpload"]["name"]). " upload Fail.";
        header("Location: pop.php");
    ?>
  

       <?php
    }
}

?>

