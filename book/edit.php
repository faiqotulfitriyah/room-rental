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
        $book_id = $_POST['book_id'];
        $today_date = $_POST['today_date'];
        $room_id = $_POST['room_label'];
        $tenant_id = $_POST['tenant_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        
        $result = mysqli_query($conn, "UPDATE booking SET 
        book_id = '$book_id',
        today_date = '$today_date',
        room_id = '$room_id',
        tenant_id = '$tenant_id',
        book_start_date = '$start_date',
        book_end_date = '$end_date'
        WHERE book_id='$book_id'");
        // redirect to homepage
        header("Location: index.php");
}

// get room id 
$book_id = $_GET['book_id'];

// fetch previous data 
$result = mysqli_query($conn, "SELECT * FROM booking WHERE book_id='$book_id'");
    while($user_data = mysqli_fetch_array($result)) {
		$book_id = $user_data['book_id'];
        $today_date = $user_data['today_date'];
        $room_id = $user_data['room_id'];
        $tenant_id = $user_data['tenant_id'];
        $start_date = $user_data['book_start_date'];
        $end_date = $user_data['book_end_date'];
        $book_status = $user_data['book_status'];
    }

$result_room = mysqli_query($conn, "SELECT room_id, room_label FROM room");
$result_tenant = mysqli_query($conn, "SELECT tenant_id, tenant_name FROM tenant");
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
	<title>Edit Book Data</title>
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
	
	<p>Edit Book Data</p>
	<form method="post" action="<?= $_SERVER['PHP_SELF']?>">
		<table border="0">
			<tr> 
				<td>Today Date</td>
				<td><input type="date" name="today_date" value="<?= $today_date;?>">
                </td>
			</tr>
			<tr> 
				<td>Room Label</td>
				<td>
                    <select name="room_label">
                    <?php 
                    foreach ($result_room as $r) { ?>
                    <option value="<?= $r['room_id']; ?>" <?php if( $room_id == $r['room_id'] ) echo "selected"; ?>> <?= $r['room_label']; ?></option>
                    <?php } ?>
                </select>
                </td>
			</tr>
            <tr> 
				<td>Tenant Name</td>
				<td>
                    <select name="tenant_name">
                    <?php 
                    foreach ($result_tenant as $t) { ?>
                    <option value="<?= $t['tenant_id']; ?>" <?php if( $tenant_id == $t['tenant_id'] ) echo "selected"; ?>> <?= $t['tenant_name']; ?></option>
                    <?php } ?>
                </select>
                </td>
			</tr>
			<tr> 
				<td>Start Date</td>
				<td><input type="date" name="start_date" value="<?= $start_date;?>"></td>
			</tr>
			<tr> 
				<td>End Date</td>
				<td><input type="date" name="end_date" value="<?= $end_date;?>"></td>
			</tr>
			<tr> 
				<td><input type="hidden" name="book_id" value="<?= $book_id;?>"></td>
                <td><button type="submit" name="update">Update</button></td>
            </tr>
		</table>
	</form>
    <p>Go back to <a href="index.php">Book</a></p>
</body>
</html>