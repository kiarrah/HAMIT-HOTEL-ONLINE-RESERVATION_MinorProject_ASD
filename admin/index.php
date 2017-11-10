<?php
	
	session_start();

	if (!isset($_SESSION['account']) && $_SESSION['account']['level'] != 'ADMIN') {
		header("Location: index.php");
	}

?>
<!DOCTYPE html>
<html>
<head>

	<title>Admin</title>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">

</head>
<body>
	
	<div class="panel-left">

		<div class="nav-header"></div>

		<ul class="nav">
			<li><a href="#">Home</a></li>
			<li><a href="/hamit/admin/create-room.php">Create Room</a></li>
			<li><a href="/hamit/logout.php">Logout</a></li>
		</ul>

	</div>

	<div class="panel-right">

		<div class="container">
			<h1>HOME</h1>
		</div>

	</div>
	
	<script type="text/javascript" src="../js/jquery.js" />
	<script type="text/javascript" src="../js/popper.js" />
	<script type="text/javascript" src="../js/bootstrap.js" />

</body>
</html>