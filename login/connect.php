<?php
$con = mysqli_connect('localhost', 'root', '');
if (!$con) { 
	die("Database Connection failure");
}
$select_db = mysqli_select_db($con,'bitfund');
if (!$select_db) { 
	die("Database Connection failure");
}

?>