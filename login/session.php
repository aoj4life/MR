
<?php

$con = mysqli_connect('localhost', 'root', '');
if (!$con) { 
	die("Database Connection failure");
}
$select_db = mysqli_select_db($con,'bitfund');
if (!$select_db) { 
	die("Database Connection failure");
}
session_start();// Starting Session
// Storing Session
//$_SESSION['login_user'] = $email;
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$sql = "select yourname from registration where email='$user_check'";
$ses_sql=mysqli_query($con , $sql);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['yourname'];
if(!isset($login_session)){
mysqli_close($con); // Closing Connection
//header('Location: dash.php'); // Redirecting To Home Page
exit;
}
?>