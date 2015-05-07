<?php
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
require_once('backend/fetchUserInfo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eHaat - User's order</title>
</head>
<body>
	<h1>My profile</h1>
	<form action="./backend/updateProfile.php" method="POST">
		<label for="username">Username</label>
		<input name="username" type="text" value="<?=$username?>"><br>
		<label for="email">Email ID</label>
		<input name="email" type="text" value="<?=$emailId?>"><br>
		<label for="contact">Contact Number</label>
		<input name="contact" type="number" value="<?=$contact?>"><br>
		<input type="submit" name="update" value="Update">
	</form>
</body>
</html>