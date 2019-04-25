<?php
session_start();
require_once('../config/db.php');
require_once('../config/swiftmailer.php');

$post = $_POST;
if (isset($post['login'])) {
	if (empty($post['username']) || empty($post['password'])) {
		header("location: ../login.php?required");
		exit();
	}

	$username_or_email_input = mysqli_real_escape_string($conn, $post['username']);
	$password = mysqli_real_escape_string($conn, $post['password']);
	$q = "SELECT * FROM users
        WHERE username='$username_or_email_input'
        OR email='$username_or_email_input'
        LIMIT 1;";
	$res = mysqli_query($conn, $q);
	$user = mysqli_fetch_assoc($res);

	if (!$user) { // user not found
		header("location: ../login.php?not_found");
		exit();
	}

	// user found
	$active = $user['active']; // check if account active, if inactive send new verif email
	if ($active == 0) {
		$username = $user['username'];
		$email = $user['email'];
		$email_verif_hash = $user['email_verif_hash'];

		// start email
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
		$res = $mailer->send($verif_email);
		// end email

		if ($res == 1) { // email sent
			header('location: ../login.php?not_verified');
			exit();
		}
		// not sent
		header('location: ../login.php?failed_to_send');
		exit();
	}

	$check_password = password_verify($password, $user['password']);
	if ($check_password == true) { // password correct
		// get profile
		$uid = $user['id'];
		$q = "SELECT * FROM profiles WHERE userID='$uid' LIMIT 1;";
		$res = mysqli_query($conn, $q);
		$profile = mysqli_fetch_assoc($res);

		$_SESSION['uid'] = $uid;
		$_SESSION['email'] = $user['email'];
		$_SESSION['username'] = $user['username'];
		$_SESSION['user'] = $user;
		$_SESSION['profile'] = $profile;

		header("location: ../dashboard.php");
		exit();
	}

	// password incorrect
	header("location: ../login.php?invalid_login");
	exit();
}
// not a POST request
header("location: ../index.php");
exit();
