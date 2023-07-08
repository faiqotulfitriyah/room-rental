<?php
require_once("config.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
		body {
			background-image: linear-gradient(to bottom, #61a5c2, #559bb9, #4891b1, #3b87a8, #2c7da0);
			margin: 0px;
			font-family: 'Poppins', sans-serif;
		}

		.container {
			width: 450px;
			height: 400px;
			background-color: white;
			border-radius: 10px;
			display: flex;
			margin: 135px auto;
		}

		.wrap {
			margin: 20px auto;
			text-align: center;
		}

		button.submit {
  			background-color: #FFC43A; 
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
			<p class="title">Admin Login</p>
    		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        		<p><input type="text" name="username" placeholder="Username"/></p>
        		<p><input type="password" name="password" placeholder="Password"/></p>
    				<?php 
					if(isset($_POST['submit'])){
						$username = trim($_POST['username']);
						$password = trim($_POST['password']);
						$sql = "select * from login where username = '".$username."'";
						$rs = mysqli_query($conn,$sql);
						$numRows = mysqli_num_rows($rs);
							if($numRows  == 1){
								$row = mysqli_fetch_assoc($rs);
									if(password_verify($password,$row['password'])) {
										$_SESSION['username'] = $row['username'];
            							header("Location: index.php");
									}
									else echo "Wrong Password";
							}
							else echo "No User Found";
					} ?>
    			<br><button type="submit" name="submit" class="submit">SUBMIT</button>
				<p class="text"><a href="register.php">Click here</a> to create new account.</p>
			</form>
		</div>
    </div>
</body>
</html>
