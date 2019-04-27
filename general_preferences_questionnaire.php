<?php require_once('partials/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <h5 class="card-header">General Preferences Questionnaire</h5>
                <div class="card-body">

                    <form action="controllers/general_preferences.php" method="POST" id="pref_questionnaire">
                        <!-- Question 1 -->
                        <h5>1. Which do you prefer?</h5>
                        <div>
                            <input type="radio" name="pref-question-1" id="pref-question-1-a" value="Loud Teammates" required/>
                            <label for="pref-question-1-a">a. Loud Teammates</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-1" id="pref-question-1-b" value="Quiet Teammates"/>
                            <label for="pref-question-1-b">b. Quiet Teammates</label>
                        </div>

                        <!-- Question 2 -->
                        <h5>2. Would you describe yourself as:</h5>
                        <div>
                            <input type="radio" name="pref-question-2" id="pref-question-2-a" value="Loud Teammate" required/>
                            <label for="pref-question-2-a">a. Loud Teammate</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-2" id="pref-question-2-b" value="Quiet Teammate"/>
                            <label for="pref-question-2-b">b. Quiet Teammate</label>
                        </div>

                        <!-- Question 3 -->
                        <h5>3. Do you often get mad while playing video games involving other players?</h5>
                        <div>
                            <input type="radio" name="pref-question-3" id="pref-question-3-a" value="Yes" required/>
                            <label for="pref-question-3-a">a. Yes</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-3" id="pref-question-3-b" value="No"/>
                            <label for="pref-question-3-b">b. No</label>
                        </div>

                        <!-- Question 4 -->
                        <h5>4. Do you often use foul language?</h5>
                        <div>
                            <input type="radio" name="pref-question-4" id="pref-question-4-a" value="Yes" required/>
                            <label for="pref-question-4-a">a. Yes</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-4" id="pref-question-4-b" value="No"/>
                            <label for="pref-question-4-b">b. No</label>
                        </div>

                        <!-- Question 5 -->
                        <h5>5. What is your current age group?</h5>
                        <div>
                            <input type="radio" name="pref-question-5" id="pref-question-5-a" value="12 - 16 years old" required/>
                            <label for="pref-question-5-a">a. 12 - 16 years old</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-5" id="pref-question-5-b" value="17 - 25 years old"/>
                            <label for="pref-question-5-b">b. 17 - 25 years old</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-5" id="pref-question-5-c" value="26 - 35 years old"/>
                            <label for="pref-question-5-c">c. 26 - 35 years old</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-5" id="pref-question-5-d" value="36+ years old"/>
                            <label for="pref-question-5-d">d. 36+ years old</label>
                        </div>

                        <!-- Question 6 -->
                        <h5>6. Which of these options would you consider to be your strongest trait?</h5>
                        <div>
                            <input type="radio" name="pref-question-6" id="pref-question-6-a" value="Communication" required/>
                            <label for="pref-question-6-a">a. Communication</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-6" id="pref-question-6-b" value="Strategist"/>
                            <label for="pref-question-6-b">b. Strategist</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-6" id="pref-question-6-c" value="Support"/>
                            <label for="pref-question-6-c">c. Support</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-6" id="pref-question-6-d" value="Top Fragger"/>
                            <label for="pref-question-6-d">d. Top Fragger</label>
                        </div>

                        <!-- Question 7 -->
                        <h5>7. Are you active on a mic?</h5>
                        <div>
                            <input type="radio" name="pref-question-7" id="pref-question-7-a" value="No" required/>
                            <label for="pref-question-7-a">a. No</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-7" id="pref-question-7-b" value="Yes"/>
                            <label for="pref-question-7-b">b. Yes</label>
                        </div>

                        <!-- Question 8 -->
                        <h5>8. When gaming, which option do you prefer?</h5>
                        <div>
                            <input type="radio" name="pref-question-8" id="pref-question-8-a" value="Having Fun" required/>
                            <label for="pref-question-8-a">a. Having Fun</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-8" id="pref-question-8-b" value="Winning"/>
                            <label for="pref-question-8-b">b. Winning</label>
                        </div>

                        <!-- Question 9 -->
                        <h5>9. Which do you consider yourself?</h5>
                        <div>
                            <input type="radio" name="pref-question-9" id="pref-question-9-a" value="Leisure Player" required/>
                            <label for="pref-question-9-a">a. Leisure Player</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-9" id="pref-question-9-b" value="Serious Player"/>
                            <label for="pref-question-9-b">b. Serious Player</label>
                        </div>

                        <!-- Question 10 -->
                        <h5>10. Please select a color from the choices:</h5>
                        <input type="radio" name="pref-question-10" id="pref-question-10-a" value="Red" required/>
                        <label for="pref-question-10-a">a. Red</label>
                        <div>
                            <input type="radio" name="pref-question-10" id="pref-question-10-b" value="Yellow"/>
                            <label for="pref-question-10-b">b. Yellow</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-10" id="pref-question-10-c" value="Blue"/>
                            <label for="pref-question-10-c">c. Blue</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-10" id="pref-question-10-d" value="Green"/>
                            <label for="pref-question-10-d">d. Green</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-10" id="pref-question-10-e" value="Orange"/>
                            <label for="pref-question-10-e">e. Orange</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-10" id="pref-question-10-f" value="Purple"/>
                            <label for="pref-question-10-f">f. Purple</label>
                        </div>

                        <!-- Question 11 -->
                        <h5>11. Please select an animal from the choices:</h5>
                        <input type="radio" name="pref-question-11" id="pref-question-11-a" value="Tiger" required/>
                        <label for="pref-question-11-a">a. Tiger</label>
                        <div>
                            <input type="radio" name="pref-question-11" id="pref-question-11-b" value="Turtle"/>
                            <label for="pref-question-11-b">b. Turtle</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-11" id="pref-question-11-c" value="Rabbit"/>
                            <label for="pref-question-11-c">c. Rabbit</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-11" id="pref-question-11-d" value="Dog"/>
                            <label for="pref-question-11-d">d. Dog</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-11" id="pref-question-11-e" value="Cat"/>
                            <label for="pref-question-11-e">e. Cat</label>
                        </div>

                        <!-- Question 12 -->
                        <h5>12. Please select a book type:</h5>
                        <div>
                            <input type="radio" name="pref-question-12" id="pref-question-12-a" value="Fiction" required/>
                            <label for="pref-question-12-a">a. Fiction</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-12" id="pref-question-12-b" value="Non-fiction"/>
                            <label for="question-12-b">b. Non-fiction</label>
                        </div>

                        <!-- Question 13 -->
                        <h5>13. Please select a drink:</h5>
                        <div>
                            <input type="radio" name="pref-question-13" id="pref-question-13-a" value="Tea" required/>
                            <label for="pref-question-13-a">a. Tea</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-13" id="question-13-b" value="Coffee"/>
                            <label for="question-13-b">b. Coffee</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-13" id="pref-question-13-c" value="Soda"/>
                            <label for="pref-question-13-c">c. Soda</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-13" id="pref-question-13-d" value="Water"/>
                            <label for="pref-question-13-d">d. Water</label>
                        </div>

                        <!-- Question 14 -->
                        <h5>14. Please select one of the following:</h5>
                        <div>
                            <input type="radio" name="pref-question-14" id="pref-question-14-a" value="Reality" required/>
                            <label for="pref-question-14-a">a. Reality</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-14" id="pref-question-14-b" value="Fantasy"/>
                            <label for="pref-question-14-b">b. Fantasy</label>
                        </div>
                        <div>
                            <input type="radio" name="pref-question-14" id="pref-question-14-c" value="Abstract"/>
                            <label for="pref-question-14-c">c. Abstract</label>
                        </div>
                        <input type="submit" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
