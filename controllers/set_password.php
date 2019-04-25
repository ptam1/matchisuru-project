<?php
session_start();
require_once('../config/db.php');

$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if (empty($password) || empty($password2)) {
  header('location: ../reset_password.php?required');
  exit();
}

if ($password != $password2) {
  header('location: ../reset_password.php?passwords_must_match');
  exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$query = "UPDATE users SET password='" . $hashed_password . "'WHERE email='" . $email . "'";
$result = mysqli_query($conn, $query); // Update queries return true if successful

if ($result == false) {
  header('location: ../reset_password.php?db_failed');
  exit();
}

header('location: ../login.php?success_password_reset');
exit();
