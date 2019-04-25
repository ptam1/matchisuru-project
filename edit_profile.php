<?php
require_once('partials/header.php');

if (!isset($_SESSION['uid']) || !isset($_SESSION['email']) || !isset($_SESSION['username'])) {
	// If any of [uid, email, username] are not set, redirect to login
	header("location: login.php?auth_required");
	exit();
}

$s = $_SESSION;
$dispName = '';
if (isset($s['user']['username'])) $dispName = $s['user']['username'];
if (isset($s['profile']['dispName'])) $dispName = $s['profile']['dispName'];
$steam = '';
if (isset($s['profile']['steam'])) $steam = $s['profile']['steam'];
$ps = '';
if (isset($s['profile']['ps'])) $ps = $s['profile']['ps'];
$xbox = '';
if (isset($s['profile']['xbox'])) $xbox = $s['profile']['xbox'];
$nintendo = '';
if (isset($s['profile']['nintendo'])) $nintendo = $s['profile']['nintendo'];
$fb = '';
if (isset($s['profile']['fb'])) $fb = $s['profile']['fb'];
$insta = '';
if (isset($s['profile']['insta'])) $insta = $s['profile']['insta'];
$twitter = '';
if (isset($s['profile']['twitter'])) $twitter = $s['profile']['twitter'];
$reddit = '';
if (isset($s['profile']['reddit'])) $reddit = $s['profile']['reddit'];
$twitch = '';
if (isset($s['profile']['twitch'])) $twitch = $s['profile']['twitch'];
$youtube = '';
if (isset($s['profile']['youtube'])) $youtube = $s['profile']['youtube'];
$bio = '';
if (isset($s['profile']['bio'])) $bio = $s['profile']['bio'];
?>

<div class="row">
	<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 mx-auto">
		<div class="card lightCard editProfileCard">
			<div class="card-header text-center">Edit Profile</div>
			<div class="card-body">
				<form action="controllers/save_profile.php" method="POST">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6">
							<h5>Gamer Tags</h5>
							<!-- Display Name -->
							<div class="form-group">
								<label for="dispName"><i class="fas fa-user-astronaut"></i>Matchisuru display name</label>
								<input type="text" class="form-control" id="dispName" value="<?php echo $dispName; ?>" name="dispName">
							</div>
							<!-- Steam -->
							<div class="form-group">
								<label for="steam"><i class="fab fa-steam-square"></i>Steam</label>
								<input type="text" class="form-control" id="steam" value="<?php echo $steam; ?>" name="steam">
							</div>
							<!-- PlayStation -->
							<div class="form-group">
								<label for="ps"><i class="fab fa-playstation"></i>PlayStation</label>
								<input type="text" class="form-control" id="ps" value="<?php echo $ps; ?>" name="ps">
							</div>
							<!-- Xbox -->
							<div class="form-group">
								<label for="xbox"><i class="fab fa-xbox"></i>Xbox</label>
								<input type="text" class="form-control" id="xbox" value="<?php echo $xbox; ?>" name="xbox">
							</div>
							<!-- Nintendo -->
							<div class="form-group">
								<label for="nintendo"><i class="fab fa-nintendo-switch"></i>Nintendo</label>
								<input type="text" class="form-control" id="nintendo" value="<?php echo $nintendo; ?>" name="nintendo">
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<h5>Social</h5>
							<!-- Facebook -->
							<div class="form-group">
								<label for="fb"><i class="fab fa-facebook"></i>Facebook</label>
								<input type="text" class="form-control" id="fb" value="<?php echo $fb; ?>" name="fb">
							</div>
							<!-- Instagram -->
							<div class="form-group">
								<label for="insta"><i class="fab fa-instagram"></i>Instagram</label>
								<input type="text" class="form-control" id="insta" value="<?php echo $insta; ?>" name="insta">
							</div>
							<!-- Twitter -->
							<div class="form-group">
								<label for="twitter"><i class="fab fa-twitter-square"></i>Twitter</label>
								<input type="text" class="form-control" id="twitter" value="<?php echo $twitter; ?>" name="twitter">
							</div>
							<!-- Reddit -->
							<div class="form-group">
								<label for="reddit"><i class="fab fa-reddit-square"></i>Reddit</label>
								<input type="text" class="form-control" id="reddit" value="<?php echo $reddit; ?>" name="reddit">
							</div>
							<!-- Twitch -->
							<div class="form-group">
								<label for="twitch"><i class="fab fa-twitch"></i>Twitch</label>
								<input type="text" class="form-control" id="twitch" value="<?php echo $twitch; ?>" name="twitch">
							</div>
							<!-- Youtube -->
							<div class="form-group">
								<label for="youtube"><i class="fab fa-youtube-square"></i>Youtube</label>
								<input type="text" class="form-control" id="youtube" value="<?php echo $youtube; ?>" name="youtube">
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-xl-12">
							<h5>About Me</h5>
							<!-- Bio -->
							<div class="form-group">
								<label for="bio"><i class="fas fa-feather-alt"></i>Bio</label>
								<textarea class="form-control" id="bio" name="bio" rows="3"><?php echo $bio; ?></textarea>
							</div>
							<!-- Submit -->
							<div class="text-center">
								<button type="submit" class="btn darkBtn" name="save">Save Changes</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once('partials/footer.php'); ?>