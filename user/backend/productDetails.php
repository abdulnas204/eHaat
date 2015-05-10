<?php
require_once('precheck.php');
require_once($serverRoot.'/common/dbConnect.php');

if(isset($_GET["update"]) && $_GET["update"] == true && isset($_GET["id"])) {
	$productId = $_GET["id"];

	$query = "SELECT * FROM t_product WHERE id = $productId";
	$result = $link->query($query);
	if($result) {
		$record = $result->fetch_assoc();
		
		$record["name"] = explode("$", $record["name"]);

		$name = $record["name"][0];
		$category = $record["name"][1];
		$rate = $record["price"];
		$per = $record["per"];
		$unit = $record["unitOfQuantity"];
		$quantity = $record["quantityAdded"] - $record["quantitySold"];
		$photo = $record["photo"];

	} else {
		header("Refresh:5; $serverRoot/user/index.php");
		die("Could not fetch information about the item");
	}
} else {
	header("Location: $serverRoot/user/index.php");
}
?>