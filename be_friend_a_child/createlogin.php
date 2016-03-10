<?php

	//if the http method called is "GET"
	if($_SERVER['REQUEST_METHOD']==='GET'){
		session_exists();//call the function "session_exists()"
	}
	//if the method called is a "POST"
	else if ($_SERVER['REQUEST_METHOD']==='POST'){
		add_to_database();//call the function "add_to_database"
		email_volunteer_login();//call the function "email_volunteer_login()"
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
					show_create_user();
				}
				else{
					//create user in database if they dont exists there already
					$insert="INSERT INTO users (`user_login`, `user_password`, `firstname`,`surname`, `gender`, `address`) VALUES('$userlogin','$password','$firstname','$surname', '$gender', '$address')";
					$outcome=$db->query($insert) or die("Insert statement failed!!!");
					echo "<SCRIPT>alert('User created!!!');</SCRIPT>";
					show_create_user();//then return to the create user page 
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
                <a href='http://befriendachildtestsurvey.azurewebsites.net/be_friend_a_child/volunteerlogin.php'>this link</a>
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
	
/*		function show_create_user() {
    //display the HTML form to register
    //or sign a user in
    $htmlpage = <<<HTMLPAGE
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Create Login</title>
    <link rel="stylesheet" href="cssadminpage/screen.css" type="text/css" media="screen" title="default" />

    <link rel="stylesheet" media="all" type="text/css" href="cssadminpage/pro_dropline_ie.css" />

    <!--  jquery core -->
  /*  <script src="jsadminpage/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

    <!--  styled select box script version 2 -->
    <script src="jsadminpage/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
            $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
        });
    </script>

    <!--  styled select box script version 3 -->
    <script src="jsadminpage/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
        });
    </script>

    <!--  styled file upload script -->
    <script src="jsadminpage/jquery/jquery.filestyle.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $("input.file_1").filestyle({
                image: "images/forms/upload_file.gif",
                imageheight : 29,
                imagewidth : 78,
                width : 300
            });
        });
    </script>

    <!--  date picker script -->
    <link rel="stylesheet" href="cssadminpage/datePicker.css" type="text/css" />
    <script src="jsadminpage/jquery/date.js" type="text/javascript"></script>
    <script src="jsadminpage/jquery/jquery.datePicker.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function()
        {

// initialise the "Select date" link
            $('#date-pick')
                    .datePicker(
                            // associate the link with a date picker
                            {
                                createButton:false,
                                startDate:'01/01/2005',
                                endDate:'31/12/2020'
                            }
                    ).bind(
                    // when the link is clicked display the date picker
                    'click',
                    function()
                    {
                        updateSelects($(this).dpGetSelected()[0]);
                        $(this).dpDisplay();
                        return false;
                    }
            ).bind(
                    // when a date is selected update the SELECTs
                    'dateSelected',
                    function(e, selectedDate, $td, state)
                    {
                        updateSelects(selectedDate);
                    }
            ).bind(
                    'dpClosed',
                    function(e, selected)
                    {
                        updateSelects(selected[0]);
                    }
            );

            var updateSelects = function (selectedDate)
            {
                var selectedDate = new Date(selectedDate);
                $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                $('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
            }
// listen for when the selects are changed and update the picker
            $('#d, #m, #y')
                    .bind(
                            'change',
                            function()
                            {
                                var d = new Date(
                                        $('#y').val(),
                                        $('#m').val()-1,
                                        $('#d').val()
                                );
                                $('#date-pick').dpSetSelected(d.asString());
                            }
                    );

// default the position of the selects to today
            var today = new Date();
            updateSelects(today.getTime());

// and update the datePicker to reflect it...
            $('#d').trigger('change');
        });
    </script> 

    <!-- javascript for random password -->
    <script type='text/javascript' src='jscreatelogin/randompassword.js'></script>

</head>
<body>
<!-- Start: page-top-outer -->
<div id="page-top-outer">

    <!-- Start: page-top -->
    <div id="page-top">



        <div class="clear"></div>

    </div>
    <!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>

<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
    <!--  start nav-outer -->
    <div class="nav-outer">

        <!-- start nav-right -->
        <div id="nav-right">

            <div class="nav-divider">&nbsp;</div>
            <div class="showhide-account"><img src="imagesadminpage/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
            <div class="nav-divider">&nbsp;</div>
            <a href="logout.php" id="logout"><img src="imagesadminpage/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
            <div class="clear">&nbsp;</div>


        </div>
        <!-- end nav-right -->


        <!--  start nav -->
        <div class="nav">
            <div class="table">

                <ul class="select"><li><a href="adminhome.php"><b>Home</b></a>

                </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>



                <ul class="select"><li><a href="#nogo"><b>User Login Setup</b></a>

                    <div class="select_sub">
                        <ul class="sub">
                            <li><a href="createlogin.php">Create User Login</a></li>
                            <li><a href="#nogo">Delete User Login</a></li>
                        </ul>
                    </div>

                </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>

                <ul class="select"><li><a href="#nogo"><b>Report</b></a>

                    <div class="select_sub">
                        <ul class="sub">
                            <li><a href="#nogo">Full Report</a></li>
                            <li><a href="#nogo">Survey Query</a></li>
                            <li><a href="#nogo">Delete Report</a></li>

                        </ul>
                    </div>

                </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>


                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <!--  start nav -->

    </div>
    <div class="clear"></div>
    <!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

<div class="clear"></div>

<!-- start content-outer -->
<div id="content-outer">
    <!-- start content -->
    <div id="content">


        <div id="page-heading"><h1>Create User Login</h1></div>


        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
                <th rowspan="3" class="sized"><img src="imagesadminpage/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="3" class="sized"><img src="imagesadminpage/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
            </tr>
            <tr>
                <td id="tbl-border-left"></td>
                <td>
                    <!--  start content-table-inner -->
                    <div id="content-table-inner">

                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                            <tr valign="top">
                                <td>


                                    <!--  start step-holder -->
                                    <div id="step-holder">

                                        <div class="step-dark-left">Add User details</div>


                                        <div class="clear"></div>
                                    </div>
                                    <!--  end step-holder -->

                                    <!-- start id-form -->
                                    <form action='createlogin.php' method='post'>
                                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                                        <tr>
                                            <th valign="top">Firstname:</th>
                                            <td><input type="text" class="inp-form" name="firstname"/></td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <th valign="top">Surname:</th>
                                            <td><input type="text" class="inp-form" name="surname"/></td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <th valign="top">Gender:</th>
                                            <td>
                                                <select  class="styledselect_form_1" name="gender">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>

                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>


                                        <tr>
                                            <th valign="top">Date of Birth:</th>
                                            <td class="no height">

                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr  valign="top">
                                                        <td>
                                                                <select id="d" class="styledselect-day" name="day">
                                                                    <option value="">dd</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                </select>
                                                        </td>
                                                        <td>
                                                            <select id="m" class="styledselect-month" name="month">
                                                                <option value="">mmm</option>
                                                                <option value="1">Jan</option>
                                                                <option value="2">Feb</option>
                                                                <option value="3">Mar</option>
                                                                <option value="4">Apr</option>
                                                                <option value="5">May</option>
                                                                <option value="6">Jun</option>
                                                                <option value="7">Jul</option>
                                                                <option value="8">Aug</option>
                                                                <option value="9">Sep</option>
                                                                <option value="10">Oct</option>
                                                                <option value="11">Nov</option>
                                                                <option value="12">Dec</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select  id="y"  class="styledselect-year" name="year">
                                                                <option value="">yyyy</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                            </select>
                                                        </td>
                                                        <td><a href=""  id="date-pick"><img src="imagesadminpage/createlogin/icon_calendar.jpg" alt="" /></a></td>
                                                    </tr>
                                                </table>

                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th valign="top">Address:</th>
                                            <td><textarea rows="" cols="" class="form-textarea" name="address"></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th valign="top">E-mail:</th>
                                            <td><input type="email" class="inp-form" name="email" /></td>
                                            <td></td>

                                        </tr>

                                        <!-- added field for random password -->
                                        <tr>
                                            <th valign="top">Password:</th>
                                            <td>
                                                <label for="pass"></label>
                                                <input type="password" class="inp-form" name="password" id="pass" />
                                            </td>
                                            <td>
                                                <button type="button" onclick="output()">Create Password</button>
                                            </td>

                                        </tr>


                                        <tr>
                                            <th>Picture:</th>
                                            <td><input type="file" class="file_1" name="picture"/></td>
                                            <td>
                                                <div class="bubble-left"></div>
                                                <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
                                                <div class="bubble-right"></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>&nbsp;</th>
                                            <td valign="top">
                                                <input type="submit" value="" class="form-submit" />
                                                <input type="reset" value="" class="form-reset"  />
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    </form>
                                    <!-- end id-form  -->

                                    <img style="float:right; padding-right:10px;padding-bottom:10px;" src="imagesadminpage/shared/face-pink.png">

                                </td>

                                <td>



                            <tr>
                                <td><img src="imagesadminpage/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                                <td></td>
                            </tr>
                        </table>

                        <div class="clear"></div>


                    </div>
                    <!--  end content-table-inner  -->
                </td>
                <td id="tbl-border-right"></td>
            </tr>
            <tr>
                <th class="sized bottomleft"></th>
                <td id="tbl-border-bottom">&nbsp;</td>
                <th class="sized bottomright"></th>
            </tr>
        </table>




        <div class="clear">&nbsp;</div>

    </div>
    <!--  end content -->
    <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->



<div class="clear">&nbsp;</div>

<!-- start footer -->
<div id="footer">
    <!-- <div id="footer-pad">&nbsp;</div> -->
    <!--  start footer-left -->
    <div id="footer-left">
        Copyright 2016 Befriend A Child <a href="">http://www.befriendachild.org.uk/</a>. All rights reserved.</div>
    <!--  end footer-left -->
    <div class="clear">&nbsp;</div>
</div>
<!-- end footer -->

</body>
</html>
HTMLPAGE;

print($htmlpage);
}*/
?>