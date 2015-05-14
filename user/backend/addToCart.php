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
	$price = $_GET["price"];
	$quantity = $_GET["quantity"];
	$userId = $_SESSION["id"];

	// echo "$productId <br> $ownerId <br> $price <br> $quantity <br> $userId ";
	$flag = 0;

	if(! isset($_SESSION["cartId"])) {
		$removeCacheQuery = "DELETE FROM t_cart WHERE userId = $userId;";
		if($link->query($removeCacheQuery)) {
			echo "Cache removed";
			$flag++;
		}
		
		$_SESSION["cartId"] = getRandomString(10);
	} else {
		$flag++;
	}
	$rand = $_SESSION["cartId"];
	$query = getInsertQuery('t_cart',
													array("productId", "userId", "price", "quantity", "cartId"),
													array($productId, $userId, $price, $quantity, $rand),
													array("n", "n", "n", "n", "s")
												);
	if($link->query($query) && $flag == 1) {
		echo "<br>success";
	} else {
		echo "error";
	}
} else {
	echo "User not logged in";
}
?>
