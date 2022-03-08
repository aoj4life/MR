<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["yourname"]);
unset($_SESSION["phone"]);
session_destroy();
header('Location: login_res.php');
?>