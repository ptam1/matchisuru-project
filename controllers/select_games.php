<?php
session_start();
require_once('../config/db.php');

// Get current player's id and username
$user_id = $_SESSION['uid'];
$username = $_SESSION['username'];
$selected_game = mysqli_real_escape_string($conn, $_POST['games-question-1']);

// Store player's selected game
$_SESSION['game'] = $selected_game;

/* Check if the selected game is already in the database. If it is, then the player is asked
  if he/she wants to retake the quiz */

$query = "SELECT game FROM games_questionnaire WHERE username='" .$username. "'AND user_id='" .$user_id. "'";
$result = $conn->query($query);

while($questionnaire = mysqli_fetch_assoc($result))
{
    foreach($questionnaire as $value)
    {
        if ($value == $selected_game)
        {
            header('location: ../yes_or_no.php?same_game_selection');
            exit;
        }
    }

}
    header('location: ../games_questionnaire.php');
    exit();