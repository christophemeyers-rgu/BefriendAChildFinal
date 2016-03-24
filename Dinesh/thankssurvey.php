<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 22/03/2016
 * Time: 15:32
 */


session_start();
if(!isset($_SESSION['vol_email'])){
    header("Location: volunteerlogin.php");
}


echo "<script>alert('Thank you for completing the survey!');</script>";


//header("Location: volunteerhub.php");

?>


<!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8">
    <title>Thank you for submitting the survey!</title>
</head>
<body>
<input type="button" id="backtohub" name="backtohub" value="Back to Hub"><
    <script>
        $( "backtohub" ).click(function() {
            $( "thankssurvey.php" ).toggle( "fade", 1000 );
    </script>
</body>
</html>
