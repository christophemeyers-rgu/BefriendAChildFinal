<?php
    session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }

    function get_question_text($qid){
        //connect to the database
        include("db_connection.php");

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');
        }

        $query = "SELECT question_text FROM questions WHERE question_id='$qid'";

        $result = $db->query($query);

        $row = $result->fetch_assoc();

        echo $row['question_text'];
    }

    function get_question_type($qid){
        //connect to the database
        include("db_connection.php");

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');
        }

        $query = "SELECT question_type FROM questions WHERE question_id='$qid''";

        $result = $db->query($query);

        $row = $result->fetch_assoc();

        echo $row['question_type'];
    }



?>


<!DOCTYPE html>

<html lang="en">

<!- - [START OF HEAD] - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->
<head>
    <!- - CHARACTER ENCODING - ->
    <meta charset="UTF-8">

    <!- - WINDOW TAB TITLE - ->
    <title>Volunteer Homepage</title>

    <!- - WINDOW TAB ICON - ->
    <link rel="shortcut icon" href="volunteerhome_assets/volunteerhome_images/tabicon.png" type="image/x-icon" />

    <!- - CSS Stylesheet- ->
    <link rel="stylesheet" href="volunteerhome_assets/volunteerhome_css/volunteerhome.css" type="text/css">

    <!- - JQUERY SCRIPT- ->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<!- - [END OF HEAD] - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->


<!- - [START OF BODY] - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->
<body>

    <!- - (START OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->
    <main class="grid-container">

        <!- - (START OF SURVEY) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - ->
        <form id="survey" action="submitsurveyanswers.php" method="post" >


    <!- - SURVEY SUBMIT BUTTON - ->
    <section class="container" id="cont8">
        <h1><input type="submit" id="submit" name="submit" value="SUBMIT SURVEY"></h1>
    </section>

    <!- - SURVEY QUESTIONS SUMMARY - ->
    <section class="container" id="cont7">
        <h2><?php include("volunteerhome_assets/volunteerhome_phpscripts/survey_summary.php"); ?></h2>
        <input type="button" id="submit7" name="submit" value="GO TO SUBMIT SURVEY">
    </section>

    <!- - SURVEY QUESTION 6 - ->
    <section class="container" id="cont6">
        <h2><?php include("volunteerhome_assets/volunteerhome_htmlscripts/question6.php"); ?></h2>
    </section>


    <!- - SURVEY QUESTION 5 - ->
    <section class="container" id="cont5">
        <h2><?php include("volunteerhome_assets/volunteerhome_htmlscripts/question5.php"); ?></h2>
    </section>


    <!- - SURVEY QUESTION 4 - ->
    <section class="container" id="cont4">
        <h2><?php include("volunteerhome_assets/volunteerhome_htmlscripts/question4.php"); ?></h2>
    </section>


    <!- - SURVEY QUESTION 3 - ->
    <section class="container" id="cont3">
        <h2><?php include("volunteerhome_assets/volunteerhome_htmlscripts/question3.php"); ?></h2>
    </section>


    <!- - SURVEY QUESTION 2 - ->
    <section class="container" id="cont2">
        <h2><?php include("volunteerhome_assets/volunteerhome_htmlscripts/question2.php"); ?></h2>
    </section>


    <!- - SURVEY QUESTION 1 - ->
    <section class="container" id="cont1">
        <h2><?php include("volunteerhome_assets/volunteerhome_htmlscripts/question1.php"); ?></h2>
    </section>

        </form>
        <!- - (END OF SURVEY) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - ->

    <!- - CALL JQUERY SCRIPT FUNCTION- ->
    <script SRC="volunteerhome_assets/volunteerhome_jquery/surveybounce.js"></script>


    </main>
    <!- - (END OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->

</body>
<!- - [END OF BODY] - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->

</html>