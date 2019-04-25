<?php require_once('partials/header.php'); ?>

<?php
$getStartedBtnURL = '/register.php';
$getStartedBtnText = 'Register';
$loggedIn = isset($_SESSION['uid']) && isset($_SESSION['username']) && isset($_SESSION['email']);

if ($loggedIn) {
	$getStartedBtnURL = '/dashboard.php';
	$getStartedBtnText = 'Get Started';
}
?>

<div id="homepageJumbotron" class="jumbotron jumbotron-fluid">
	<h1 class="display-4">The free video game matchmaking service.</h1>
	<p class="lead">Like Match.com, but for gaming.</p>
	<p>You provide your personality information and gaming preferences. We find people for you to play with during your next gaming sesh.</p>
	<div class="cardBtnDiv">
		<a class="btn btn-lg darkBtn" href="<?php echo $getStartedBtnURL; ?>" role="button"><?php echo $getStartedBtnText; ?></a>
		<?php if (!$loggedIn) {
			echo '<a class="btn btn-lg jIndigoBtn" href="/login.php" role="button">Login</a>';
		} ?>
	</div>
</div>

<?php require_once('partials/footer.php'); ?>