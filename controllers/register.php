<?php
session_start();
require_once('../config/db.php');
require_once('../config/swiftmailer.php');

if (isset($_POST['register'])) {
	if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2'])) {
		header("location: ../register.php?required");
		exit();
	}

	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if ($password != $password2) {
		header("location: ../register.php?confirm_password_not_match");
		exit();
	}

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("location: ../register.php?invalid_email");
		exit();
	}

	$query = "SELECT * FROM users WHERE username='" . $username . "'";
	$result = mysqli_query($conn, $query);
	$username_exists = mysqli_fetch_assoc($result);

	if ($username_exists) {
		header("location: ../register.php?username_already_exists");
		exit();
	}

	$query = "SELECT * FROM users WHERE email='" . $email . "'";
	$result = mysqli_query($conn, $query);
	$email_exists = mysqli_fetch_assoc($result);

	if ($email_exists) {
		header("location: ../register.php?email_already_has_account");
		exit();
	}

	$hash = password_hash($password, PASSWORD_DEFAULT);
	$email_verif_hash = password_hash(rand(1, 10000), PASSWORD_DEFAULT);
	$query = "INSERT INTO users (email, username, password, email_verif_hash) VALUES ('$email', '$username', '$hash', '$email_verif_hash')";
	$result = mysqli_query($conn, $query);

	// Start send verif email
	$verif_email = (new Swift_Message('Email confirmation for Matchisuru'))
		->setFrom(['matchisuru@gmail.com' => 'Matchisuru Team'])
		->setTo([$email => 'New Matchisuru User'])
		->setBody("
        Dear $username,

        Thanks for creating an account with Matchisuru. Go to the link below to verify your email and activate your Matchisuru account.

        http://mat-php.herokuapp.com/controllers/verify_email.php?hash=$email_verif_hash&email=$email

        Take Care,
        The Matchisuru Team
				");
	$result = $mailer->send($verif_email);
	// End send verif email

	header("location: ../login.php?registration_successful");
	exit();
}

header("location: ../index.php");
exit();
