<?php
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eHaat - User</title>
    <link rel="stylesheet" type="text/css" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resource/css/bootstrap-theme.min.css">
    <script src="resource/js/jquery.min.js"></script>
    <script type="text/javascript" src="resource/js/bootstrap.min.js"></script>
</head>
<body>
	<h1>This will be user's landing page</h1>
	<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">...</div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>
</body>
</html>