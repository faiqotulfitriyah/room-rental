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
        $fine_id = $_POST['fine_id'];
        $property = $_POST['property'];
        $price = $_POST['price'];
        
        $result = mysqli_query($conn, "UPDATE fine SET 
        book_id = '$book_id',
        property = '$property',
        price = '$price'
        WHERE fine_id='$fine_id'");
        // redirect to homepage
        header("Location: index.php");
}

// get room id 
$fine_id = $_GET['fine_id'];

// fetch previous data 
$result = mysqli_query($conn, "SELECT * FROM fine WHERE fine_id='$fine_id'");
    while($user_data = mysqli_fetch_array($result)) {
		$book_id = $user_data['book_id'];
		$property = $user_data['property'];
		$price = $user_data['price'];
    }

$result_property = mysqli_query($conn, "SELECT property_name FROM property");
$result_booking = mysqli_query($conn, "SELECT book_id FROM booking");
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
	<title>Edit Fine Data</title>
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
	
	<p>Edit fine data</p>
	<form method="post" action="<?= $_SERVER['PHP_SELF']?>">
		<table border="0">
			<tr> 
				<td>Book ID</td>
				<!-- <td><input type="text" name="book_id" value="<?= $book_id;?>"></td> -->
                <td>
                <select name="book_id">
                    <?php 
                    foreach ($result_booking as $b) { ?>
                    <option value="<?= $b['book_id']; ?>" <?php if( $book_id == $b['book_id'] ) echo "selected"; ?>> <?= $b['book_id']; ?></option>
                    <?php } ?>
                </select>
                </td>
			</tr>
            <tr> 
                <td>Property</td>
                <td>
                <select name="property">
                    <?php 
                    foreach ($result_property as $p) { ?>
                    <option value="<?= $p['property_name']; ?>" <?php if( $property == $p['property_name'] ) echo "selected"; ?>> <?= $p['property_name']; ?></option>
                    <?php } ?>
                </select>
                </td>
            </tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="price" value="<?= $price;?>"></td>
			</tr>
			<tr> 
                <td><input type="hidden" name="fine_id" value="<?= $fine_id;?>"></td>
                <td><button type="submit" name="update">Update</button></td>
			</tr>
		</table>
	</form>
    <p>Go back to <a href="index.php">Fine</a></p>
</body>
</html>