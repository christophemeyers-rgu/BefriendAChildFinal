<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 21/03/2016
 * Time: 10:53
 */

    //CURRENTLY THE CENTER OF THE VOLUNTEER NAVIGATION

    //If there is no session, you'll be sent back to the volunteerlogin.php page
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


    //function gets volunteer's name from email
    function get_volunteer_name($email){

        include("db_connection.php");   //connect to database

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');   //if connection fails, return error
        }

        $namequery = "SELECT vol_firstname, vol_surname FROM volunteers WHERE vol_email='$email'";  //query for getting name

        $result = $db->query($namequery);

        $row = $result->fetch_array();

        $firstname = $row['vol_firstname'];
        $surname = $row['vol_surname'];

        echo " {$firstname} {$surname}!";   //the function prints the name with a space before and an exclamation mark after it


    }

?>

<!DOCTYPE html>

<html lang="en">

<!- - [START OF HEAD] - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->
<head>
    <!- - CHARACTER ENCODING - ->
    <meta charset="UTF-8">

    <!- - WINDOW TAB TITLE - ->
    <title>Volunteer Hub page</title>

    <!- - WINDOW TAB ICON - ->
    <link rel="shortcut icon" href="volunteerhome_assets/volunteerhome_images/tabicon.png" type="image/x-icon" />

    <!- - CSS Stylesheet- ->
    <link rel="stylesheet" href="volunteerhub_css/volunteerhub.css" type="text/css">
</head>
<!- - [END OF HEAD] - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->

<!- - [START OF BODY] - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->
<body>


<!- - (START OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->
    <main class="grid-container">

        <!-- Volunteer name is printed in the head -->
          <h1>Welcome   <?php
              get_volunteer_name($_SESSION['vol_email']);   //function from above using the email pulled from the session
              ?>
          </h1>




        <section class="container" id="cont2">
            <a href="volunteerhome.php"> <input id="startsurvey" type="button" value="Start survey"></a><br><br>

    <a href="logoutvolunteer.php" id="logout"><input id="logout" type="button" value="Logout"></a>
        </section>

    </main>
<!- - (END OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->

</body>
<!- - [END OF BODY] - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ->

</html>












