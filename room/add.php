<?php
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
// connect to database
include_once("../config.php");

// insert data
if(isset($_POST['submit'])) {
	$room_id = $_POST['room_id'];
	$room_label = $_POST['room_label'];
	$room_location = $_POST['room_location'];
	$room_gender = $_POST['room_gender'];
	$room_window = $_POST['room_window'];
	$room_monthly_price = $_POST['room_monthly_price'];
	$room_availability = $_POST['room_availability'];
	$room_description = $_POST['room_description'];

		// insert query
		$result = mysqli_query($conn, "INSERT INTO room VALUES('$room_id','$room_label', '$room_location', '$room_gender' , '$room_window','$room_monthly_price','$room_availability', '$room_description')");
		
			if(!$result) echo("Error:" . mysqli_error($conn));
				else echo 'New room added. <a href="index.php"> View Rooms </a>';
	}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<title>Add New Room</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            margin: 30px 50px;
        }
        a {
            /* text-decoration: none; */
            color: black;
        }

        p.title {
            font-size: 22px;
        }

        p {
            font-size: 18px;
        }

        input {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }

        td {
            padding: 5px;
        }

        button {
            background-color: sandybrown; 
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            color: white;
        }
    </style>
</head>
 
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<p class="title">Add new room</p>	
    <table border="0">
			<tr> 
				<td>Room ID</td>
				<td><input type="text" name="room_id" required></td>
			</tr>
			<tr> 
				<td>Room Label</td>
				<td><input type="text" name="room_label" required></td>
			</tr>
			<tr> 
				<td>Room Gender</td>
				<td><input type="text" name="room_gender" required></td>
			</tr>
			<tr> 
				<td>Room Location</td>
				<td><input type="text" name="room_location"></td>
			</tr>
			<tr> 
				<td>Room Window</td>
				<td><input type="text" name="room_window"></td>
			</tr>
			<tr> 
				<td>Room Monthly Price</td>
				<td><input type="text" name="room_monthly_price"></td>
			</tr>
			<tr> 
				<td>Room Availability</td>
				<td><input type="text" name="room_availability"></td>
			</tr>
			<tr> 
				<td>Room Description</td>
				<td><input type="text" name="room_description"></td>
			</tr>
			<tr> 
				<td></td>
				<td><button type="submit" name="submit">Add</button></td>
			</tr>
		</table>
        <p>Go back to <a href="index.php">Room</a></p>
	</form>
</body>
</html>