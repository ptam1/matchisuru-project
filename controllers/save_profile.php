<?php
session_start();
require_once('../config/db.php');

if (isset($_POST['save'])) {
	$p = $_POST;

	/* 	There are 14 fields in the profiles table:
			the profileID (auto-incr, primary key)
			the userID (unique, foreign key, links the profile to the user)
			+ 12 info fields (display name, steam ID, etc.)
			Here, 13 vars are declared (for the uid + 11 info fields) */
	$uid = $_SESSION['user']['id'];
	$dispName = mysqli_real_escape_string($conn, $p['dispName']);
	$steam = mysqli_real_escape_string($conn, $p['steam']);
	$ps = mysqli_real_escape_string($conn, $p['ps']);
	$xbox = mysqli_real_escape_string($conn, $p['xbox']);
	$nintendo = mysqli_real_escape_string($conn, $p['nintendo']);
	$fb = mysqli_real_escape_string($conn, $p['fb']);
	$insta = mysqli_real_escape_string($conn, $p['insta']);
	$twitter = mysqli_real_escape_string($conn, $p['twitter']);
	$reddit = mysqli_real_escape_string($conn, $p['reddit']);
	$twitch = mysqli_real_escape_string($conn, $p['twitch']);
	$youtube = mysqli_real_escape_string($conn, $p['youtube']);
	$bio = mysqli_real_escape_string($conn, $p['bio']);

	// check if profile already exists in table
	$q = "SELECT * FROM profiles WHERE userID='$uid' LIMIT 1;";
	$res = mysqli_query($conn, $q);
	$profile = mysqli_fetch_assoc($res);

	if (!$profile) { // no profile (empty object)
		$q = "INSERT INTO profiles
			(userID, dispName, steam, ps, xbox, nintendo, fb, twitter, insta, reddit, twitch, youtube, bio)
			VALUES
			('$uid', '$dispName', '$steam', '$ps', '$xbox', '$nintendo', '$fb', '$twitter', '$insta', '$reddit', '$twitch', '$youtube', '$bio');";
		$res = mysqli_query($conn, $q);
		if ($res == true) { // query successful
			$profile = [
				"dispName" => $dispName,
				"steam" => $steam,
				"ps" => $ps,
				"xbox" => $xbox,
				"nintendo" => $nintendo,
				"fb" => $fb,
				"twitter" => $twitter,
				"insta" => $insta,
				"reddit" => $reddit,
				"twitch" => $twitch,
				"youtube" => $youtube,
				"bio" => $bio
			];

			$_SESSION['profile'] = $profile;

			header('location: ../profile.php?updated');
			exit();
		}
		// query failed
		header('location: ../profile.php?update_failed');
		exit();
	}

	// profile already exists
	$q = "UPDATE profiles SET
		dispName='$dispName',
		steam='$steam',
		ps='$ps',
		xbox='$xbox',
		nintendo='$nintendo',
		fb='$fb',
		twitter='$twitter',
		insta='$insta',
		reddit='$reddit',
		twitch='$twitch',
		youtube='$youtube',
		bio='$bio'
		WHERE userID='$uid';";
	$res = mysqli_query($conn, $q);
	if ($res == true) { // success
		$profile = [
			"dispName" => $dispName,
			"steam" => $steam,
			"ps" => $ps,
			"xbox" => $xbox,
			"nintendo" => $nintendo,
			"fb" => $fb,
			"twitter" => $twitter,
			"insta" => $insta,
			"reddit" => $reddit,
			"twitch" => $twitch,
			"youtube" => $youtube,
			"bio" => $bio
		];

		$_SESSION['profile'] = $profile;

		header('location: ../profile.php?updated');
		exit();
	}
	// fail
	header('location: ../profile.php?update_failed');
	exit();
}
