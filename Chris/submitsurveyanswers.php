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

    $vol_sql = "SELECT vol_id
                FROM volunteers
                WHERE vol_email='$email'";    //get volunteer id for FK link to submission

    $vol_result = $db->query($vol_sql) or die("Error: ".$vol_sql."<br>".$db->error);

    $row = $vol_result->fetch_assoc(); //get the row out of the table

    $vol_id = $row['vol_id'];  //There we have it



    echo "<SCRIPT>alert('Works 1!');</SCRIPT>";


    //Now we check if an event of the entered event_date already exists in the db


    $event_date = $_POST["eventdate"]; //this is the date the volunteer calls "event date"

    $event_date_sql = "date'".$event_date."'";

    $event_date_query = "SELECT *
                         FROM submissions
                         WHERE event_date = ? AND vol_id = ?";

    $stmt = $db->prepare($event_date_query);
    $stmt->bind_param("ss",$event_date_sql,$vol_id);
    $stmt->execute() or die("Error: ".$event_date_query."<br>".$db->error);

    $event_result = $stmt->get_result();

    echo "<SCRIPT>alert('Works 2!!!');</SCRIPT>";


    //if we find a submission_id in $event, THIS volunteer has already submitted something for THIS event
    if(mysqli_num_rows($event_result)>0) {
        header("Location: volunteerhome.php?Success=No");

    }
    else{

        date_default_timezone_set('Europe/London'); //sets the timezone to the local one
        $submission_date_sql="date'".date("Y-m-d")."'";    //fills the current date and time in a format that works with our database
        $event_date_sql = "date'".$event_date."'"; //this variable will be useful for inserting into db via sql

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
        $submission_sql = "INSERT INTO submissions (vol_id, event_description, event_date, submission_date)
                           VALUES (:id,:eventdescription,:eventdate,:submissiondate)";
        $stmt = $db->prepare($submission_sql);
        $stmt->bindParam(':id',$vol_id);
        $stmt->bindParam(':eventdescription',$answers[0][1]);
        $stmt->bindParam(':eventdate',$event_date_sql);
        $stmt->bindParam(':submissiondate',$submission_date_sql);

        $stmt->execute() or die("Error: ".$submission_sql."<br>".$db->error);



        //Next, we need to retrieve the auto_incremented submission_id for insertion into the answers table


        //Our website will require the event_date to be unique for each entry into the database, so we find the submission_id
        //by looking for the same event_date and volunteer id
        $get_submission_sql = "SELECT submission_id
                               FROM submissions
                               WHERE event_date=? AND vol_id=?";

        $stmt = $db->prepare($get_submission_sql);
        $stmt->bind_param("ss",$event_date,$vol_id);
        $stmt->execute() or die("Error: ".$get_submission_sql."<br>".$db->error);

        $submission_id_result = $stmt->get_result();


        $submission_id_row = mysqli_fetch_array($submission_id_result); //get the row out of the table

        $submission_id = $submission_id_row['submission_id'];  //There we have it



        //Eventually, we are ready to link the submission_id and all the answers to the answer instance for each question
        $answer_sql = "INSERT INTO answers (question_id, submission_id, answer_text_req, answer_text_opt)
                       VALUES(:questionid, :submissionid, :requiredtext, :optionaltext)"; //query
        $stmt = $db->prepare($answer_sql);


        //for-loop that adds answer details for each of the 6 questions
        for ($i = 0; $i <6; $i++){
            $stmt->bindParam(':questionid',$answers[$i][0]);
            $stmt->bindParam(':submissionid',$submission_id);
            $stmt->bindParam(':requiredtext',$answers[$i][1]);
            $stmt->bindParam(':optionaltext',$answers[$i][2]);
            $stmt->execute() or die("Error: ".$answer_sql."<br>".$db->error);
            //pushes current query to database


        }


        header("Location: volunteerhome.php?Success=Yes");   //link to thankssurvey page
    }

    $db->close();
}



?>