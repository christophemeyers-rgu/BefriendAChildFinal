<?php
    session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }

    function get_question_text($qid){
        //connect to the database
        $db = new MySQLi(
            'ap-cdbr-azure-east-c.cloudapp.net', //server or host address
            'b35e94884f471c', //username for connecting to database
            '90efdea3', //user's password
            'befriendachildtestDB' //database being connected to
        );

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
        $db = new MySQLi(
            'ap-cdbr-azure-east-c.cloudapp.net', //server or host address
            'b35e94884f471c', //username for connecting to database
            '90efdea3', //user's password
            'befriendachildtestDB' //database being connected to
        );

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

<!-- [START OF HEAD] --------------------------------------------------------------------------------------------->
<head>
    <!-- CHARACTER ENCODING -->
    <meta charset="UTF-8">

    <!-- WINDOW TAB TITLE -->
    <title>Volunteer Homepage</title>

    <!-- WINDOW TAB ICON -->
    <link rel="shortcut icon" href="volunteerhome_assets/volunteerhome_images/tabicon.png" type="image/x-icon" />

    <!-- CSS Stylesheet-->
    <link rel="stylesheet" href="volunteerhome_assets/volunteerhome_css/volunteerhome.css" type="text/css">
</head>
<!-- [END OF HEAD] ----------------------------------------------------------------------------------------------->


<!-- [START OF BODY] --------------------------------------------------------------------------------------------->
<body>

<!-- [START OF SURVEY] ------------------------------------------------------------------->
<form action="submitsurveyanswers.php" method="post">

<!-- SURVEY QUESTION 1 -->

    <label for="question1">
        <?php
            get_question_text(1);
        ?>
    </label>
        <br>
        <textarea name="question1" cols="45" rows="5" placeholder="Enter your response here" required></textarea>
        <input hidden name="qid1" value="1">
    <br>

<!-- SURVEY QUESTION 2 -->

        <label for="question2">
            <?php
            get_question_text(11);
            ?>
        </label>
        <br>
        <input type="number" step="any" name="question2" placeholder="Enter Amount" required>
        <input type="number" name="qid1" value="11">

    <br>

<!-- SURVEY QUESTION 3 -->

        <label for="question3">
            <?php
            get_question_text(21);
            ?>
        </label>
        <input type="radio" name="question3" required><img src="volunteerhome_assets/volunteerhome_images/surveyiconsad.png">
        <input type="radio" name="question3" required><img src="volunteerhome_assets/volunteerhome_images/surveyiconnomal.png">
        <input type="radio" name="question3" required><img src="volunteerhome_assets/volunteerhome_images/surveyiconsmile.png">
        <br>
        <br>
        <label for="question3_opt">Explain :</label>
        <br>
        <textarea name="question3_opt" cols="45" rows="5" placeholder="Enter your explanation here"></textarea>
    <br>

<!-- SURVEY QUESTION 4 -->

        <label for="question4">
            <?php
            get_question_text(31);
            ?>
        </label>
        <input type="radio" name="question4" required>Nothing new
        <input type="radio" name="question4" required>Done it before
        <input type="radio" name="question4" required>Never done it before
        <br>
        <br>
        <label for="question4_opt">Explain :</label>
        <br>
        <textarea name="question4_opt" cols="45" rows="5" placeholder="Explain what you learned here"></textarea>
    <br>

<!-- SURVEY QUESTION 5 -->

        <label for="question5">
            <?php
            get_question_text(41);
            ?>
        </label>
        <input type="radio" name="question5" required>YES
        <input type="radio" name="question5" required>NO
        <br>
        <br>
        <label for="question5_opt">Explain :</label>
        <br>
        <textarea name="question5_opt" cols="45" rows="5" placeholder="Enter items here"></textarea>
    <br>

<!-- SURVEY QUESTION 6 -->

        <label for="question6">
            <?php
            get_question_text(51);
            ?>
        </label>
        <input type="radio" name="question6" required>YES
        <input type="radio" name="question6" required>NO
        <br>
        <br>
        <label for="question6_opt">Explain :</label>
        <br>
        <textarea name="question6_opt" cols="45" rows="5" placeholder="Explain why here"></textarea>
    <br>
    <br>

    <input type="submit" value="SUBMIT SURVEY">

</form>
<!-- [END OF SURVEY] ------------------------------------------------------------------->
</body>
<!-- [END OF BODY] --------------------------------------------------------------------------------------------->

</html>