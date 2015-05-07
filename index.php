<?php
session_start();
require_once('./common/util.php');
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
	header("Location: ./user/index.php");
	die();
}
if(isset($_SESSION["error"])) {
	var_dump($_SESSION["error"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>eHaat - Homepage</title>
	<link rel="stylesheet" type="text/css" href="resource/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resource/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="resource/css/index.css">
	<script src="resource/js/jquery.min.js"></script>
	<script type="text/javascript" src="resource/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#CDCDCD;">
	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header well-sm">
				<a class="navbar-brand" href="#">e-Haat Bazaar</a>
			</div>
			<!-- Navigation bar -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form class="navbar-form navbar-right" action="login.php" method="POST">
					<label for="email" style="color:white;">Email ID:</label>
					<input type="email" name="email" class="input-lg" placeholder="eg. abc@name.com">
					<label for="password" style="color:white;">Password:</label>
					<input type="password" name="password" class="input-lg" placeholder="password">
					<input type="submit" name="login" class="btn btn-success btn-lg" value="Login">

				</form>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container  offset-120">
		<div class="col-md-6">
			<img src="resource/img/shop_online.jpg" class="img-responsive" style="height: 490px;	">
		</div>
		<div class="col-md-6">
			<h2 class="text-center offset-30">Register here</h2>
			<form action="register.php" method="POST" class="form-horizontal">
				<div class="form-group">
					<label for="name" class="col-sm-3 text-center offset-10">Username:</label>
					<div class="col-sm-9">
						<input type="text" name="name" class="form-control input-lg" placeholder="myusername">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 text-center offset-10">Email ID:</label>
					<div class="col-sm-9">
						<input type="email" name="email" class="form-control input-lg" placeholder="eg. abc@name.com">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label for="contact" class="text-center offset-10">Mobile Number:</label>
					</div>
					<div class="col-sm-9">
						<input name="contact" type="number" min="0" class="form-control input-lg" placeholder="eg. 9876543210">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-sm-3 text-center offset-10">Password:</label>
					<div class="col-sm-9">
						<input type="password" name="password" class="form-control input-lg" placeholder="password">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 text-center">Confirm password:</label>
					<div class="col-sm-9">
						<input type="password" name="confirmPassword" class="form-control input-lg" placeholder="repeat">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-6">
						<input type="submit" name="register" class="btn btn-success btn-block" value="Register">
					</div>
					<div class="col-sm-offset-4 col-sm-6 offset-20">
						<input type="reset" value="Reset" class="btn btn-warning btn-block">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>