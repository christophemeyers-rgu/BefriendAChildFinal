<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 21/03/2016
 * Time: 10:53
 */

    //if the http method called is "GET"
    if($_SERVER['REQUEST_METHOD']==='GET'){
        session_exists();//call the function "session_exists()"
    }
    //if the method called is a "POST"
    else if ($_SERVER['REQUEST_METHOD']==='POST'){
        email_volunteer_survey_confirmation();
        add_to_database();//call the function "add_to_database"
        //call the function "email_volunteer_login()"
    }

    function add_to_database(){

        //connect to the database
        $db = new MySQLi(
            'ap-cdbr-azure-east-c.cloudapp.net', //server or host address
            'b35e94884f471c', //username for connecting to database
            '90efdea3', //user's password
            'befriendachildtestDB' //database being connected to
        );

        //check if there was a connection error and respond accordingly
        if($db->connect_errno){
            die('Connection failed:'.connect_error);
        }
        else{

            //read input details from index.php
            $email=$_POST['email'];




            //create select statemnt to using firstname and surname as filters
            $query="SELECT `vol_email`
                            FROM `volunteers`
                            WHERE `vol_email` ='$email'
                            LIMIT 1";
            //check to see that sql query executes properly, and return any errors
            $output=$db->query($query) or die("Error: ".$query."<br>".$db->error);
            $return=NULL;
            //go through the array of results returned from the query if any
            while($row = $output->fetch_assoc()) {
                $return=$row["vol_email"];//add the email value to the return variable
            }
            //if a value was returned, then it means user exists already
            if(isset($return)){
                echo "<script>alert('User already exists');</script>";
                header("Location: createuser.php");
            }
            else{
                //create user in database if they dont exists there already
                $firstname=$_POST['firstname'];
                $surname=$_POST['surname'];
                $password=$_POST['password'];
                $child_matched=$_POST['child_matched'];

                if($child_matched==true){
                    $child_gender=$_POST['child_gender'];
                    $day=$_POST['day'];
                    $month=$_POST['month'];
                    $year=$_POST['year'];
                    $dob="date'".$year."-".$month."-".$day."'";
                }
                else{
                    $child_gender="other";
                    $dob="date'0000-00-00'";
                }

                $insert="INSERT INTO volunteers (vol_email, vol_password, vol_firstname,vol_surname,vol_child_matched,vol_child_gender,vol_child_dob) VALUES('".$email."','".$password."','".$firstname."','".$surname."',".$child_matched.",'".$child_gender."',".$dob.")";

                $outcome=$db->query($insert) or die("Error: ".$insert."<br>".$db->error);
                echo "<SCRIPT>alert('User created!!!');</SCRIPT>";
                header("Location: createuser.php");
            }
        }
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

            $namequery = "SELECT vol_firstname, vol_surname FROM volunteers WHERE vol_email='1511363@rgu.ac.uk'";

            $result = $db->query($namequery);

            $rowie = $result->fetch_assoc();

            echo "".$rowie['vol_firstname']." ".$rowie['vol_surname'];

            //show_volunteer_hub($login_session);
        }
        else{
            header("Location: volunteerlogin.php");
        }
    }


    function show_volunteer_hub($email)
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
                    Welcome
                    <?php



                    ?>
                    !
                </p>

                <a href="volunteerhome.php">Start survey</a>

            </body>
            </html>
HTMLPAGE;
        print $htmlpage;
    }






?>




