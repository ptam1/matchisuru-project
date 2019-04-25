<?php
require_once('partials/header.php');

if (!isset($_SESSION['uid']) || !isset($_SESSION['email']) || !isset($_SESSION['username'])) {
  // If any of [uid, email, username] are not set, redirect to login
  header("location: login.php?auth_required");
  exit();
}

function displayDashboardMessages()
{
    if (isset($_GET['updated_preferences']))
    {
        echo '<div class="alert alert-success text-center">Your game general preferences have been updated.</div>';
    }
    if (isset($_GET['could_not_update_preferences']))
    {
        echo '<div class="alert alert-danger text-center">Your game general preferences could not be updated.</div>';
    }
}
?>

<div class="row">
  <div class="col-lg-8 col-md-10 col-sm-12 mx-auto matchupNow">
    <div class="card lightCard">
      <div class="card-body text-center">
        <p class="cardHeader">Match-up Now</p>
          <!-- Dashboard Messages -->
          <?php displayDashboardMessages() ?>
        <div class="row text-center mb-4">
          <div class="col-xs-12 col-sm-6 dashLinkDiv"><a href="select_games.php" class="btn darkBtn">Choose by game</a></div>
          <div class="col-xs-12 col-sm-6"><a href="#" class="btn darkBtn">Choose by matchup type</a></div>
          <div class="col-xs-12 col-sm-6"><a href="general_preferences_questionnaire.php" class="btn darkBtn">General Preferences Questionnaire</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-10 col-sm-12 mx-auto updatesNews">
    <div class="card lightCard">
      <div class="card-body text-center">
        <p class="cardHeader">Updates/News</p>
      </div>
    </div>
  </div>
</div>

<?php require_once('partials/footer.php'); ?>