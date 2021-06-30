<?php 

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$uname1 = $_POST['uname1'];
		$upswd1 = $_POST['upswd1'];

		if(!empty($uname1) && !empty($upswd1) && !is_numeric($uname1))
		{

			//read from database
			$query = "select * from users where uname1 = '$uname1' limit 1";

					
					{
						header("Location: home.html");
					}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
	<div id="box">
		<h1>Login Here</h1>
		<form method="post">
            <label for="uname1">USER NAME</label>
			<input id="text" type="text" name="uname1"><br><br>
			<label for="uname1">PASSWORD</label>
			<input id="text" type="password" name="upswd1"><br><br>

			<input id="button" type="submit" value="Login" ><br><br>

			<a href="register.html">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>