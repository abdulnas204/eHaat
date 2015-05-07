<?php
require_once($serverRoot.'/common/dbConnect.php');
if(! isset($error)) {
	$userId = $_SESSION["id"];
	$query = "SELECT * FROM t_user WHERE id = $userId";
	$result = $link->query($query);
	if($result) {
		$record = $result->fetch_assoc();
		$username = $record["username"];
		$emailId = $record["emailID"];
		$contact = $record["contact"];
	} else {
		$error = "Could not fetch information";
	}
}


?>