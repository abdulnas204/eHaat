<?php 
session_start();
// Backend code for logging the user in
require_once('common/util.php');
require_once('common/dbConnect.php');

if(isset($_POST["login"])
	&& isset($_POST["email"])
	&& isset($_POST["password"])
	) {

	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$password = getPasswordHash($password);

	$query = "SELECT id, username from t_user WHERE emailID = '$email' AND password = '$password' AND activeKey=1;";
	
	$result = $link->query($query);

	if($result->num_rows > 1) {
		redirectWithError("login", "Oops! Server problem", "index.php");

	} else if($result->num_rows == 1) {
		$record = $result->fetch_assoc();

		$_SESSION["id"] = $record["id"];
		$_SESSION["user"] = $record["username"];
		$_SESSION["loggedIn"] = true;
		
		redirectWithMessage("login", "Welcome back", "user/index.php");
	} else {
		redirectWithMessage("login", "No user found with such credentials", "index.php");
	}
} else {	
	redirectWithError("login", "Insufficient data supplied", "index.php");
}
?>