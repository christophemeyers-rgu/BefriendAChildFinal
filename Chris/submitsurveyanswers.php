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

    /*$email = $_SESSION['vol_email'];

    $sql = "SELECT vol_id FROM volunteers WHERE vol_email='$email'";

    $result = $db->query($sql);

    $row = $result->fetch_assoc();

    $vid = $row['vol_id'];

    $answers= array(
        array()
    );


    for ($i = 0; $i <6; $i++){
        $insert = "INSERT INTO answers (question_id, vol_id, answer_text_req, answer_text_opt, answer_date)
                VALUES('$answers[$i][0]', '$vid', '$answers[$i][1]', '$answers[$i][2]', '$date')";
    }*/



?>