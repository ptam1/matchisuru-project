<?php
require_once('partials/header.php');

if (isset($_SESSION['uid']) && isset($_SESSION['email']) && isset($_SESSION['username'])) {
  // If all of [uid, email, username] are set, the user is already logged in... redir to dash
  header("location: dashboard.php?already_logged_in");
}

$email = $_GET['email'];
$hash = $_GET['hash'];

require_once('config/db.php');

$query = "SELECT * FROM users WHERE email='" . $email . "'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$db_hash = $user['email_verif_hash'];

if ($hash != $db_hash) {
  header('location: forgot_password.php?link_failed_or_expired');
  exit();
}

function displayMessages()
{
  if (isset($_GET['required'])) {
    echo "<div class='alert alert-danger text-center'>Password and confirm password are required.</div>";
  }
  if (isset($_GET['passwords_must_match'])) {
    echo "<div class='alert alert-danger text-center'>Password and confirm password must match.</div>";
  }
  if (isset($_GET['db_failed'])) {
    echo "<div class='alert alert-danger text-center'>Setting your new password failed due to a problem on our end. Please try again or contact support.</div>";
  }
}
?>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
    <div class="card lightCard">
      <div class="card-header text-center">Enter Your New Password</div>
      <div class="card-body">
        <form action="controllers/set_password.php" method="POST">
          <input type="hidden" name="email" value="<?php echo $email; ?>">
          <!-- Password -->
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>
          <!-- Password 2 -->
          <div class="form-group">
            <label for="password2">Confirm password</label>
            <input type="password" class="form-control" id="password2" placeholder="Confirm password" name="password2">
          </div>
          <!-- Err Messages -->
          <?php displayMessages(); ?>
          <!-- Submit -->
          <div class="text-center">
            <button type="submit" class="btn darkBtn" name="reset-password">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once('partials/footer.php'); ?>