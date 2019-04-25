<?php
require_once('partials/header.php');

if (isset($_SESSION['uid']) && isset($_SESSION['email']) && isset($_SESSION['username'])) {
  // If all of [uid, email, username] are set, the user is already logged in... redir to dash
  header("location: dashboard.php?already_logged_in");
}

function displayMessages()
{
  if (isset($_GET['required'])) {
    echo '<div class="alert alert-danger text-center">Username, email, password, and confirm password are required.</div>';
  }
  if (isset($_GET['invalid_email'])) {
    echo '<div class="alert alert-danger text-center">Please enter a valid email address.</div>';
  }
  if (isset($_GET['username_already_exists'])) {
    echo '<div class="alert alert-danger text-center">That username is taken.</div>';
  }
  if (isset($_GET['email_already_has_account'])) {
    echo '<div class="alert alert-danger text-center">That email already has an account associated with it.</div>';
  }
  if (isset($_GET['confirm_password_not_match'])) {
    echo '<div class="alert alert-danger text-center">The password and confirm password must match.</div>';
  }
}
?>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
    <div class="card lightCard">
      <div class="card-header text-center">Register</div>
      <div class="card-body">
        <form action="controllers/register.php" method="POST">
          <!-- Email -->
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email address" name="email">
          </div>
          <!-- Username -->
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
          </div>
          <!-- Password -->
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>
          <!-- Password -->
          <div class="form-group">
            <label for="password2">Confirm password</label>
            <input type="password" class="form-control" id="password2" placeholder="Confirm password" name="password2">
          </div>
          <!-- Err Messages -->
          <?php displayMessages(); ?>
          <!-- Submit -->
          <div class="text-center">
            <button type="submit" class="btn darkBtn" name="register">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once('partials/footer.php'); ?>