<?php 
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eHaat - New Item</title>
</head>
<body>
	<form action="newItem.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" name="name" placeholder="Product's name">
		<br>

		<label for="rate">Price:</label>
		<input type="number" name="rate" placeholder="Price">
		<span> per </span>
		<input type="number" name="per" placeholder="Quantity">
		<select name="unit">
			<option value="pcs">piece</option>
			<option value="kg">Kg</option>
			<option value="ltr">litre</option>
			<option value="dozen">dozen</option>
		</select>
		<br>

		<label for="quantity">Number of items:</label>
		<input type="number" name="quantity" placeholder="Number of items"><span>unit should be same as above</span>
		<br>

		<input type="submit" name="newItem" value="Add">
		<input type="reset" value="Reset">
	</form>
</body>
</html>