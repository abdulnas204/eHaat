<?php
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
require_once('./backend/fetchUserInfo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eHaat - User's order</title>
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
				<h1>Edit profile</h1>
			</div>
			<div class="col-md-4">
				<a href="logout.php"><div class="btn btn-warning pull-right btn-md offset-20">Logout</div></a>
				<a href="./index.php"><div class="btn btn-warning pull-right btn-md offset-20">Home</div></a>
			</div>
		</div>

		<form action="./backend/updateProfile.php" method="POST">
			<div class="form-group">
				<label for="username" class="col-md-offset-1 col-sm-3 control-label offset-25">Username</label>
				<div class="col-sm-5">
					<input type="text" name="username" class="form-control offset-20" value="<?=$username?>">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-md-offset-1 col-sm-3 control-label offset-25">Email</label>
				<div class="col-sm-5">
					<input type="text" name="email" class="form-control offset-20"  disabled="disabled" value="<?=$emailId?>">
				</div>
			</div>
			<div class="form-group">
				<label for="contact" class="col-md-offset-1 col-sm-3 control-label offset-25">Contact</label>
				<div class="col-sm-5">
					<input type="text" name="contact" class="form-control offset-20" value="<?=$contact?>">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-md-offset-1 col-sm-3 control-label offset-29">Old Password</label>
				<div class="col-sm-5">
					<input type="password" name="password" class="form-control offset-20">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-md-offset-1 col-sm-3 control-label offset-29">New Password</label>
				<div class="col-sm-5">
					<input type="password" name="password" class="form-control offset-20">
				</div>
			</div>
			<div class="form-group">
				<label for="confirm_pass" class="col-md-offset-1 col-sm-3 control-label offset-29">Confirm new Password</label>
				<div class="col-sm-5">
					<input type="password" name="confirm_pass" class="form-control offset-20">
				</div>
			</div>
			<div class="col-md-offset-5 col-md-3">
				<input type="submit" name="register-btn" id="register-btn" class="btn btn-success btn-block offset-20" value="Update">
			</div>
		</form>

		<!-- This is the list of all products added by this user -->
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr>
		<?php if(sizeof($products) == 0) {
			echo "Sorry you haven't added any product yet";
		} else {
		?>
			<ul style="list-style-type: none;">
			<?php 
				for($i=0; $i<sizeof($products); $i++) { 
					$products[$i]["name"] = explode("$", $products[$i]["name"]);
					?>
					<li>
						<div class="col-md-3">
							<span><img src="../resource/image/<?=$products[$i]['photo'] ?>" alt="Product photo" style="width:250px; height:250px;" 
            class="img-thumbnail img-responsive"></span><br>
							<span>Name:	<?=$products[$i]["name"][0] ?></span><br>	
							<span>Category: <?=$products[$i]["name"][1] ?></span><br>	
							<span>Price: <?=$products[$i]["price"] ?> per <?=$products[$i]["per"] ?> <?=$products[$i]["unitOfQuantity"] ?></span><br>	
							<span>Total Units: <?=$products[$i]["quantityAdded"] ?></span><br>	
							<span>Sold: <?=$products[$i]["quantitySold"] ?></span><br>	
							<span>Last Updated: <?=$products[$i]["updatedAt"] ?></span><br>	
							<a href="./item.php?update=true&id=<?=$products[$i]['id']?>" class="btn btn-primary col-md-offset-4 col-md-4">Edit</a><br><br><br>
							<hr>
						</div>
					</li>
			<?php } ?>
			</ul>
<?php } ?>
</body>
</html>