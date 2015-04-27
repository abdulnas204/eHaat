<?php
session_start();
require_once('common/util.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eHaat - Home page</title>
</head>
<body>
	<h1>This will be eHaat landing page</h1>

	<form action="login.php" method="POST">
		<label for="email">Email ID:</label>
		<input type="email" name="email" placeholder="eg. abc@name.com">

		<label for="password">Password:</label>
		<input type="password" name="password" placeholder="password">

		<input type="submit" name="login" value="Login">
		<input type="reset" value="Reset">
	</form>

	<form action="register.php" method="POST">
		<label for="name">Username:</label>
		<input type="text" name="name" placeholder="mycoolusername">

		<label for="email">Email ID:</label>
		<input type="email" name="email" placeholder="eg. abc@name.com">

		<label for="contactNumber">Mobile Number</label>
		<input type="number" min="0" placeholder="eg. 9876543210">

		<label for="password">Password:</label>
		<input type="password" name="password" placeholder="password">

		<label for="password">Confirm password:</label>
		<input type="password" name="confirmPassword" placeholder="repeat">

		<input type="submit" name="register" value="Register">
		<input type="reset" value="Reset">
	</form>
</body>
</html>