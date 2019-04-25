<?php
require_once('partials/header.php');

if (isset($_SESSION['uid']) && isset($_SESSION['email']) && isset($_SESSION['username'])) {
  // If all of [uid, email, username] are set, the user is already logged in... redir to dash
  header("location: dashboard.php?already_logged_in");
}

function displayMessages()
{
  if (isset($_GET['required'])) {
    echo '<div class="alert alert-danger text-center">Username and password are required.</div>';
  }
  if (isset($_GET['not_found'])) {
    echo '<div class="alert alert-danger text-center">There is no account with that username/email. Please register.</div>';
  }
  if (isset($_GET['invalid_login'])) {
    echo '<div class="alert alert-danger text-center">Incorrect username or password.</div>';
  }
  if (isset($_GET['auth_required'])) {
    echo '<div class="alert alert-danger text-center">An account is required to view that content. Please login or register.</div>';
  }
  if (isset($_GET['registration_successful'])) {
    echo '<div class="alert alert-success text-center">A verification email was sent to your email address. Verify your email to continue.</div>';
  }
  if (isset($_GET['not_verified'])) {
    echo '<div class="alert alert-danger text-center">A verification email was sent to your email address. Verify your email to continue.</div>';
  }
  if (isset($_GET['verified'])) {
    echo '<div class="alert alert-success text-center">Your email was verified. You are able to login now.</div>';
  }
  if (isset($_GET['db_failure'])) {
    echo '<div class="alert alert-danger text-center">Email verification failed because of a problem on our end. Please try again or contact support.</div>';
  }
  if (isset($_GET['success_password_reset'])) {
    echo '<div class="alert alert-success text-center">Your password was reset. You should be able to login now.</div>';
  }
  if (isset($_GET['failed_to_send'])) {
    echo '<div class="alert alert-danger text-center">Your email has not been verified, so you can\'t login. We tried to send you a new activation email, but it failed. Either the email address was incorrect, or the problem is on our end. Please try again or contact support.</div>';
  }
}
?>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
    <div class="card lightCard">
      <div class="card-header text-center">Login</div>
      <div class="card-body">
        <form action="controllers/login.php" method="POST">
          <!-- Email -->
          <div class="form-group">
            <label for="emailOrUsername">Email address or username</label>
            <input type="text" class="form-control" id="emailOrUsername" aria-describedby="emailHelp" placeholder="Enter username or email address" name="username">
          </div>
          <!-- Password -->
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>
          <!-- Err Messages -->
          <?php displayMessages(); ?>
          <!-- Submit -->
          <div class="text-center">
            <button type="submit" class="btn darkBtn" name="login">Submit</button>
            <div class="mt-3"><a href="forgot_password.php">Forgot password?</a></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once('partials/footer.php'); ?>