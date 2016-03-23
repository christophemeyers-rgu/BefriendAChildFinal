<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 21/03/2016
 * Time: 23:44
 */

    //THIS PAGE DOES NOTHING BUT PUSH ANSWERS TO DATABASE


    //if the http method called is "GET"
    if($_SERVER['REQUEST_METHOD']==='GET'){
        header("Location: volunteerhome.php");	//I'm sending the volunteer straight to volunteerhome.php if the access is "GET"
    }

    //if the method called is a "POST"
    else if ($_SERVER['REQUEST_METHOD']==='POST'){
        add_answers_to_database();//call the function "add_answers_to_database"
    }



    //FUNCTIONS:

    //function that adds answers to database and then links volunteer to the thankssurvey.php page
    function add_answers_to_database(){
        include("db_connection.php");   //database connection

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');   //display possible error
        }

        $email = $_SESSION['vol_email'];    //get volunteer email from session

        $sql = "SELECT vol_id FROM volunteers WHERE vol_email='$email'";    //get volunteer id for FK link to answer

        $result = $db->query($sql);

        $row = $result->fetch_assoc();

        $vid = $row['vol_id'];  //vid as in volunteer-id

        date_default_timezone_set('Europe/London'); //sets the timezone to the local one
        $date="date'".date("Y-m-d")."'";    //fills the current date and time in a format that works with our database

        $answers= array(
            array($_POST['qid1'], $_POST['question1'], $_POST['question1_opt']),
            array($_POST['qid2'], $_POST['question2'], $_POST['question2_opt']),
            array($_POST['qid3'], $_POST['question3'], $_POST['question3_opt']),
            array($_POST['qid4'], $_POST['question4'], $_POST['question4_opt']),
            array($_POST['qid5'], $_POST['question5'], $_POST['question5_opt']),
            array($_POST['qid6'], $_POST['question6'], $_POST['question6_opt'])
        );  //this array holds question id, as well as required and optional answers for all 6 questions of this survey


        for ($i = 0; $i <6; $i++){  //for-loop that adds answer details for each of the 6 questions
            $insert = "INSERT INTO answers (question_id, vol_id, answer_text_req, answer_text_opt, answer_date)
                VALUES('".$answers[$i][0]."', '".$vid."', '".$answers[$i][1]."', '".$answers[$i][2]."', ".$date.")"; //query

            $outcome=$db->query($insert) or die("Error: ".$insert."<br>".$db->error);   //pushes current query to database


        }


        header("Location: thankssurvey.php");   //link to thankssurvey page
    }



?>