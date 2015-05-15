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
				<h1>Add new Item</h1>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-2">
				<a href="logout.php"><div class="btn btn-warning pull-right btn-md offset-20">Logout</div></a>
			</div>
		</div>

		
	<form action="./backend/newItem.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name" class="col-md-offset-1 col-sm-3 control-label offset-29">Name:</label>
			<div class="col-sm-5">
				<input type="text" name="name" placeholder="Product's name" class="form-control offset-20">
			</div>
		</div>
		
		<div class="form-group">
			<label for="category" class="col-md-offset-1 col-sm-3 control-label offset-29">Category:</label>
			<div class="col-sm-5">
				<select name="category" class="form-control offset-20">
					<option value="vegetable">Vegetable</option>
					<option value="fruit">Fruit</option>
					<option value="other">Other</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="rate" class="col-md-offset-1 col-sm-3 control-label offset-29">Price:</label>
			<div class="col-sm-5">
				<input type="number" name="rate" placeholder="Price" class="form-control offset-20">
				<span> per </span>
				<input type="number" name="per" placeholder="Quantity" class="offset-10">
				<select name="unit" class="offset-10">
					<option value="pcs">piece</option>
					<option value="kg">Kg</option>
					<option value="ltr">litre</option>
					<option value="dozen">dozen</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="quantity" class="col-md-offset-1 col-sm-3 control-label offset-29">Number of items:</label>
			<div class="col-sm-5">
				<input type="number" name="quantity" placeholder="Number of items" class="form-control offset-20"><span>unit should be same as above</span>
			</div>
		</div>

		<div class="form-group">
			<label for="photo" class="col-md-offset-1 col-sm-3 control-label offset-20">Upload a recent pic:</label>
			<div class="col-sm-5">
				<input type="file" name="photo" class="offset-20">
			</div>
		</div>		

		<div class="form-group row">
			<div class="col-md-offset-3 col-md-2 offset-45">
				<input type="submit" name="newItem" value="Add" class="btn btn-success btn-block">
			</div>
			<div class="col-md-2 offset-45">
				<input type="reset" value="Reset" class="btn btn-warning btn-block">
			</div>
		</div>
	</form>
	</div>
</body>
</html>