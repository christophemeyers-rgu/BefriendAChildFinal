<?php

    //THIS PAGE HAS THE SURVEY WITH LINKS TO ALL QUESTIONS ON IT
    //IT IS ACCESSED FROM THE VOLUNTEERHUB AND LEADS TO SUBMITSURVEYANSWERS WHEN THE SURVEY IS SUBMITTED


    //If session is missing, volunteer is sent to volunteerlogin.php
    session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }



    //FUNCTIONS:

    //pulls question text from question id
    function get_question_text($qid){
        //connect to the database
        include("db_connection.php");

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');   //error displayed if connection failed
        }

        $query = "SELECT question_text FROM questions WHERE question_id='$qid'";    //query

        $result = $db->query($query);

        $row = $result->fetch_assoc();

        echo $row['question_text']; //print question
    }

    //same as above with question type as a result
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


/*
 * question type key:
 *
 * 0 - text answer
 * 1 - numerical answer
 * 2 - multiple choice
 * 3 - yes/no
 */


?>


<!DOCTYPE html>

<html lang="en">

<!-- - [START OF HEAD] ============================================================================================= -->
<head>
    <!-- - CHARACTER ENCODING - -->
    <meta charset="UTF-8">

    <!-- - WINDOW TAB TITLE - -->
    <title>Volunteer Homepage</title>

    <!-- - WINDOW TAB ICON - -->
    <link rel="shortcut icon" href="volunteerhome_assets/volunteerhome_images/tabicon.png" type="image/x-icon" />

    <!-- - CSS Stylesheet- -->
    <link rel="stylesheet" href="volunteerhome_assets/volunteerhome_css/volunteerhome.css" type="text/css">

    <!-- - JQUERY SCRIPT- -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<!-- - [END OF HEAD] =============================================================================================== -->


<!-- - [START OF BODY] ============================================================================================= -->
<body>

<section class="progress-wrap progress" data-percent="25">
    <section class="progress-bar progress"></section>
</section>

    <!-- - (START OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <main class="grid-container">

        <!-- - (START OF SURVEY) ---------------------------------------------------------------------- -->
        <form action="submitsurveyanswers.php" method="post" >


    <!-- - SURVEY SUBMIT BUTTON - -->
    <section class="container" id="cont8">
        <input type="button" id="previoussurveysummary" name="previous" value="GO TO SURVEY SUMMARY">
        <input type="submit" id="submit" name="submit" value="SUBMIT SURVEY">
    </section>


    <!-- - SURVEY QUESTIONS SUMMARY- -->
    <section class="container" id="cont7">
        <h1>Survey Questions Summary:</h1>
        <p id="summary"></p>
        <input type="button" id="nextsubmitsurvey" name="submit" value="GO TO SUBMIT SURVEY">
    </section>


    <!-- - SURVEY QUESTION 6 - -->
    <section class="container" id="cont6">
        <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question6.php"); ?>
    </section>


    <!-- - SURVEY QUESTION 5 - -->
    <section class="container" id="cont5">
        <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question5.php"); ?>
    </section>


    <!-- - SURVEY QUESTION 4 - -->
    <section class="container" id="cont4">
        <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question4.php"); ?>
    </section>


    <!-- - SURVEY QUESTION 3 - -->
    <section class="container" id="cont3">
        <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question3.php"); ?>
    </section>


    <!-- - SURVEY QUESTION 2 - -->
    <section class="container" id="cont2">
        <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question2.php"); ?>
    </section>


    <!-- - SURVEY QUESTION 1 - -->
    <section class="container" id="cont1">
        <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question1.php"); ?>
    </section>

        </form>
        <!-- - (END OF SURVEY) ---------------------------------------------------------------------- -->

    <!-- - CALL JQUERY SCRIPT FUNCTION- -->
    <script SRC="volunteerhome_assets/volunteerhome_jquery/surveybounce.js"></script>
    <script SRC="volunteerhome_assets/volunteerhome_jquery/surveyprogressbar.js"></script>


    </main>
    <!-- - (END OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

</body>
<!-- - [END OF BODY] =============================================================================================== -->

</html>