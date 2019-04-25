<?php
if (isset($_SESSION['uid']) && isset($_SESSION['email']) && isset($_SESSION['username'])) {
  // If all of [uid, email, username] are set, the user is already logged in... redir to dash
  header("location: dashboard.php?already_logged_in");
}

function displayMessages()
{
  if (isset($_GET['email_required'])) {
    echo '<div class="alert alert-danger text-center">Email is required.</div>';
  }
  if (isset($_GET['invalid_email'])) {
    echo '<div class="alert alert-danger text-center">Please enter a valid email address.</div>';
  }
  if (isset($_GET['email_not_found'])) {
    echo '<div class="alert alert-danger text-center">There is no account associated with that email. Please register.</div>';
  }
  if (isset($_GET['db_failure'])) {
    echo "<div class='alert alert-danger text-center'>There was an error processing your request. Please contact support at matchisuru@gmail.com.</div>";
  }
  if (isset($_GET['email_failed_to_send'])) {
    echo "<div class='alert alert-danger text-center'>The password reset email failed to send. Please try again or contact support at matchisuru@gmail.com.</div>";
  }
  if (isset($_GET['sent_email'])) {
    echo "<div class='alert alert-success text-center'>Email sent. Please check your email to reset your password.</div>";
  }
  if (isset($_GET['link_failed_or_expired'])) {
    echo "<div class='alert alert-success text-center'>That password reset link was either invalid or expired. Please try again or contact support.</div>";
  }
}
?>

<?php require_once('partials/header.php'); ?>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
    <div class="card lightCard">
      <div class="card-header text-center">Forgot Your Password?</div>
      <div class="card-body">
        <p>No worries. Just enter your email below and we'll send you an email with a link to reset your password.</p>
        <form action="controllers/send_password_reset_email.php" method="POST">
          <!-- Email -->
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email address" name="email">
          </div>
          <!-- Err Messages -->
          <?php displayMessages(); ?>
          <!-- Submit -->
          <div class="text-center">
            <button type="submit" class="btn darkBtn" name="send-password-reset-email">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once('partials/footer.php'); ?>