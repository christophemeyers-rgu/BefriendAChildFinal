<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 21/03/2016
 * Time: 10:53
 */

	if($_SERVER['REQUEST_METHOD']==='GET'){
        session_exists();
    }

	function session_exists(){

        $db = new MySQLi(
            'ap-cdbr-azure-east-c.cloudapp.net', //server or host address
            'b35e94884f471c', //username for connecting to database
            '90efdea3', //user's password
            'befriendachildtestDB' //database being connected to
        );


        // SQL Query To Fetch Complete Information Of User
        //check if there was a connection error and respond accordingly
        if($db->connect_errno){
            die('Connection failed:'.connect_error);
        }
        else{
            session_start();// Starting Session
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            // Selecting Database
            $user_check=$_SESSION['vol_email']; // Storing Session

            //select all values from database using the entered values as filter
            $query="SELECT *
					FROM `volunteers`
					WHERE `vol_email` = '$user_check' LIMIT 1";
            $output=$db->query($query) or die("Selection Query Failed !!!");//query the database
        }
        $login_session=NULL;//initiate variable to hold session state

        //goo through the output from the sql query and initiate the login_session variable using returned email_
        while($row = $output->fetch_assoc()) {
            $login_session=$row["vol_email"];
        }
        if(isset($login_session)){//if a valid session exists?
            show_volunteer_hub();
        }
        else{
            header("Location: volunteerlogin.php");
        }
    }


    function show_volunteer_hub()
    {

        $htmlpage = <<< HTMLPAGE
            <!doctype html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Volunteer Hub</title>
            </head>
            <body>


                <p>
                    Welcome!
                </p>

                <a href="volunteerhome.php">Start survey</a>

            </body>
            </html>
HTMLPAGE;
        print $htmlpage;
    }



?>




