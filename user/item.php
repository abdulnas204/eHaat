<?php 
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
require_once('./backend/productDetails.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eHaat - New Item</title>
</head>
<body>
	<form action="./backend/newItem.php" method="POST" enctype="multipart/form-data">
		<label for="name">Name:</label>
		<input type="text" name="name" placeholder="Product's name" value="<?=$name?>">
		<br>
		
		<label for="category">Category:</label>
		<select name="category">
			<option <?php echo ($category=="vegetable")?"selected":"";?> value="vegetable">Vegetable</option>
			<option <?php echo ($category=="fruit")?"selected":"";?> value="fruit">Fruit</option>
			<option <?php echo ($category=="other")?"selected":"";?> value="other">Other</option>
		</select>
		<br>

		<label for="rate">Price:</label>
		<input type="number" name="rate" placeholder="Price" value="<?=$rate?>">
		<span> per </span>
		<input type="number" name="per" placeholder="Quantity" value="<?=$per?>">
		<select name="unit">
			<option <?php echo ($unit=="pcs")?"selected":"";?> value="pcs">piece</option>
			<option <?php echo ($unit=="kg")?"selected":"";?> value="kg">Kg</option>
			<option <?php echo ($unit=="ltr")?"selected":"";?> value="ltr">litre</option>
			<option <?php echo ($unit=="dozen")?"selected":"";?> value="dozen">dozen</option>
		</select>
		<br>

		<label for="addQuantity">Add:</label>
		<input type="number" name="addQuantity" placeholder="Number of items"><span>unit should be same as above</span>
		<br>

		<label for="LessQuantity">Decrease:</label>
		<input type="number" name="LessQuantity" placeholder="Number of items" max="<?=$quantity?>"><span>unit should be same as above</span>
		<br>

		<label>Item pic: </label>
		<img src="../resource/image/<?=$photo?>" alt="Item image">
		
		<input type="submit" name="updateItem" value="Update">
		<a href="./index.php">Cancel</a>
	</form>
</body>
</html>