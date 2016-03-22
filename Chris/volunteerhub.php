<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 21/03/2016
 * Time: 10:53
 */
    session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }


    /*//if the http method called is "GET"
    if($_SERVER['REQUEST_METHOD']==='GET'){
        session_exists();//call the function "session_exists()"
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

            //$name = get_volunteer_name($login_session);

            show_volunteer_hub($login_session);


        }
        else{
            header("Location: volunteerlogin.php");
        }
    }*/



    function get_volunteer_name($email){

        $db = new MySQLi(
            'ap-cdbr-azure-east-c.cloudapp.net', //server or host address
            'b35e94884f471c', //username for connecting to database
            '90efdea3', //user's password
            'befriendachildtestDB' //database being connected to
        );

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');
        }

        $namequery = "SELECT vol_firstname, vol_surname FROM volunteers WHERE vol_email='$email'";

        $result = $db->query($namequery);

        $row = $result->fetch_array();

        echo " ".$row['vol_firstname']." ".$row['vol_surname']."";


    }

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Volunteer Hub</title>
</head>
<body>


    <p>
        Welcome: </p>

        <?php
        get_volunteer_name($_SESSION['vol_email']);
        ?>

    <a href="volunteerhome.php">Start survey</a>

    <a href="logoutvolunteer.php" id="logout">Logout</a>


</body>
</html>












