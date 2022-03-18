<?php

include 'functions.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

login($email, $password);

exit;

?>