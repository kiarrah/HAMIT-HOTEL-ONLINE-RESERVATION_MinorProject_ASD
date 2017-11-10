<?php
	
	require_once('../util/connection.php');

	session_start();

	if (!isset($_SESSION['account']) && $_SESSION['account']['level'] != 'ADMIN') {
		header("Location: index.php");
	}

	require_once('../util/function_create_room.php');

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
			<li><a href="/hamit/admin">Home</a></li>
			<li><a href="#">Create Room</a></li>
			<li><a href="/hamit/logout.php">Logout</a></li>
		</ul>

	</div>

	<div class="panel-right">

		<div class="container">

			<?php if (isset($alertType)) { ?>

				<div class="alert alert-<?php echo $alertType; ?>" role="alert">
				  <?php echo $alertMsg; ?>
				</div>

			<?php } ?>
			
						
			<form method="POST" action="" enctype="multipart/form-data">

			  <div class="form-group">
			    <label for="room-type-new">New Room Type</label>
			    <input type="text" class="form-control" id="room-type-new" name="room-type-new" aria-describedby="room-type-new" placeholder="Enter room type">
			    <small id="room-type-new" class="form-text text-muted">Atchup nga room type.</small>	
			  </div>

			  <div class="form-group">
			    <label for="room-ammenities">New Room Type Ammenities</label>
			    <textarea name="room-ammenities" class="form-control" id="room-ammenities" rows="3"></textarea>
			  </div>

			  <div class="form-group">
			    <label for="room-type-existing">Existing Room Type</label>
			    <select name="room-type-existing" class="form-control" id="room-type-existing">

			    	<option value="0">Not existing.</option>

			    	<?php

			    		$db = DB::getInstance()->getConnection();
			    		$query = "SELECT * FROM room_type";

			    		if ($result = $db->query($query)) {
			    			while ($room = $result->fetch_assoc()) {
			    				echo '<option value="'.$room['id'].'">'.$room['name'].'</option>';
			    			}
			    		}

			    	?>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="room-number">Room #</label>
			    <input type="number" class="form-control" id="room-number" name="room-number" aria-describedby="emailHelp" placeholder="Enter room number" required="">
			  </div>

			  <div class="form-group">
			    <label for="room-rate">Room Rate</label>
			    <input type="number" class="form-control" id="room-rate" name="room-rate" aria-describedby="emailHelp" placeholder="Enter room rate" required="">
			  </div>

			  <div class="form-group">
			    <label for="room-images">Example file input</label>
			    <input type="file" name="upload[]" class="form-control-file" id="room-images" multiple="multiple">

			  </div>

			  <button name="create-room" type="submit" class="btn btn-primary">Submit</button>

			</form>


		</div>

	</div>
	
	<script type="text/javascript" src="../js/jquery.js" />
	<script type="text/javascript" src="../js/popper.js" />
	<script type="text/javascript" src="../js/bootstrap.js" />

</body>
</html>