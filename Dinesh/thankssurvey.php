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


header("Location: volunteerhub.php");


