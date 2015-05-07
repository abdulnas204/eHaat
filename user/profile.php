<?php
require_once('./backend/precheck.php');
require_once('../common/util.php');
require_once('backend/fetchUserInfo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eHaat - User's order</title>
</head>
<body>
	<h1>This will be user's profile page</h1>
	<form action="./backend/updateProfile.php">
		<label for="username">Username</label>
		<input name="username" type="text" value="<?=$username?>">
		<label for="email">Email ID</label>
		<input name="email" type="text" value="<?=$emailId?>">
		<label for="contact">Contact Number</label>
		<input name="contact" type="text" value="<?=$contact?>">
		<input type="submit" name="update" value="Update">
	</form>
</body>
</html>