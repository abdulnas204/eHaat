<?php 
session_start();
require_once('../../common/util.php');
require_once('../../common/dbConnect.php');

if( isset($_SESSION["id"]) 
	&& isset($_SESSION["user"]) 
	&& isset($_SESSION["loggedIn"]) 
	&& $_SESSION["loggedIn"] == true
	) {

	$productId = $_GET["productId"];
	$userId = $_SESSION["id"];

	if(isset($_SESSION["cartId"])) {
		$cartId = $_SESSION["cartId"];
		$query = "DELETE FROM t_cart WHERE productId = $productId 
																	AND userId = $userId
																	AND cartId = '$cartId';";
		if($link->query($query)) {
			echo "removed from cart successfully";
		} else {
			echo "cannot remove from the cart ";
		}
	}
} else {
	echo "User not logged in";
}
?>
