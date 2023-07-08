<?php
// check session
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
// connect to database
include_once("../config.php");

// fetch data
$result_tenant = mysqli_query($conn, "SELECT tenant_name, tenant_id FROM tenant ORDER BY tenant_name" );
$result_room = mysqli_query($conn, "SELECT * FROM room ORDER BY room_label" );

// insert data 
if( isset( $_POST['book'] )) {
        $today_date = $_POST['today_date'];
        $roomid = $_POST['room_label'];
        $tenantid = $_POST['tenant_name'];
        $start_date = $_POST['start_date'];
        $date = date_create("$start_date");
        $end_date = $_POST['end_date'];
        $date2 = date_create("$end_date");
        $interval = $date->diff($date2);
        $month = $interval->m;
        $price = 1000000 * (int)$month;

        // check availibility of the selected room
        $checkresult = mysqli_query($conn, "SELECT * from booking WHERE
                        (book_start_date BETWEEN '$start_date'AND '$end_date' AND room_id = '$roomid') OR 
                        (book_end_date BETWEEN '$start_date' AND '$end_date' AND room_id = '$roomid') OR 
                        (book_start_date <= '$start_date' AND book_end_date >= '$end_date' AND room_id = '$roomid')");
        
        // if the room is not available
        if(mysqli_num_rows($checkresult) >= 1) {
            $message = "This room is not available at selected date. Please choose other date or other room. ";
            echo $message;
        } 

        // if the room available, proceed the book and set the booking status to unpaid
        else {
            $result = mysqli_query($conn, "INSERT INTO booking VALUES('', '$today_date', '$roomid', '$tenantid', '$start_date', '$end_date', 'Unpaid')");
            
            // update room availibility to occupied
            $update = mysqli_query($conn, "UPDATE room SET room_availability = 'Occupied' WHERE room_id = '$roomid'");
                if(!$result) echo("Error:" . mysqli_error($conn));
		            else echo 'New book added. <a href="index.php"> View Books </a>';
        }
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
	<title>Add New Book</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            margin: 30px 50px;
        }

        a {
            color: black;
        }

        p.title {
            font-size: 22px;
        }

        p {
            font-size: 18px;
        }

        input, select {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
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

        button.book {
            background-color: lightgreen;
        }
    </style>
</head>
 
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<p class="title">Add new book</p>	
            <table border="0">
            <tr> 
				<td>Today Date</td>
				<td><input type="date" name="today_date" required>
                </td>
			</tr>
			<tr> 
				<td>Room Label</td>
				<td>
                    <select name="room_label">
                    <?php 
                    $i = 0;
                    while($row = mysqli_fetch_array($result_room)) {
                    ?>
                    <option value="<?=$row['room_id'];?>">
                    <?= $row['room_label']; ?></option>
                    <?php 
                    $i++;
                    } 
                    ?>
                    </select>
                </td>
			</tr>
            <tr> 
				<td>Tenant Name</td>
				<td>
                    <select name="tenant_name">
                    <?php 
                    include_once("../config.php");
                    $result_tenant = mysqli_query($conn, "SELECT tenant_name, tenant_id FROM tenant ORDER BY tenant_name" );
                    $i = 0;
                    while($row = mysqli_fetch_array($result_tenant)) {
                    ?>
                    <option value="<?=$row['tenant_id'];?>">
                    <?= $row['tenant_name']; ?></option>
                    <?php 
                    $i++;
                        }
                        ?>
                    </select>
                </td>
			</tr>
			<tr> 
				<td>Start Date</td>
				<td><input type="date" name="start_date" required></td>
			</tr>
			<tr> 
				<td>End Date</td>
				<td><input type="date" name="end_date" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><button type="submit" name="book">Proceed book</button></td>
            </tr>
		</table>
    </form>
		</table>
</form>
</body>
</html>