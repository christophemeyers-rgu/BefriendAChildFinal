<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 22/03/2016
 * Time: 09:34
 */

	session_start();
	if(session_destroy()) // Destroying All Sessions
    {
        header("Location: volunteerlogin.php"); // Redirecting To Home Page
    }
?>