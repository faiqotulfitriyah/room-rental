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
	$book_id = $_POST['book_id'];
    $property = $_POST['property'];
    $price = $_POST['price'];
    $result = mysqli_query($conn, "INSERT INTO fine VALUES('$book_id', ' ', '$property', '$price')");
        if(!$result) echo("Error:" . mysqli_error($conn));
		    else echo 'New fine added. <a href="index.php"> View Fines </a>';
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
	<title>Add New Fine</title>
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
	<p>List of properties with price: </p>
    <ul>
        <li>Broken bed – Rp. 1,500,000</li>
        <li>Broken mattress – Rp 500,000</li>
        <li>Broken pillow – Rp 100,000</li>
        <li>Light bulb – Rp 30,000 </li>
        <li>Desk/chair/cabinet – Rp 150,000</li>
        <li>Air conditioner – Rp 1,500,000</li>
        <li>Trash can – Rp 25,000</li>
        <li>Window – Rp 1,000,000</li>

    </ul>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<p class="title">Add new fine</p>	
    <table border="0">
			<tr> 
				<td>Book ID</td>
				<td>
                    <select name="book_id">
                    <?php 
                    $result_book = mysqli_query($conn, "SELECT book_id FROM booking");
                    foreach ($result_book as $book) { ?>
                    <option value="<?= $book['book_id']; ?>"><?= $book['book_id']; ?></option>
                    <?php } ?>
                    </select>
                </td>
			</tr>
			<tr> 
				<td>Property</td>
				<td>
                    <select name="property">
                    <?php 
                    $result_property = mysqli_query($conn, "SELECT property_name FROM property");
                    foreach ($result_property as $property) { ?>
                    <option value="<?= $property['property_name']; ?>"><?= $property['property_name']; ?></option>
                    <?php } ?>
                    </select>
                </td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="price"></td>
			</tr>
            <tr> 
				<td></td>
				<td><button type="submit" name="submit">Add fine</button></td>
			</tr>
		</table>
        <p>Go back to <a href="index.php">Fine</a></p>
	</form>
</body>
</html>