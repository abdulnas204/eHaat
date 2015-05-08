<?php 
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
session_destroy();
echo "Logged out";
header("Refresh:3; ../index.php");
 ?>