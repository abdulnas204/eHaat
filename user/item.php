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
	<link rel="stylesheet" href="../resource/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="../resource/css/bootstrap-theme.min.css">
	  <link rel="stylesheet" type="text/css" href="../resource/css/index.css">
	  <script src="../resource/js/jquery.min.js"></script>
	  <script type="text/javascript" src="../resource/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div id="header" class="container page-header text-center">
			<div class="col-md-8">
				<h1>Edit Item</h1>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-2">
				<a href="logout.php"><div class="btn btn-warning pull-right btn-md offset-20">Logout</div></a>
			</div>
		</div>
	
	<form method="POST" action="./backend/updateItem.php">
		<div class="form-group">
			<input type="hidden" value="<?=$_GET['id']?>" name="id">
			<label for="name" class="col-md-offset-1 col-sm-3 control-label offset-29">Name:</label>
			<div class="col-sm-5">
				<input type="text" name="name" placeholder="Product's name" value="<?=$name?>" 
				class="form-control offset-20">
			</div>
		</div>
			
		<div class="form-group">	
			<label for="category" class="col-md-offset-1 col-sm-3 control-label offset-29">Category:</label>
			<div class="col-sm-5">
				<select name="category" class="form-control offset-20">
					<option <?php echo ($category=="vegetable")?"selected":"";?> value="vegetable">Vegetable</option>
					<option <?php echo ($category=="fruit")?"selected":"";?> value="fruit">Fruit</option>
					<option <?php echo ($category=="other")?"selected":"";?> value="other">Other</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="rate" class="col-md-offset-1 col-sm-3 control-label offset-29">Price:</label>
			<div class="col-sm-5">
				<input type="number" name="rate" placeholder="Price" value="<?=$rate?>" class="form-control offset-20">
				<span> per </span>
				<input type="number" name="per" placeholder="Quantity" value="<?=$per?>" class="offset-10">
				<select name="unit">
					<option <?php echo ($unit=="pcs")?"selected":"";?> value="pcs">piece</option>
					<option <?php echo ($unit=="kg")?"selected":"";?> value="kg">Kg</option>
					<option <?php echo ($unit=="ltr")?"selected":"";?> value="ltr">litre</option>
					<option <?php echo ($unit=="dozen")?"selected":"";?> value="dozen">dozen</option>
				</select>
			</div>
		</div>
		
		<div class="row">
		<div class="col-md-offset-1 col-sm-3 control-label offset-29 offset-110"><strong>Total available quantity:</strong></div>
		<div class="col-sm-5 offset-29"><?=$quantity?></div>
		</div>
		
			
		<div class="form-group">
			<label for="addQuantity" class="col-md-offset-1 col-sm-3 control-label offset-29">Add:</label>
			<div class="col-sm-5">
				<input type="number" name="addQuantity" placeholder="Number of items" value="0" 
				class="form-control offset-20"><span>unit should be same as above</span>
			</div>
		</div>

		<div class="form-group">
			<label for="lessQuantity" class="col-md-offset-1 col-sm-3 control-label offset-29">Decrease:</label>
			<div class="col-sm-5">
				<input type="number" name="lessQuantity" placeholder="Number of items" value="0" max="<?=$quantity?>" 
				class="form-control offset-20">
				<span>unit should be same as above</span>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-offset-1 col-sm-3 control-label offset-29">Item pic: </label>
			<div class="col-sm-5">
				<img src="../resource/image/<?=$photo?>" alt="Item image">
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-md-offset-3 col-md-2 offset-45">	
				<input type="submit" name="updateItem" value="Update" class="btn btn-success btn-block">
			</div>
			<div class="col-md-2 offset-45">
				<a href="./index.php" class="btn btn-warning btn-block">Cancel</a>
			</div>
		</div>
	</div> 
	</form>
</body>
</html>