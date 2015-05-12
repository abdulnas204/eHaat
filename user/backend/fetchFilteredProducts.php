<?php
require_once($serverRoot."/common/dbConnect.php");

if(	isset($_GET["search"])
		&& isset($_GET["searchText"])
	) {

	$vegetables = array();
	$fruits = array();
	$others = array();
	
	$searchText = $_GET["searchText"];
	if($searchText != "") {

		$queryString = getSearchString($searchText);

		$query = "SELECT * FROM t_product WHERE name LIKE '$queryString';";
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
			$error = "Could not fetch product's list";
		}

	} else {
		$error = "No search string provided";
	}

} else {
	$error = "Insufficient Data provided";
}
?>