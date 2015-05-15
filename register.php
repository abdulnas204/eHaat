<?php
session_start();
//backend page for registering new user
require_once('./common/util.php');
require_once('./common/dbConnect.php');

if(isset($error)) {
	redirectWithError("connection", "Server connection problem", "index.php");
} else if(
	isset($_POST["register"])
	&& isset($_POST["name"])
	&& isset($_POST["email"])
	&& isset($_POST["password"])
	&& isset($_POST["confirmPassword"])
	&& isset($_POST["contact"])
	) {

	$username = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirmPassoword = $_POST["confirmPassword"];
	$contact = $_POST["contact"];

	if($password == $confirmPassoword) {

		$password = getPasswordHash($password);

		$query = getInsertQuery("t_user", 
												array("username", "emailID", "password", "contact", "activeKey"),
												array($username, $email, $password, $contact, 1),
												array("s", "s", "s", "s", "n")
												);

		if($link->query($query)) {
			$_SESSION["id"] = $link->insert_id;
			$_SESSION["user"] = $username;
			$_SESSION["loggedIn"] = true;
			
			redirectWithMessage("register", "Welcome to eHaat system", "user/index.php");
		} else {
			
			redirectWithError("register", $link->error, "index.php");
		}
	}
} else {
	redirectWithError("register", "Insufficient data supplied", "index.php");
}
?>