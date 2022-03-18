<?php

function get_user($email) {
	$page = new PDO("mysql:host=localhost; dbname=myproject;", 'root', ''); 

	$list = "SELECT * FROM users WHERE email=:email";
	$state = $page->prepare($list);

	$state->execute(['email'	=>	$email]);
	return $state->fetch(PDO::FETCH_ASSOC);
}

function add_user($email, $password) {
	$page = new PDO("mysql:host=localhost; dbname=myproject;", "root", "");
	$list = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$state = $page->prepare($list);
	$state->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
}

function login($email, $password) {
	$user = get_user($email);
	if(empty($user)) {
		$_SESSION['error'] = 'Error log in';
		header("Location: /form.php");
		exit;
	}

	if(!password_verify($password, $user['password'])) {
		$_SESSION['error'] = 'Error log in';
		header("Location: /form.php");
		exit;
	}

	$_SESSION['user'] = $user;

	return true;
}

?>