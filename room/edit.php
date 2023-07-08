<?php 
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}

// connect to database
include_once("../config.php");

// insert data
if(isset($_POST['update'])) {	
        $room_id = $_POST['room_id'];
        $room_label = $_POST['room_label'];
        $room_location = $_POST['room_location'];
        $room_gender = $_POST['room_gender'];
        $room_window = $_POST['room_window'];
        $room_monthly_price = $_POST['room_monthly_price'];
        $room_availability = $_POST['room_availability'];
        $room_description = $_POST['room_description'];
        
        $result = mysqli_query($conn, "UPDATE room SET 
        room_label = '$room_label',
        room_location = '$room_location',
        room_gender = '$room_gender', 
        room_window = '$room_window',
        room_monthly_price = '$room_monthly_price',
        room_availability = '$room_availability', 
        room_description = '$room_description'
        WHERE room_id='$room_id'");
        // redirect to homepage
        header("Location: index.php");
}

// get room id 
$room_id = $_GET['room_id'];

// fetch previous data 
$result = mysqli_query($conn, "SELECT * FROM room WHERE room_id='$room_id'");
    while($user_data = mysqli_fetch_array($result)) {
		$room_label = $user_data['room_label'];
		$room_location = $user_data['room_location'];
		$room_gender = $user_data['room_gender'];
		$room_window = $user_data['room_window'];
		$room_monthly_price = $user_data['room_monthly_price'];
		$room_availability = $user_data['room_availability'];
		$room_description = $user_data['room_description'];
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
	<title>Edit Room Data</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            margin: 30px 50px;
        }
        a {
            color: black;
        }

        p {
            font-size: 18px;
        }

        input {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }

        td {
            padding: 10px;
        }

        button {
            background-color: limegreen; 
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
	<p>Go back to <a href="index.php">Room</a></p>
	
	<form method="post" action="<?= $_SERVER['PHP_SELF']?>">
		<table border="0">
			<tr> 
				<td>Room Label</td>
				<td><input type="text" name="room_label" value="<?= $room_label;?>"></td>
			</tr>
            <tr> 
                <td>Room Location</td>
                <td><input type="text" name="room_location" value="<?= $room_location;?>"></td>
            </tr>
			<tr> 
				<td>Room Gender</td>
				<td><input type="text" name="room_gender" value="<?= $room_gender;?>"></td>
			</tr>
			<tr> 
				<td>Room Window</td>
				<td><input type="text" name="room_window" value="<?= $room_window;?>"></td>
			</tr>
			<tr> 
				<td>Room Monthly Price</td>
				<td><input type="text" name="room_monthly_price" value="<?= $room_monthly_price;?>"></td>
			</tr>
			<tr> 
				<td>Room Availability</td>
				<td><input type="text" name="room_availability" value="<?= $room_availability;?>"></td>
			</tr>
			<tr> 
				<td>Room Description</td>
				<td><input type="text" name="room_description" value="<?= $room_description;?>"></td>
			</tr>
			<tr> 
                <td><input type="hidden" name="room_id" value=<?= $_GET['room_id'];?>></td>
                <td><button type="submit" name="update">Update</button></td>
			</tr>
		</table>
	</form>
</body>
</html>