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
    <link href="//code.jquery.com/jquery-1.10.2.js">
    <link href="//code.jquery.com/ui/1.11.4/jquery-ui.js">
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
</head>
<!-- - [END OF HEAD] =============================================================================================== -->


<!-- - [START OF BODY] ============================================================================================= -->
<body>


<!-- - SURVEY PROGRESSION BAR- -->
<section id="progressbar"><section class="progress-label"></section></section>
<script>
$(function() {
        var progressbar = $( "#progressbar" ),
            progressLabel = $( ".progress-label" );

        progressbar.progressbar({
            value: false,
            change: function() {
                progressLabel.text( progressbar.progressbar( "value" ) + "%" );
            },
            complete: function() {
                progressLabel.text( "Check Answers and Click Submit to Complete Survey!" );
            }
        });

    $( "#progressbar" ).progressbar({
        value: 0
    });
});
</script>


    <!-- - (START OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <main class="grid-container">

    <!-- - (START OF SURVEY) ---------------------------------------------------------------------- -->
    <form action="submitsurveyanswers.php" method="post" >


    <!-- - SURVEY QUESTIONS SUMMARY AND SUBMISSION- -->
    <section class="container" id="cont7">
        <h1>Survey Questions Summary:</h1>
        <p id="summary"></p>
        <input type="submit" id="submit" name="submit" value="SUBMIT SURVEY">
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


    </main>
    <!-- - (END OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

</body>
<!-- - [END OF BODY] =============================================================================================== -->

</html>