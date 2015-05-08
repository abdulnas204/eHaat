<?php
if(	! isset($_SESSION["id"])
		|| ! isset($_SESSION["user"])
		|| ! isset($_SESSION["loggedIn"])
		|| (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] != true)
	) {
	unset($_SESSION["id"]);
	unset($_SESSION["user"]);
	unset($_SESSION["loggedIn"]);
	header("Location: ".$serverRoot."/index.php");
	die();
}
?>