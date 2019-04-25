<?php
require_once('partials/header.php');

$s = $_SESSION;
if (!isset($s['uid']) || !isset($s['email']) || !isset($s['username'])) {
	// If any of [uid, email, username] are not set, redirect to login
	header("location: login.php?auth_required");
	exit();
}

/** Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function get_gravatar($email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array())
{
	$url = 'https://www.gravatar.com/avatar/';
	$url .= md5(strtolower(trim($email)));
	$url .= "?s=$s&d=$d&r=$r";
	if ($img) {
		$url = '<img src="' . $url . '"';
		foreach ($atts as $key => $val)
			$url .= ' ' . $key . '="' . $val . '"';
		$url .= ' />';
	}
	return $url;
}

function formatDateCreated($datetime)
{
	$year = substr($datetime, 0, 4);
	$month = substr($datetime, 5, 2);
	$day = substr($datetime, 8, 2);

	switch ($month) {
		case '01':
			$month = 'January';
			break;
		case '02':
			$month = 'February';
			break;
		case '03':
			$month = 'March';
			break;
		case '04':
			$month = 'April';
			break;
		case '05':
			$month = 'May';
			break;
		case '06':
			$month = 'June';
			break;
		case '07':
			$month = 'July';
			break;
		case '08':
			$month = 'August';
			break;
		case '09':
			$month = 'September';
			break;
		case '10':
			$month = 'October';
			break;
		case '11':
			$month = 'November';
			break;
		case '12':
			$month = 'December';
			break;
	}
	return "$month $day, $year";
}

$user = $s['user']; // user object
$profile = $s['profile']; // profile object

// items to render to DOM
$grav_url = get_gravatar($user['email'], '100', 'retro', 'pg');
$dateCreated = formatDateCreated($user['created_at']);
// display name
$dispName = $user['username']; // defaults to username if display name not set
if ($profile['dispName']) $dispName = $profile['dispName'];
// social media
$fb = $profile['fb'];
$insta = $profile['insta'];
$twitter = $profile['twitter'];
$reddit = $profile['reddit'];
$twitch = $profile['twitch'];
$youtube = $profile['youtube'];
// gamer tags
$steam = $profile['steam'];
$ps = $profile['ps'];
$xbox = $profile['xbox'];
$nintendo = $profile['nintendo'];
$gamerTagsPlaceholder = null;
if (!$steam && !$ps && !$xbox && !$nintendo) $gamerTagsPlaceholder = '<p>No gamer tags provided.</p>';
// bio
$bio = $profile['bio'];
if (!$bio) $bio = 'No bio provided.';
// games played
$gamesPlayed = 'No games played.';
?>

<div class="row">
	<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 mx-auto">
		<div class="card lightCard">
			<div class="card-header text-center">Profile</div>
			<div class="card-body profileCardBody">
				<div class="row">
					<!-- 1st col -->
					<div class="col-sm-12 col-md-3">
						<!-- Profile pic -->
						<div class="profileDiv gravatarDiv">
							<img src="<?php echo $grav_url; ?>" alt="Gravatar profile pic" class="gravatar" />
							<p><i class="fas fa-user-astronaut"></i><?php echo $dispName; ?></p>
							<p>Set your profile picture through <a href="https://en.gravatar.com/">Gravatar</a>.</p>
						</div>
						<!-- Social Media -->
						<div class="profileDiv">
							<h5>Social Media</h5>
							<p><i class="fas fa-envelope-square"></i><?php echo $s['email']; ?></p>
							<?php if ($fb) echo "<p><i class='fab fa-facebook'></i>$fb</p>"; ?>
							<?php if ($insta) echo "<p><i class='fab fa-instagram'></i>$insta</p>"; ?>
							<?php if ($twitter) echo "<p><i class='fab fa-twitter-square'></i>$twitter</p>"; ?>
							<?php if ($reddit) echo "<p><i class='fab fa-reddit-square'></i>$reddit</p>"; ?>
							<?php if ($twitch) echo "<p><i class='fab fa-twitch'></i>$twitch</p>"; ?>
							<?php if ($youtube) echo "<p><i class='fab fa-youtube-square'></i>$youtube</p>"; ?>
						</div>
					</div>
					<!-- 2nd col -->
					<div class="col-sm-12 col-md-5">
						<!-- Gamer Tags -->
						<div class="profileDiv">
							<h5>Gamer Tags</h5>
							<?php if ($gamerTagsPlaceholder) echo $gamerTagsPlaceholder; ?>
							<?php if ($steam) echo "<p><i class='fab fa-steam-square'></i>$steam</p>"; ?>
							<?php if ($ps) echo "<p><i class='fab fa-playstation'></i>$ps</p>"; ?>
							<?php if ($xbox) echo "<p><i class='fab fa-xbox'></i>$xbox</p>"; ?>
							<?php if ($nintendo) echo "<p><i class='fab fa-nintendo-switch'></i>$nintendo</p>"; ?>
						</div>
						<!-- Bio -->
						<div class="profileDiv">
							<h5>Bio</h5>
							<p><?php echo $bio; ?></p>
						</div>
						<!-- Games played -->
						<div class="profileDiv">
							<h5>Games Played</h5>
							<p><?php echo $gamesPlayed; ?></p> <!-- placeholder -->
						</div>
					</div>
					<!-- 3rd col -->
					<div class="col-md-4 col-sm-12">
						<!-- Gaming preferences -->
						<div class="profileDiv">
							<h5>Gaming Preferences</h5>
							<p><a href="#" class="btn darkBtn">Retake Gaming Preferences Quiz</a></p>
						</div>
						<!-- Account mgmt -->
						<div class="profileDiv">
							<h5>Account Management</h5>
							<p>Account created: <?php echo $dateCreated; ?></p>
							<p><a href="/edit_profile.php" class="btn darkBtn">Edit Profile</a></p>
							<p><a href="#" class="btn darkBtn">Change Password</a></p>
						</div>
						<!-- Danger zone -->
						<div class="profileDiv">
							<h5>Danger Zone</h5>
							<p><a href="#" class="btn darkBtn">Delete Account</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once('partials/footer.php'); ?>