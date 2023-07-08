<?php 
require_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
		body {
			background-image: linear-gradient(to bottom, #ffd166, #ffc853, #ffbe3f, #ffb428, #ffaa00);
			margin: 0px;
			font-family: 'Poppins', sans-serif;
		}

		.container {
			width: 450px;
			height: 400px;
			background-color: #fff;
			border-radius: 10px;
			display: flex;
			margin: 135px auto;
		}

		.wrap {
			margin: 20px auto;
			text-align: center;
		}

		button.submit {
  			background-color: #669bbc; 
  			border: none;
  			color: white;
  			padding: 12px 60px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 15px;
			border-radius: 30px;
			font-family: 'Poppins', sans-serif;
			margin-top: 5px;
		}

		a {
			color: black;
		}

		p.title {
			font-size: 20px;
			font-weight: bold;
			margin-bottom: 30px;
		}

		input {
  			width: 100%;
  			padding: 12px 20px;
  			margin: 8px 0 0 0;
  			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
			font-size: 14px;
		}

		p.text {
			font-size: 16px;
			margin-top: 30px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="wrap">
			<p class="title">Register Account</p>
    		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        		<p><input type="text" name="username" placeholder="Username"/></p>
        		<p><input type="password" name="password" placeholder="Password"/></p>
    			<?php 
					if(isset($_POST['submit'])){
						$username 	= $_POST['username'];
						$password = $_POST['password'];
						$options = array("cost"=>4);
						$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
						$sql = "INSERT INTO login (username, password) VALUES('".$username."','".$hashPassword."')";
						$result = mysqli_query($conn, $sql);
							if($result) echo "Registration success";
					}
				?>
    			<br><button type="submit" name="submit" class="submit">SUBMIT</button>
				<p class="text"><a href="login.php">Click here</a> to login.</p>
			</form>
		</div>
    </div>
</body>
</html>