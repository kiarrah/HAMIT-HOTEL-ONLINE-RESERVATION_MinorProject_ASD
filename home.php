<?php

	session_start();

	if (!isset($_SESSION['is_login'])) {
		header("Location: /"); 
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1>Welcome</h1>
	<a href="logout.php">Logout</a>
</body>
</html>