<?php
require_once('partials/header.php');
function displayMessages()
{
    if (isset($_GET['same_game_selection'])) {
        echo '<div class="alert alert-danger text-center">There are saved answers for this game. Do you want to retake this questionnaire?</div>';
    }
}
?>
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-12 mx-auto matchupNow">
            <div class="card lightCard">
                <div class="card-body text-center">
                    <p class="cardHeader">Match-up Now</p>
                    <?php displayMessages() ?>
                    <div class="row text-center mb-4">
                        <form method="POST">
                            <div class="col-xs-12 col-sm-6 dashLinkDiv"><a href="games_questionnaire.php" class="btn darkBtn">Yes</a></div>
                            <!-- No Button should redirect player to the matched game page -->
                            <div class="col-xs-12 col-sm-6"><a href="#" class="btn darkBtn">No</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 mx-auto updatesNews">
            <div class="card lightCard">
                <div class="card-body text-center">
                    <p class="cardHeader">Updates/News</p>
                </div>
            </div>
        </div>
    </div>
<?php require_once('partials/footer.php'); ?>