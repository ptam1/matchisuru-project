<?php
session_start();
require_once('../config/db.php');

// Get current player's id and username
$user_id = $_SESSION['uid'];
$username = $_SESSION['username'];

// Get player's answers from game specific questionnaire
$selected_game = $_SESSION['game'];
$skill_level = mysqli_real_escape_string($conn, $_POST['games-question-2']);
$hours_playing_games = mysqli_real_escape_string($conn, $_POST['games-question-3']);
$beginner_player = mysqli_real_escape_string($conn, $_POST['games-question-4']);

/* Check if the selected game is already in the database. If it is, then the answers will be updated.
If not, the answers to a new game will be inserted. */

$query = "SELECT game FROM games_questionnaire WHERE username='" .$username. "'AND user_id='" .$user_id. "'";
$result = $conn->query($query);

while($row = mysqli_fetch_assoc($result))
{
    foreach ($row as $db_game)
    {
        if ($db_game == $selected_game)
        {
            $query = "UPDATE games_questionnaire SET skill_level='" . $skill_level .
                "', hours_playing_games='" . $hours_playing_games . "', beginner_player='" . $beginner_player .
                "'WHERE username='" . $username . "'AND user_id='" . $user_id . "'AND game='" . $selected_game . "'";
        } else
        {
            $query = "INSERT INTO games_questionnaire (user_id, username, game, skill_level, hours_playing_games, beginner_player)
                      VALUES('$user_id', '$username', '$selected_game', '$skill_level', '$hours_playing_games', '$beginner_player')";
        }
    }
}

//Checks if the query has executed successfully, and notifies the player
$query_executed = mysqli_query($conn, $query);

if ($query_executed == false)
{
  //  echo("Error description: " . mysqli_error($conn));
    header('location: ../dashboard.php?could_not_update_preferences');
exit;
}

header('location: ../dashboard.php?updated_preferences');
exit;