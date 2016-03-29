<?php
/**
 * Created by PhpStorm.
 * User: chukwudiezekwesili
 * Date: 29/03/2016
 * Time: 09:05
 */

    include 'functions.php';

    session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Events</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Survey</h2>
    <p>Survey details for <a href="view.php?vol_email=<?php echo $vol_email; ?>"><?php echo $_GET['event_date'];?></a></p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Required answer</th>
            <th>Optional answer</th>
        </tr>
        </thead>
        <?php
        include("db_connection.php");

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');
        }

        $event_date = $_GET['event_date'];
        $vol_email = $_GET['vol_email'];

        $events = getEventDetails($event_date, $vol_email);

        if(mysqli_num_rows($events)>0){

            $counter = 0;
            while ($row= mysqli_fetch_array($events))
            {
                $counter++;

                ?>
                <tbody>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><a href=""><?php echo $row['question_text']; ?></a></td>
                    <td><?php echo $row['answer_text_req']; ?></td>
                    <td><?php echo $row['answer_text_opt']; ?></td>
                </tr>
                </tbody>
                <?php

            }
        }

        ?>
    </table>
</div>

</body>
</html>

