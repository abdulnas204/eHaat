<?php
session_start();
require_once('../../common/util.php');
require_once('precheck.php');
require_once($serverRoot.'/common/dbConnect.php');

if(
		isset($_POST["newItem"])
		&& isset($_POST["name"])
		&& isset($_POST["category"])
		&& isset($_POST["rate"])
		&& isset($_POST["per"])
		&& isset($_POST["unit"])
		&& isset($_POST["quantity"])
		&& isset($_FILES["photo"])
	) {

	$userId = $_SESSION["id"];
	$username = $_SESSION["user"];

	$name = $_POST["name"];
	$category = $_POST["category"];
	$rate = $_POST["rate"];
	$per = $_POST["per"];
	$unit = $_POST["unit"];
	$quantity = $_POST["quantity"];

	$imageFileType = pathinfo(basename($_FILES["photo"]["name"]),PATHINFO_EXTENSION);

	$fileName = $userId.'-'.$name.'.'.$imageFileType;
	$targetFile = join(DIRECTORY_SEPARATOR, array($imageDir, $fileName));



	$saneData = true;
	
	$check = getimagesize($_FILES["photo"]["tmp_name"]);
  if($check === false) {
		$saneData = false;
		echo "Only images are to be uploaded";
  }
  if($saneData) {
  	$checkQuery = "SELECT id FROM t_product WHERE ownerId = $userId AND name = '$name'";
		$result = $link->query($checkQuery);
	
		if($result->num_rows > 0) {
			echo "Item with this name is already added";
		} else {
	  	if (is_writable($imageDir)) {
	  		if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {

	  			$query = getInsertQuery('t_product',
	  													['ownerId', 'name', 'price', 'per', 'quantityAdded', 'quantitySold', 'unitOfQuantity', 'photo'],
	  													[$userId, $name, $rate, $per, $quantity, 0, $unit, $fileName],
	  													["n", "s", "n", "n", "n", "n", "s", "s"]);
					$result = $link->query($query);
					if($result) {
						echo "Item added successfully";
					} else {
						echo "Something went wrong in saving item's data";
						unlink($targetFile);
					}
				}
				else {
					echo "Something went wrong in uploading image";
				}
	  	} else {
	  		echo "Permission denied";
	  	}
		}
  } else {
  	echo "File uploaded is not an image";
  }
} else {
	echo "Insufficient data provided";
}
header("Refresh:3; ../index.php");
?>