<?php
$s = $_SESSION;
$loggedIn = isset($s['uid']) && isset($s['email']) && isset($s['username']);
$navToggleBtn = '
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>';
$navLinksLoggedOut = '
  <a href="index.php" class="nav-item nav-link">Home</a>
  <a href="login.php" class="nav-item nav-link">Login</a>
  <a href="register.php" class="nav-item nav-link">Register</a>';
$navLinksLoggedIn = '
  <a href="dashboard.php" class="nav-item nav-link">Dashboard</a>
  <a href="profile.php" class="nav-item nav-link">Profile</a>
  <form action="controllers/logout.php" method="POST">
    <button type="submit" name="logout" class="nav-item nav-link logoutBtn">Logout</button>
  </form>';
?>

<nav id="navbar" class="navbar navbar-expand-md navbar-dark">
  <?php echo $navToggleBtn; ?>
  <a id="brand" class="navbar-brand" href="index.php">Matchisuru</a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <?php if (!$loggedIn) echo $navLinksLoggedOut; ?>
      <?php if ($loggedIn) echo $navLinksLoggedIn; ?>
    </div>
  </div>
</nav>