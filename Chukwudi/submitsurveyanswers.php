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



        //Need to get vol_id to insert into submission

        session_start();

        $email = $_SESSION['vol_email'];    //get volunteer email from session

        $vol_sql = "SELECT vol_id FROM volunteers WHERE vol_email='$email'";    //get volunteer id for FK link to submission

        $vol_result = $db->query($vol_sql) or die("Error: ".$vol_sql."<br>".$db->error);

        $row = $vol_result->fetch_assoc(); //get the row out of the table

        $vol_id = $row['vol_id'];  //There we have it


        //Need some extra info for submission instance

        //like the current date for submission_date
        date_default_timezone_set('Europe/London'); //sets the timezone to the local one
        $date= date("Y-m-d");//"date'".date("Y-m-d")."'";    //fills the current date and time in a format that works with our database

        $event_date_sql = "SELECT * FROM submissions WHERE event_date = '".$date."' )";

        $event_result = $db->query($event_date_sql) or die ("Error: ".$event_date_sql."<br>".$db->error);

        $results = mysqli_fetch_array($event_result);

        $event = $results['submission_id'];

        //Then we put all the survey answers into one array with the question_id, to get the event_description
        $answers= array(
            array($_POST['qid1'], $_POST['question1'], $_POST['question1_opt']),
            array($_POST['qid2'], $_POST['question2'], $_POST['question2_opt']),
            array($_POST['qid3'], $_POST['question3'], $_POST['question3_opt']),
            array($_POST['qid4'], $_POST['question4'], $_POST['question4_opt']),
            array($_POST['qid5'], $_POST['question5'], $_POST['question5_opt']),
            array($_POST['qid6'], $_POST['question6'], $_POST['question6_opt'])
        );


        //Then throw it all together to create an instance of submission
        //PS for now, the event_date is just the submission_date, but event_will need to be input by volunteer in a future update
        $submission_sql = "INSERT INTO submissions (vol_id, event_description, event_date, submission_date)
                            VALUES ('".$vol_id."','".$answers[0][1]."',".$date.", ".$date.")";

        if(!isset($event)) {
            //Finally, send the query to the database, to create the submission instance
            $submission_result = $db->query($submission_sql) or die("Error: " . $submission_sql . "<br>" . $db->error);


            //Next, we need to retrieve the auto_incremented submission_id for insertion into the answers table

            //the way the date is printed is different from how we had to define it in the insertion query
            $date_printed = date("Y-m-d");    //This will NEED TO BE UPDATED together with the way how we retrieve the event_date

            //Our website will require the event_date to be unique for each entry into the database, so we find the submission_id
            //by looking for the same event_date and volunteer id
            $get_submission_sql = "SELECT submission_id FROM submissions WHERE event_date='$date_printed' AND vol_id='$vol_id'";

            $submission_id_result = $db->query($get_submission_sql) or die("Error: " . $get_submission_sql . "<br>" . $db->error);

            $submission_id_row = $submission_id_result->fetch_assoc(); //get the row out of the table

            $submission_id = $submission_id_row['submission_id'];  //There we have it


            //Eventually, we are ready to link the submission_id and all the answers to the answer instance for each question

            //for-loop that adds answer details for each of the 6 questions
            for ($i = 0; $i < 6; $i++) {
                $answer_sql = "INSERT INTO answers (question_id, submission_id, answer_text_req, answer_text_opt)
                VALUES('" . $answers[$i][0] . "', '" . $submission_id . "', '" . $answers[$i][1] . "', '" . $answers[$i][2] . "')"; //query

                $answer_result = $db->query($answer_sql) or die("Error: " . $answer_sql . "<br>" . $db->error);
                //pushes current query to database


            }


            header("Location: thankssurvey.php");   //link to thankssurvey page
        }
        else{
            echo "You already submitted an event for the said date";
        }
    }



?>