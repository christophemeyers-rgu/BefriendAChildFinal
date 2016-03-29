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
  <h2>Submissionss</h2>
  <p>List of submissions by <?php echo $row['vol_firstname'] . $row['vol_surname'];?></p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
      	<th>Event description</th>
        <th>Event date</th>
        <th>Submission date</th>
      </tr>
    </thead>
    <?php
	include("db_connection.php");

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');
        }

        $vol_email = $_GET['vol_email'];

        $submissions = getUserSubmissions($vol_email);
		
		if(mysqli_num_rows($submissions)>0){
			                                                    
				$counter = 0;
				while ($row= mysqli_fetch_array($submissions))
				{
				$counter++;

				?>
                            <tbody>
                              <tr>
                                <td><?php echo $counter; ?></td>
                                <td><a href=""><?php echo $row['event_description']; ?></a></td>
                                <td><?php echo $row['event_date']; ?></td>
                                <td><?php echo $row['submission_date']; ?></td>
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
