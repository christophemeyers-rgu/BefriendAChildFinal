<?php

	//if the http method called is "GET"
	if($_SERVER['REQUEST_METHOD']==='GET'){
		session_exists();//call the function "session_exists()"
	}
	//if the method called is a "POST"
	else if ($_SERVER['REQUEST_METHOD']==='POST'){
        email_volunteer_login();
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
				$userlogin=$_POST['email'];
				$firstname=$_POST['firstname'];
				$surname=$_POST['surname'];
				$gender=$_POST['gender'];
				$day=$_POST['day'];
				$month=$_POST['month'];
				$year=$_POST['year'];
				$address=$_POST['address'];
				$picture=$_POST['picture'];
				$password=$_POST['password'];
				
				//create select statemnt to using firstname and surname as filters 
				$query="SELECT `firstname`
						FROM `users`
						WHERE `firstname` ='$firstname' AND `surname` ='$surname'
						LIMIT 1";
					//cheeck to see that sql query executes properly, and return any errors 
					$output=$db->query($query) or die("Selection Query Failed !!!");
					$return=NULL;
					//go through the array of results returned from the query if any
				while($row = $output->fetch_assoc()) {
					$return=$row["firstname"];//add the firstname value ro the return variable 
					}
					//if a value was returned, then it means user exists already
				if(isset($return)){
					echo "<script>alert('User already exists');</script>";
					header("Location: createuser.php");
				}
				else{
					//create user in database if they dont exists there already
					$insert="INSERT INTO users (`user_login`, `user_password`, `firstname`,`surname`, `gender`, `address`) VALUES('$userlogin','$password','$firstname','$surname', '$gender', '$address')";
					$outcome=$db->query($insert) or die("Insert statement failed!!!");
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
					$user_check=$_SESSION['user_login']; // Storing Session
					
					//select all values from database using the entered values as filter
					$query="SELECT *
					FROM `admin`
					WHERE `email_id` = '$user_check' LIMIT 1";
					$output=$db->query($query) or die("Selection Query Failed !!!");
				}
				$login_session=NULL;
				while($row = $output->fetch_assoc()) {
					$login_session=$row["email_id"];
					}
		if(isset($login_session)){
			//show_create_user();
			header("Location: createuser.php");
		}
		else{
			header("Location: index.php");
		}
	}


	//email to volunteer function
	function email_volunteer_login(){

		//setting some variables with form values
		$firstname = $_POST["firstname"];
		$surname = $_POST["surname"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$name = $firstname . " " . $surname;

		//email subject
		$subject = "Befriend A Child - Survey Login";

		//email body in html
		$txt = "Dear $name,
                <br><br>
                An account has been set up in your name.
                <br>
                If you would like to fill out a survey concerning your experience with Befriend A Child,
                please follow
                <a href='http://befriendachildtestsurvey.azurewebsites.net/Chris/volunteerlogin.php'>this link</a>
                and login with:
                <br><br>
                Username: $email
                <br>
                Password: $password
                <br><br>
                You will be able to change your password once logged in.
                <br><br>
                King Regards,
                <br><br>
                The Befriend A Child Team";



		require_once 'swiftmailer/lib/swift_required.php';

		$transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
			->setUsername('christophe.meyers.312@gmail.com')
			->setPassword('AnnachengAddress');

		$mailer = Swift_Mailer::newInstance($transporter);

		$message = Swift_Message::newInstance('Befriend A Child Test Mail')
			->setFrom(array('christophe.meyers.312@gmail.com' => 'Christophe Meyers'))
			->setTo(array($email => $name))
			->setBody($txt, "text/html");

		$result = $mailer->send($message);


	}
?>