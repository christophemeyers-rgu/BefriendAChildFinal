<?php
/**
 * Created by PhpStorm.
 * User: chukwudiezekwesili
 * Date: 29/03/2016
 * Time: 09:05
 */

	include 'functions.php';
		
		session_start();
		if(!isset($_SESSION['vol_email'])){
			header("Location: volunteerlogin.php");
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Submissions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Submissions</h2>
  <p>List of submissions by <a href="view.php"><?php echo $_GET['vol_email'];?></a></p>
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
                                <td><a href="view3.php?event_date=<?php echo $row['event_date']; ?>&vol_email=<?php echo $vol_email; ?>"><?php echo $row['event_description']; ?></a></td>
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
