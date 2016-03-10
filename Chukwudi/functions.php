<?php

define("host","ap-cdbr-azure-east-c.cloudapp.net");
define("user", "b35e94884f471c");
define("password", "90efdea3");
define("database", "befriendachildtestDB");

function save_user() {

    $login_name = $_POST['loginName'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $surName = $_POST['surName'];
    $gender = $_POST['gender'];
    $dob_day = $_POST['dob_day'];
    $dob_month = $_POST['dob_month'];
    $dob_year = $_POST['dob_year'];
    $dob = $dob_month . "/" . $dob_day . "/" . $dob_year;
    $address = $_POST['address'];
    $imageurl = saveImage();
    $sql = "insert into users (user_login,user_password,firstname,surname,gender,dob,address,imageurl)values('$login_name','$password','$firstName','$surName','$gender','$dob','$address','$imageurl')";
    $mysqli = new mysqli(host, user, password, database);
    $mysqli->query($sql);
    $mysqli->close();
}

//end function
function saveImage() {
    if (is_uploaded_file($_FILES["file"]["tmp_name"])) {

        $maxsize = 20000000;

        $size = $_FILES["file"]['size'];

        if (is_valid_type($_FILES['file']['type'])) {

            if ($size < $maxsize) {
                $TARGET_PATH = 'images/users/';
                $TARGET_PATH.=$_FILES['file']['name'];
//                echo $TARGET_PATH;
//                echo '';
//                die();
                move_uploaded_file($_FILES['file']['tmp_name'], $TARGET_PATH);
                return $TARGET_PATH;
            }
        }
    } else {
        return "";
    }
}

//end function
function is_valid_type($type) {

    // This is an array that holds all the valid image MIME types

    $valid_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif", "image/png");



    if (in_array($type, $valid_types))
        return true;

    return false;
}

//end is_valid_type()



function verifyUserName($username) {
    $sql = "select * from admin where email_id='$username'";
	//echo $sql;
	//	echo "";
	//	die();
    $mysqli = new mysqli(host, user, password, database);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
    $result = $mysqli->query($sql);
	
    if (mysqli_num_rows($result) > 0) {		
        return TRUE;		
    }
    return FALSE;
}

//end function
function verifyPassword($username, $password) {
    $sql = "select * from admin where email_id='$username' and password = '$password'";

    $mysqli = new mysqli(host, user, password, database);
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) > 0) {		
        return TRUE;
    }
    return FALSE;
}

//end functio
function verifyUser($username, $password) {

    if (verifyUserName($username)) {
        if (verifyPassword($username, $password)) {
            return true;
        }
        return true;
    }
    return false;
}

//end function

function is_admin() {
    if (isset($_SESSION['is_admin_logged_in'])) {
        return true;
    } else {
        return false;
    }
}

//end function

function getAllRegisteredUsers() {
    $sql = "select * from users";

    $mysqli = new mysqli(host, user, password, database);
    $result = $mysqli->query($sql);

    $mysqli->close();

    return $result;
}

//end function

function deleteUser($login_name) {

    $sql = "delete from users where user_login='$login_name'";
    $mysqli = new mysqli(host, user, password, database);
    $mysqli->query($sql);
    $mysqli->close();
}

//end function

function getUser($login_name) {
    $sql = "select * from users where user_login='$login_name'";

    $mysqli = new mysqli(host, user, password, database);
    $result = $mysqli->query($sql);

//    $mysqli->close();

    return $result;
}

//end function

function updateUser() {
    $login_name = $_POST['loginName'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $surName = $_POST['surName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $login_name_prev = $_POST['user_login_prev'];
    $result = getUser($login_name_prev);
    $row = mysqli_fetch_array($result);
    $imageurl_old = $row['imageurl'];
    $imageurl = saveImage();
    if (strlen($imageurl) == 0) {
        
        $imageurl = $imageurl_old;
    } else {
        unlink($imageurl_old);
    }
    
    $sql = "update users set user_login='$login_name',user_password='$password',firstname='$firstName',surname='$surName',gender='$gender',dob='$dob', address='$address', imageurl='$imageurl' where user_login='$login_name_prev'";

    $mysqli = new mysqli(host, user, password, database);
    $mysqli->query($sql);
    $mysqli->close();
    
    }

//end function