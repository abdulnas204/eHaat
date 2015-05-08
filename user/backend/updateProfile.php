<?php
session_start();
require_once('precheck.php');
require_once('../../common/dbConnect.php');

$userId = $_SESSION["id"];
$username = $_POST["username"];
$contact = $_POST["contact"];

$query = "UPDATE t_user SET username='$username', contact='$contact' WHERE id=$userId;";
if($result = $link->query($query)) {
	echo "Update successfull";
	header("Refresh:3; ../index.php");
} else {
	echo "Update unsuccessfull";
	header("Refresh:3; ../index.php");
}
die();
?>