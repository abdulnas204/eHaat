<?php
session_start();
require_once('../../common/util.php');
require_once('../../common/dbConnect.php');
require_once('./precheck.php');

if(
	isset($_POST["updateItem"])
	&& isset($_POST["id"])
	&& isset($_POST["name"])
	&& isset($_POST["category"])
	&& isset($_POST["rate"])
	&& isset($_POST["per"])
	&& isset($_POST["unit"])
	&& isset($_POST["addQuantity"])
	&& isset($_POST["lessQuantity"])
	) {
	$userId = $_SESSION["id"];

	$id = $_POST["id"];
	$shortName = $_POST["name"];
	$category = $_POST["category"];
	$rate = $_POST["rate"];
	$per = $_POST["per"];
	$unit = $_POST["unit"];
	$addQuantity = $_POST["addQuantity"];
	$lessQuantity = $_POST["lessQuantity"];

	$name = $shortName."$".$category;
	$quantity = $addQuantity - $lessQuantity;
	if($quantity == 0) {
		$quantity = "";
	}
	if (is_writable($imageDir)) {
		$infoQuery = "SELECT * FROM t_product WHERE id=$id";
		$result = $link->query($infoQuery);
		if($result) {
			$record = $result->fetch_assoc();
			
			$originalPath = join(DIRECTORY_SEPARATOR, array($serverRoot,"resource","image",$record["photo"]));
			$imageFileType = pathinfo($originalPath, PATHINFO_EXTENSION);
			$imageName = $userId."-".$shortName.".".$imageFileType;

			$finalPath = join(DIRECTORY_SEPARATOR, array($serverRoot,"resource","image","$imageName"));
			// echo $originalPath."<br>".$finalPath;
			if(rename($originalPath, $finalPath)) {
				$query = getUpdateQuery('t_product',
																array('name', 'price', 'per', 'unitOfQuantity', 'quantityAdded', 'photo'),
																array($name, $rate, $per, $unit, "quantityAdded".$quantity, "$imageName"),
																array("s", "n", "n", "s", "n", "s"),
																"id = $id"
																);
				if($result = $link->query($query)) {
					echo "Update successfull";
				} else {
					echo "Update unsuccessfull";
					rename($finalPath, $originalPath);
				}
			} else {
				echo "Could not move file";
			}
		}
	} else {
		echo "Server error: Permission denied";
	}
} else {
	echo "Insufficient data supplied";
}
header("Refresh:3; ../index.php");
?>