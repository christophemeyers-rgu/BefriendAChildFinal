<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 22/03/2016
 * Time: 15:32
 */

    //THIS PAGE JUST EXISTS AS A TEMPORARY SOLUTION TO WANTING TO DISPLAY A THANK YOU MESSAGE AFTER SUBMITTING THE SURVEY



    //Without a session, the volunteer is sent back to the volunteerlogin.php page
    session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }


echo "<script>alert('Thank you for completing the survey!');</script>"; //thank you notification



?>


<!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8">
    <title>Thank you for submitting the survey!</title>
</head>
<body>
    <a href="volunteerhub.php">Back to Hub</a>
</body>
</html>
