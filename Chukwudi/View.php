<?php
	
	include 'functions.php';
	
	session_start();
    if(!isset($_SESSION['vol_email'])){
        header("Location: volunteerlogin.php");
    }
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Volunteers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>List of Volunteers</h2>
  <p>This is a list of all volunteers in the database</p>            
  <table class="table table-striped">
    <thead>
      <tr>
      	<th>ID</th>
        <th>E-mail</th>
        <th>First name</th>
        <th>Surname</th>
      </tr>
    </thead>
    <?php
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
								<tbody>
                                  <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><a href="edit-user.php?vol_email=<?php echo $row['vol_email']; ?>"><?php echo $row['vol_email']; ?></a></td>
                                    <td><?php echo $row['vol_firstname']; ?></td>
                                    <td><?php echo $row['vol_surname']; ?></td>
                                  </tr>
                                </tbody>
                            	<?php
								
				}
		}
		
		?>
</table>
</div>

</body>
</html>
