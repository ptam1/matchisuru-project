<?php
session_start();
require_once('../config/db.php');

// Get current player's id and username
$id = $_SESSION['uid'];
$username = $_SESSION['username'];


// Get player's answers from game specific questionnaire
$game = $_SESSION['game'];
$skill_level = mysqli_real_escape_string($conn, $_POST['games-question-2']);
$hours_playing_games = mysqli_real_escape_string($conn, $_POST['games-question-3']);
$beginner_player = mysqli_real_escape_string($conn, $_POST['games-question-4']);

/* Check if the selected game is already in the database. If it is, then the player is asked
  if he/she wants to retake the quiz */

$query = "SELECT * FROM games_questionnaire WHERE id='" .$id. "'AND username='" .$username. "'";
$result = mysqli_query($conn, $query);
$questionnaire = mysqli_fetch_assoc($result);

if($questionnaire['game'] != $selected_game)
{
    $query = "INSERT INTO games_questionnaire (id, username, game, skill_level, hours_playing_games, beginner_player)
                  VALUES('$id', '$username', '$game', '$skill_level', '$hours_playing_games', '$beginner_player')";
}
// If the player has already taken the questionnaire, he/she will be asked if he/she wants to retake the quiz.
else
{
    $query = "UPDATE games_questionnaire SET skill_level='" .$skill_level.
        "', hours_playing_games='" .$hours_playing_games. "', beginner_player='" .$beginner_player.
        "'WHERE id='" .$id. "'AND username='" .$username. "'AND game='" .$game."'";
}

//Checks if the query has executed successfully, and notifies the player
$query_executed = mysqli_query($conn, $query);

if ($query_executed == false)
{
    echo("Error description: " . mysqli_error($conn));
    //header('location: ../dashboard.php?could_not_update_preferences');
exit;
}

header('location: ../dashboard.php?updated_preferences');
exit;