<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 21/03/2016
 * Time: 23:44
 */

    session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }

    include("db_connection.php");

    if($db->connect_errno){
        die('Connectfailed['.$db->connect_error.']');
    }

    $email = $_SESSION['vol_email'];

    $sql = "SELECT vol_id FROM volunteers WHERE vol_email='$email'";

    $result = $db->query($sql);

    $row = $result->fetch_assoc();

    $vid = $row['vol_id'];

    date_default_timezone_set('Europe/London');
    $date="date'".date("Y-m-d")."'";

    $answers= array(
        array($_POST['qid1'], $_POST['question1'], $_POST['question1_opt']),
        array($_POST['qid2'], $_POST['question2'], $_POST['question2_opt']),
        array($_POST['qid3'], $_POST['question3'], $_POST['question3_opt']),
        array($_POST['qid4'], $_POST['question4'], $_POST['question4_opt']),
        array($_POST['qid5'], $_POST['question5'], $_POST['question5_opt']),
        array($_POST['qid6'], $_POST['question6'], $_POST['question6_opt'])
    );


    for ($i = 0; $i <6; $i++){
        $insert = "INSERT INTO answers (question_id, vol_id, answer_text_req, answer_text_opt, answer_date)
                VALUES('".$answers[$i][0]."', '".$vid."', '".$answers[$i][1]."', '".$answers[$i][2]."', ".$date.")";

        $outcome=$db->query($insert) or die("Error: ".$insert."<br>".$db->error);


    }
header("Location: volunteerhub.php");
echo "<script>alert('Thank you for completing the survey!');</script>";


?>