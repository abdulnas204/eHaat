<?php
$serverRoot = $_SERVER["DOCUMENT_ROOT"]."/eHaat";

function getPasswordSalt() {
	$salt = "eHaat";
	return $salt;
}

function redirectWithError($var, $msg, $to) {
	if(isset($link)) {
		$link->close();
	}

	$_SESSION["error"] = array(
		$var => $msg
	);
	header("LOCATION: $to");
	die();
}

function redirectWithMessage($var, $msg, $to) {
	if(isset($link)) {
		$link->close();
	}
	
	$_SESSION["message"] = array(
		$var => $msg
	);
	header("LOCATION: $to");
	die();
}

function getInsertQuery($table, $cols, $vals, $types) {

	$columns = "";
	$i = 0;
	foreach($cols as $col) {
		if($i != 0) {
			$columns = $columns . ",";
		}
		$columns = $columns . $col;
		$i++;
	}
	$values = "";
	$i = 0;
	foreach($vals as $val) {
		if($i != 0) {
			$values = $values . ",";
		}
		if($types[$i] == "s") {
			$values = $values . "'".$val."'";
		} else {
			$values = $values . "$val";
		}
		$i++;
	}
	$query = "INSERT INTO $table ($columns) VALUES ($values);";
	return $query;
}

function getPasswordHash($password) {
	$iteration = 100;
	$salt = getPasswordSalt();
	$hash = hash_pbkdf2('md5', $password, $salt, $iteration, 32);

	return $hash;
}
?>