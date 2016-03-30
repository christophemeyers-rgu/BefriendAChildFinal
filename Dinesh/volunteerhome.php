<?php

    //THIS PAGE HAS THE SURVEY WITH LINKS TO ALL QUESTIONS ON IT
    //IT IS ACCESSED FROM THE VOLUNTEERHUB AND LEADS TO SUBMITSURVEYANSWERS WHEN THE SURVEY IS SUBMITTED


    //If session is missing, volunteer is sent to volunteerlogin.php
    session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }


    //FUNCTIONS:

//function gets volunteer's name from email
function get_volunteer_name($email){

    include("db_connection.php");   //connect to database

    if($db->connect_errno){
        die('Connectfailed['.$db->connect_error.']');   //if connection fails, return error
    }

    $namequery = "SELECT vol_firstname, vol_surname FROM volunteers WHERE vol_email='$email'";  //query for getting name

    $result = $db->query($namequery);

    $row = $result->fetch_array();

    $firstname = $row['vol_firstname'];
    $surname = $row['vol_surname'];

    echo " {$firstname} {$surname}!";   //the function prints the name with a space before and an exclamation mark after it
}


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




    <!-- (START OF HEADER) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <header>

        <!-- Volunteer name is printed in the head -->
        <section class="header" id="name">
            <!--function from above using the email pulled from the session-->
            <h1><?php get_volunteer_name($_SESSION['vol_email']);?> </h1>
        </section>

        <!-- Logout Button -->
        <section class="header" id="logout">
            <h2> <a href="logoutvolunteer.php" id="logout"><input type="button" value="Logout"></a></h2>
        </section>

    </header>
    <!-- (END OF HEADER) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->


    <!-- (START OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <main>

        <!-- (START OF SURVEY) ---------------------------------------------------------------------- -->
        <form class="main" id="surveyform" action="submitsurveyanswers.php" method="post" >


            <!-- Survey Progression Bar -->
            <section class="form" id="surveybar">
            <section id="progressbar"><section class="progress-label"></section>
            </section>


            <!-- SURVEY QUESTIONS SUMMARY AND SUBMISSION -->
            <section class="form" id="cont7">
                <h1>Survey Questions Summary:</h1>
                <p id="summary"></p>
                <input type="submit" id="submit" name="submit" value="SUBMIT SURVEY">
            </section>


            <!-- SURVEY QUESTION 6 -->
            <section class="form" id="cont6">
                <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question6.php"); ?>
            </section>


            <!-- SURVEY QUESTION 5 -->
            <section class="form" id="cont5">
                <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question5.php"); ?>
            </section>


            <!-- SURVEY QUESTION 4 -->
            <section class="form" id="cont4">
                <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question4.php"); ?>
            </section>


            <!-- SURVEY QUESTION 3 -->
            <section class="form" id="cont3">
                <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question3.php"); ?>
            </section>


            <!-- SURVEY QUESTION 2 -->
            <section class="form" id="cont2">
                <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question2.php"); ?>
            </section>


            <!-- SURVEY QUESTION 1 -->
            <section class="form" id="cont1">
                <?php include("volunteerhome_assets/volunteerhome_htmlscripts/question1.php"); ?>
            </section>


            <!-- (START OF WELCOME PAGE) ---------------------------------------------------------------------- -->
            <section class="form" id="welcomepage">

                <!-- Volunteer name is printed in the head -->
                <!--function from above using the email pulled from the session-->
                <h1>Welcome<br><?php get_volunteer_name($_SESSION['vol_email']);?> </h1>

                <!-- Survey Instructions -->
                <p>
                    -There are 6 questions in total.
                    <br><br>
                    -A summary page at the end allows you to check your answers and change them if needed.
                    <br><br>
                   - All questions indicated as "required" must be answered to be able submit the survey.
                    <br><br>
                    Thank you.
                </p>
                <div>
                    <h2>====[To begin Survey enter the date of the outing]:====</h2>
                    <br>
                <fieldset>
                    <h3>
                    <br>
                    <label for="eventdate">Event Date</label>
                <br>
                    <input type="date" name="eventdate">
                <br>
                <br>
                    </h3>
                </fieldset>
                </div>
                <br>
                <!-- Start Survey Button -->
                <input type="button" id="start" name="next" value="Start Survey">

            </section>
            <!-- (END OF WELCOME PAGE) ---------------------------------------------------------------------- -->

        </form>
        <!-- (END OF SURVEY) ---------------------------------------------------------------------- -->


    </main>
    <!-- (END OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->


    <!-- CALL JQUERY SCRIPT FUNCTION -->
    <script SRC="volunteerhome_assets/volunteerhome_jquery/surveybounce.js"></script>


</body>
<!-- [END OF BODY] ================================================================================================= -->

</html>