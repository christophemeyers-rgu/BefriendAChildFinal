<?php

	if($_SERVER['REQUEST_METHOD']==='GET'){
		
		header("Location: volunteerlogin.html");		
	}
	else if($_SERVER['REQUEST_METHOD']==='POST'){
		
		//connect to database 
		$db = new MySQLi(
						'ap-cdbr-azure-east-c.cloudapp.net', //server or host address
						'b35e94884f471c', //username for connecting to database
						'90efdea3', //user's password 
						'befriendachildtestDB' //database being connected to
						);
		
		//check that there was no error in connecting to the database
		if($db->connect_errno){
				die('Connection failed:'.connect_error);
			}
			else{
				
				//read input details from index.php
				$email=$_POST['u'];
				$password=$_POST['p'];
			}
		
		//write sql select statement using the entered parameters as filter
		$query="SELECT `user_login`
						FROM `users`
						WHERE `user_login` ='$email' AND `user_password` ='$password'
						LIMIT 1";
		
		//query the database and check to see if a value was returned
		$output=$db->query($query) or die("Selection Query Failed !!!");
					$return=NULL;
		
		//if a value was returned log user in
		while($row = $output->fetch_assoc()) {
					$return=$row["id"];//add the firstname value ro the return variable 
					}
					//if a value was returned, then it means user exists already
				if(isset($return)){
					echo "<script>alert('User logged in');</script>";
					
				}
				else{
					//
					header("Location: volunteerlogin.html");	
					echo "<script>alert('User not logged in');</script>";
					
				}
		
	}

?>