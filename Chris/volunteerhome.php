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

        $query = "SELECT question_text FROM questions WHERE question_id=$qid";

        $result = $db->query($query);

        return $result;
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

        $query = "SELECT question_type FROM questions WHERE question_id=$qid";

        $result = $db->query($query);


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
<form action="volunteerhub.php" method="post">

<!-- SURVEY QUESTION 1 -->

        <label for="question1"><?php echo "<p>".get_question_text(1)."</p>"?></label>
        <br>
        <textarea name="question1" cols="45" rows="5" placeholder="Enter your response here"></textarea>
    <br>

<!-- SURVEY QUESTION 2 -->

        <label for="question2">How much did you spend today ? :</label>
        <br>
        <input type="number" step="any" name="question2" placeholder="Enter Amount">
    <br>

<!-- SURVEY QUESTION 3 -->

        <label for="question3">How much fun did you have today ? :</label>
        <input type="radio" name="question3"><img src="volunteerhome_assets/volunteerhome_images/surveyiconsad.png">
        <input type="radio" name="question3"><img src="volunteerhome_assets/volunteerhome_images/surveyiconnomal.png">
        <input type="radio" name="question3"><img src="volunteerhome_assets/volunteerhome_images/surveyiconsmile.png">
        <br>
        <br>
        <label for="question3">Explain :</label>
        <br>
        <textarea name="question3" cols="45" rows="5" placeholder="Enter your explanation here"></textarea>
    <br>

<!-- SURVEY QUESTION 4 -->

        <label for="question4">Did you learn something new ? :</label>
        <input type="radio" name="question4">Nothing new
        <input type="radio" name="question4">Done it before
        <input type="radio" name="question4">Never done it before
        <br>
        <br>
        <label for="question4">Explain :</label>
        <br>
        <textarea name="question4" cols="45" rows="5" placeholder="Explain what you learned here"></textarea>
    <br>

<!-- SURVEY QUESTION 5 -->

        <label for="question5">Did you eat something healthy ? :</label>
        <input type="radio" name="question5">YES
        <input type="radio" name="question5">NO
        <br>
        <br>
        <label for="question5">Explain :</label>
        <br>
        <textarea name="question5" cols="45" rows="5" placeholder="Enter items here"></textarea>
    <br>

<!-- SURVEY QUESTION 6 -->

        <label for="question6">Would you want to do it again ? :</label>
        <input type="radio" name="question6">YES
        <input type="radio" name="question6">NO
        <br>
        <br>
        <label for="question6">Explain :</label>
        <br>
        <textarea name="question6" cols="45" rows="5" placeholder="Explain why here"></textarea>
    <br>
    <br>

    <input type="submit" value="SUBMIT SURVEY">

</form>
<!-- [END OF SURVEY] ------------------------------------------------------------------->
</body>
<!-- [END OF BODY] --------------------------------------------------------------------------------------------->

</html>