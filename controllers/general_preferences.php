<?php
session_start();
require_once('../config/db.php');

// Get current player's id and username
$id = $_SESSION['uid'];
$username = $_SESSION['username'];

// Get player's answers from general preferences questionnaire
$teammate_pref = mysqli_real_escape_string($conn, $_POST['pref-question-1']);
$describe_yourself = mysqli_real_escape_string($conn, $_POST['pref-question-2']);
$mad_while_playing = mysqli_real_escape_string($conn, $_POST['pref-question-3']);
$foul_language = mysqli_real_escape_string($conn, $_POST['pref-question-4']);
$age_group = mysqli_real_escape_string($conn, $_POST['pref-question-5']);
$strongest_trait = mysqli_real_escape_string($conn, $_POST['pref-question-6']);
$active_on_mic = mysqli_real_escape_string($conn, $_POST['pref-question-7']);
$game_pref = mysqli_real_escape_string($conn, $_POST['pref-question-8']);
$player_type = mysqli_real_escape_string($conn, $_POST['pref-question-9']);
$color = mysqli_real_escape_string($conn, $_POST['pref-question-10']);
$animal = mysqli_real_escape_string($conn, $_POST['pref-question-11']);
$book = mysqli_real_escape_string($conn, $_POST['pref-question-12']);
$drink = mysqli_real_escape_string($conn, $_POST['pref-question-13']);
$general_pref = mysqli_real_escape_string($conn, $_POST['pref-question-14']);


$questionnaire_query = "SELECT id AND username FROM general_pref_questionnaire WHERE id='" .$id. "'AND username='" .$username. "'";
$questionnaire_status = $conn->query($questionnaire_query);

// Check if it is the first time the player is taking the quiz. If yes, then stores player's answers into the database.
$questionnaire_query = "SELECT id AND username FROM general_pref_questionnaire WHERE id='" .$id. "'AND username='" .$username. "'";
$questionnaire_status = $conn->query($questionnaire_query);



if (mysqli_fetch_row($questionnaire_status) == false)
{
    $query = "INSERT INTO general_pref_questionnaire (id, username, teammate_pref, describe_yourself, mad_while_playing, foul_language, age_group, 
                              strongest_trait, active_on_mic, game_pref, player_type, color, animal, book, drink, general_pref)
                  VALUES('$id' , '$username', '$teammate_pref', '$describe_yourself', '$mad_while_playing', '$foul_language', '$age_group', 
                             '$strongest_trait', '$active_on_mic', '$game_pref', '$player_type', '$color', '$animal', '$book', '$drink','$general_pref')";
}
// Updates player's answers into the database
else
{
    $query = "UPDATE general_pref_questionnaire SET teammate_pref='" .$teammate_pref. "', describe_yourself='" .$describe_yourself. "', mad_while_playing='" .$mad_while_playing.
        "', foul_language='" .$foul_language.  "', age_group='" .$age_group. "', strongest_trait='" .$strongest_trait. "', active_on_mic='" .$active_on_mic. "', game_pref='" .$game_pref.
        "', player_type='" .$player_type. "', color='" .$color. "', animal='" .$animal. "', book='" .$book. "', drink='"  .$drink. "', general_pref='" .$general_pref.
        "'WHERE id='" .$id. "'AND username='" .$username. "'";
}


//Checks if the query has executed successfully, and notifies the player
$query_executed = mysqli_query($conn, $query);

if ($query_executed == false)
{
    header('location: ../dashboard.php?could_not_update_preferences');
    exit;
}
header('location: ../dashboard.php?updated_preferences');
exit;