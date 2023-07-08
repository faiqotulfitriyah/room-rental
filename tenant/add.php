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
    $tenant_id = $_POST['tenant_id'];
    $tenant_name = $_POST['tenant_name'];
    $tenant_address = $_POST['tenant_address'];
    $tenant_ktp_no = $_POST['tenant_ktp_no'];
    $tenant_phone = $_POST['tenant_phone'];
    $tenant_email = $_POST['tenant_email'];
    $tenant_emergcp = $_POST['tenant_emergcp'];
    $tenant_emergcp_phone = $_POST['tenant_emergcp_phone'];
    $tenant_emergcp_email = $_POST['tenant_emergcp_email'];
    $tenant_bankaccount = $_POST['tenant_bankaccount'];
     $tenant_bankaccount_no = $_POST['tenant_bankaccount_no'];
				
		// insert query
		$result = mysqli_query($conn, "INSERT INTO tenant VALUES('$tenant_id','$tenant_name', '$tenant_address', '$tenant_ktp_no' , '$tenant_phone','$tenant_email','$tenant_emergcp', '$tenant_emergcp_phone','$tenant_emergcp_email','$tenant_bankaccount', '$tenant_bankaccount_no')");

				if(!$result) echo("Error:" . mysqli_error($conn));
					else echo 'New tenant added. <a href="index.php"> View Tenants </a>';
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
	<title>Add New Tenant</title>
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
	
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="form1">
	<p class="title">Add new tenant</p>	
    <table border="0">
			<tr> 
				<td>Tenant ID</td>
				<td><input type="text" name="tenant_id" required></td>
			</tr>
			<tr> 
				<td>Tenant Name</td>
				<td><input type="text" name="tenant_name" required></td>
			</tr>
			<tr> 
				<td>Tenant Address</td>
				<td><input type="text" name="tenant_address" required></td>
			</tr>
			<tr> 
				<td>Tenant KTP No</td>
				<td><input type="text" name="tenant_ktp_no"></td>
			</tr>
			<tr> 
				<td>Tenant Phone</td>
				<td><input type="text" name="tenant_phone"></td>
			</tr>
			<tr> 
				<td>Tenant Email</td>
				<td><input type="text" name="tenant_email"></td>
			</tr>
			<tr> 
				<td>Tenant Emergency</td>
				<td><input type="text" name="tenant_emergcp"></td>
			</tr>
			<tr> 
				<td>Tenant Emergency Phone</td>
				<td><input type="text" name="tenant_emergcp_phone"></td>
			</tr>
			<tr> 
				<td>Tenant Emergency Email</td>
				<td><input type="text" name="tenant_emergcp_email"></td>
			</tr>
			<tr> 
				<td>Tenant Bank Account</td>
				<td><input type="text" name="tenant_bankaccount"></td>
			</tr>
			<tr> 
				<td>Tenant Bank Account No</td>
				<td><input type="text" name="tenant_bankaccount_no"></td>
			</tr>
			<tr> 
				<td></td>
				<td><button type="submit" name="submit">Add</button></td>
			</tr>
		</table>
        <p>Go back to <a href="index.php">Tenant</a></p>
	</form>
</body>
</html>