<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($_POST['_token']) || ($_POST['_token'] !== $_SESSION['_token'])) {

     }
      }
      $_SESSION['_token'] = bin2hex(openssl_random_pseudo_bytes(12));
      $_SESSION['_token1'] = bin2hex(openssl_random_pseudo_bytes(16));



?>