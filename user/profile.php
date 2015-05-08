<?php
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
require_once('backend/fetchUserInfo.php');
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
			<div class="col-md-2"></div>
			<div class="col-md-2">
				<!-- avatar-create new repo-logout -->
				<div class="dropdown">
	  
				<a class="dropdown-toggle avatar pull-left" data-toggle="dropdown" role="button" aria-expanded="false" href="#">
				    <img height="30" width="30" src="../resource/img/raj.jpg" alt="@hippozippo"></img>
			        	<span>hippozippo</span>
						<span class="caret"></span>
				</a>
		    	<ul class="dropdown-menu" role="menu">
				    <li><a href="../index.php">Logout</a></li>
				</ul>
				
				</div>
			</div>
		</div>

		<form action="./backend/updateProfile.php" method="POST">
			<div class="form-group">
				<label for="username" class="col-md-offset-1 col-sm-3 control-label offset-20">Username</label>
				<div class="col-sm-5">
					<input type="text" name="username" class="form-control offset-20" value="<?=$username?>">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-md-offset-1 col-sm-3 control-label offset-20">Email</label>
				<div class="col-sm-5">
					<input type="text" name="email" class="form-control offset-20" value="<?=$emailId?>">
				</div>
			</div>
			<div class="form-group">
				<label for="contact" class="col-md-offset-1 col-sm-3 control-label offset-20">Contact</label>
				<div class="col-sm-5">
					<input type="text" name="contact" class="form-control offset-20" value="<?=$contact?>">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-md-offset-1 col-sm-3 control-label offset-20">Old Password</label>
				<div class="col-sm-5">
					<input type="password" name="password" class="form-control offset-20">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-md-offset-1 col-sm-3 control-label offset-20">New Password</label>
				<div class="col-sm-5">
					<input type="password" name="password" class="form-control offset-20">
				</div>
			</div>
			<div class="form-group">
				<label for="confirm_pass" class="col-md-offset-1 col-sm-3 control-label offset-20">Confirm new Password</label>
				<div class="col-sm-5">
					<input type="password" name="confirm_pass" class="form-control offset-20">
				</div>
			</div>
			<div class="col-md-offset-5 col-md-3">
				<input type="submit" name="register-btn" id="register-btn" class="btn btn-success btn-block offset-20" value="Update">
			</div>
		</form>
</body>
</html>