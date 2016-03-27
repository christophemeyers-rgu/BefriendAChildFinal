<?php
	
	include 'functions.php';
	
	session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }
	include("db_connection.php");

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');
        }
		
		$users = getAllRegisteredUsers();
		
		if(mysqli_num_rows($users)>0){
			                                                    
				$counter = 0;
				while ($row= mysqli_fetch_array($users))
				{
				$counter++;
?>
								<tr>
                                    <td class="table-style"><?php echo $counter; ?></td>
                                    <td class="table-style"><?php echo $row['vol_email']; ?></td>
                                    <td class="table-style"><?php echo $row['vol_firstname']; ?></td>
                                    <td class="table-style"><?php echo $row['vol_surname']; ?></td>
                                    <td class="table-style">
                                        <a href="edit-user.php?vol_email=<?php echo $row['vol_email']; ?>" style="color:green;">Edit</a>
                                        &nbsp;&nbsp;&nbsp;<a href="?vol_email=<?php echo $row['vol_email']; ?>" style="color:red;">Delete</a></td>
                                </tr>
                                <?php
								
				}
		}
		
		?>