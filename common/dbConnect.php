<?php
$host = "localhost";
$port = 3306;
$user = "root";
$database = "eHaat";
$password = " ";

$link = new mysqli($host.":".$port, $user, $password, $database);
if($link->connect_error) {
	$error = $link->connect_error;
}
?>