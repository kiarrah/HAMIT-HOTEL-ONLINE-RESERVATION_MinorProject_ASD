<?php

	session_start();

	if (isset($_SESSION['is_login'])) {
		header("Location: home.php"); 
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<?php
	
		if (isset($_POST['login'])) {

			try {

				$username = $_POST['username'];
				$password = $_POST['password'];

				if ($username == '') {
					throw new Exception('Empty username.');
				} else if ($password == '') {
					throw new Exception('Empty password.');
				}

				$mysqli = new mysqli('localhost', 'root', '', 'hotel');

				/* check connection */
				if ($mysqli->connect_errno) {
				    printf("Connect failed: %s\n", $mysqli->connect_error);
				    exit();
				}

				if ($result = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' ")) {

					$_SESSION['is_login'] = true;
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;

				}


			} catch (Exception $e) {
				echo $e->getMessage() . '</br>';
			}

		}
		
	?>

	<form method="POST" action="">
		<input type="text" name="username">
		<input type="password" name="password">
		<input type="submit" name="login" value="Login">
	</form>

</body>
</html>