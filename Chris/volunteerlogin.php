<?php

	if($_SERVER['REQUEST_METHOD']==='GET'){

		session_start();
		if(isset($_SESSION["vol_email"]))
		{
			header("Location: volunteerhome.php");
		}
		else{
			show_volunteer_login();
		}
	}
	else if($_SERVER['REQUEST_METHOD']==='POST'){


		//read input details from index.html
		$email=$_POST['u'];
		$password=$_POST['p'];
		if(volunteer_registered($email,$password)){
			session_start();
			$_SESSION["vol_email_email"]=$email;
			header("Location: volunteerhome.php");
		}
		else{
			show_volunteer_login();
			echo "<script>alert('Invalid volunteer details');</script>";
		}
	}



	function show_volunteer_login() {
		//display the HTML form to register
		//or sign a user in
		$htmlpage = <<<HTMLPAGE
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Volunteer Login</title>

				<link rel="stylesheet" href="file:///Macintosh HD/Users/chukwudiezekwesili/Library/Containers/com.apple.mail/Data/Library/Mail Downloads/81FF2744-DA4E-4DA4-BBE3-D23CBA09090B/Chudi/css/normalize.css">


				<style>
					/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
					@import url(http://fonts.googleapis.com/css?family=Open+Sans);
					.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
					.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
					.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
					.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
					.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
					.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
					.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
					.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
					.btn-block { width: 100%; display:block; }

					* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

					html { width: 100%; height:100%; overflow:hidden; }

					body {
						width: 100%;
						height:100%;
						font-family: 'Open Sans', sans-serif;
						background: #092756;
						background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
						background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
						background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
						background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
						background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
						filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
					}

					.login {
						position: absolute;
						top: 50%;
						left: 50%;
						margin: -150px 0 0 -150px;
						width:300px;
						height:300px;
					}

					.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

					input {
						width: 100%;
						margin-bottom: 10px;
						background: rgba(0,0,0,0.3);
						border: none;
						outline: none;
						padding: 10px;
						font-size: 13px;
						color: #fff;
						text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
						border: 1px solid rgba(0,0,0,0.3);
						border-radius: 4px;
						box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
						-webkit-transition: box-shadow .5s ease;
						-moz-transition: box-shadow .5s ease;
						-o-transition: box-shadow .5s ease;
						-ms-transition: box-shadow .5s ease;
						transition: box-shadow .5s ease;
					}

					input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

				</style>


				/**<script src=""></script>*/



			</head>
			<body>

				<div class="login">
					<h1>Volunteer Login</h1>
					<form action="volunteerlogin.php" method="post">
						<input type="text" name="u" placeholder="Username" required="required" />
						<input type="password" name="p" placeholder="Password" required="required" />
						<button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
					</form>
				</div>


			</body>
			</html>
HTMLPAGE;

			print($htmlpage);
	}




	function volunteer_registered($email,$password) {
		//test to discover if the user is already in the DB
		//to do that, we can find out if the email address already exists in a row

		//1&2: Connect to server and choose DB
		//***** EDIT DATABASE CREDENTIALS TO BE YOUR OWN!!!

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
			//select all values from database using the entered values as filter
			$query="SELECT `vol_email`, `vol_password`
					FROM `volunteers`
					WHERE `vol_email` = '$email' AND `vol_password` = '$password' LIMIT 1";
			$output=$db->query($query) or die("Selection Query Failed !!!");


			//if the sql query returns a value
			if(mysqli_num_rows($output)){
				return TRUE; //indicate that a value was returned, and user exists in database
			}
			else{
				return false; //indicate a value wasn't returned, and user doesn't exist in database
			}
			$db->close(); // Closing Connection
		}

	}


?>