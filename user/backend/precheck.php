<?php
session_start();
if(	! isset($_SESSION["id"])
		|| ! isset($_SESSION["user"])
		|| ! isset($_SESSION["loggedIn"])
		|| (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] != true)
	) {
	session_destroy();
	header("Location: ../index.php");
	die();
}
?>