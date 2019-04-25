<?php
require_once('../config/db.php');

$email = $_GET['email'];
$hash = $_GET['hash'];

$query = "SELECT * FROM users WHERE email='$email' LIMIT 1;";
$res = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($res);
$db_hash = $user['email_verif_hash'];

if ($hash != $db_hash) {
  header('location: ../index.php?link_invalid_or_expired'); //@TODO: This err msg is not displayed anywhere
  exit();
}

$query = "UPDATE users SET active='1' WHERE email='" . $email . "'";
$result = mysqli_query($conn, $query); // Update query returns true if successful, false if failed

if ($result == true) {
  header('location: ../login.php?verified');
  exit();
}

header('location: ../login.php?db_failure');
exit();
