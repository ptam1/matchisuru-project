<?php require_once('partials/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <h5 class="card-header">Games Questionnaire</h5>
                <div class="card-body">
                    <form action="controllers/select_games.php" method="POST" id="game_selection">
                        <!-- Question 1 -->
                        <h5>Select Game:</h5>
                        <div>
                            <input type="radio" name="games-question-1" id="games-question-1-a" value="Apex Legends" required/>
                            <label for="games-question-1-a">a. Apex Legends</label>
                        </div>
                        <div>
                            <input type="radio" name="games-question-1" id="games-question-1-b" value="FortNite"/>
                            <label for="games-question-1-b">b. FortNite</label>
                        </div>
                        <div>
                            <input type="radio" name="games-question-1" id="games-question-1-c" value="OverWatch"/>
                            <label for="games-question-1-c">c. OverWatch</label>
                        </div>
                        <div>
                            <input type="radio" name="games-question-1" id="games-question-1-c" value="League of Legends"/>
                            <label for="games-question-1-c">d. League of Legends</label>
                        </div>
                        <div>
                            <input type="radio" name="games-question-1" id="games-question-1-e" value="FIFA"/>
                            <label for="games-question-1-e">e. FIFA</label>
                        </div>
                        <div>
                            <input type="radio" name="games-question-1" id="games-question-1-f" value="Call of Duty: Black Ops"/>
                            <label for="games-question-1-f">f. Call of Duty: Black Ops</label>
                        </div>
                        <button name="next button" id="next button" type="submit" class="customButton">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

