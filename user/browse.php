<?php
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
require_once('./backend/fetchFilteredProducts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Browse vegies</title>
	<script type="text/javascript" src="../resource/js/jquery.min.js"></script>
	<script type="text/javascript" src="../resource/js/browse.js"></script>
</head>
<body>
	<div class="container">
		<form action="./browse.php" method="GET">
			<input type="text" name="searchText" placeholder="Enter your search string here">
			<input type="submit" name="search" value="Search">
		</form>
		<hr>
		<div id="results">
			<?php
			if(isset($error)) {
				echo $error;
			} else {
				echo "<h1>Vegetables</h1>";
				foreach($vegetables as $item) {
				?>
					<div>
            <span class="id">ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <?php echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <input type="number" value="0" max=<?php echo ($item["quantityAdded"] - $item["quantitySold"]); ?>>
            <button class="shortlist">Add to Cart</button><br>
            <button class="remove">Remove from Cart</button><br>
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image">
          </div>
				<?php
				}

				echo "<h1>Fruits</h1>";
				foreach($fruits as $item) {
				?>
					<div>
            <span class="id">ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <?php echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <button class="shortlist">Add to Cart</button><br>
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image">
          </div>
				<?php
				}

				echo "<h1>Others</h1>";
				foreach($others as $item) {
				?>
					<div>
            <span class="id">ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <?php echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <button class="shortlist">Add to Cart</button><br>
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image">
          </div>
				<?php
				}
			}
			?>
		</div>
	</div>
</body>
</html>