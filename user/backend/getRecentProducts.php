<?php

require_once($serverRoot."/common/dbConnect.php");

$query = "SELECT * FROM t_product ORDER BY createdAt DESC;";

$vegetables = array();
$fruits = array();
$others = array();

$result = $link->query($query);

if($result) {
	while($record = $result->fetch_assoc()) {
		$record["name"] = explode("$", $record["name"]);
		
		$record["category"] = $record["name"][1];
		$record["name"] = $record["name"][0];

		if($record["category"] == "vegetable") {
			array_push($vegetables, $record);

		} else if($record["category"] == "fruit") {
			array_push($fruits, $record);

		} else if($record["category"] == "other") {
			array_push($others, $record);
		}
	}
} else {
	$error = "Could not fetch recent products";
}

?>