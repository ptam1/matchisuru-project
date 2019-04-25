<?php
session_start();
require_once('../config/db.php');

// Get current player's id and username
$id = $_SESSION['uid'];
$username = $_SESSION['username'];
$selected_game = mysqli_real_escape_string($conn, $_POST['games-question-1']);

/* Check if the selected game is already in the database. If it is, then the player is asked
  if he/she wants to retake the quiz */

$query = "SELECT * FROM games_questionnaire WHERE id='" .$id. "'AND username='" .$username. "'";
$result = mysqli_query($conn, $query);
$questionnaire_db = mysqli_fetch_assoc($result);

// Get player's selected game
$_SESSION['game'] = $selected_game;

if($questionnaire_db['game'] == $selected_game)
{
    header('location: ../yes_or_no.php?same_game_selection');
    exit;
}

header('location: ../games_questionnaire.php');
exit();