<?php
session_start();
require_once('../common/util.php');
require_once('./backend/precheck.php');
require_once('./backend/getRecentProducts.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eHaat - User</title>
    <link rel="stylesheet" type="text/css" href="../resource/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resource/css/index.css">
    <link rel="stylesheet" type="text/css" href="../resource/css/bootstrap-theme.min.css">
    <script src="../resource/js/jquery.min.js"></script>
    <script type="text/javascript" src="../resource/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <a href="sell.php"><div class="btn btn-warning pull-left btn-md offset-45">Add new item</div></a>
    </div>
    <div class="col-md-6">
      <form action="./browse.php" method="GET" class="offset-45">
        <div class="input-group">
          <span class="input-group-addon">e-Haat Bazaar</span>
          <input type="text" name="searchText" placeholder="Enter your search string here" class="form-control input-lg">
          <span class="input-group-btn">        
            <input type="submit" name="search" value="Search" class="btn btn-success input-lg">
          </span>
        </div>
      </form>
    </div>
    <div class="col-md-3">
      <a href="logout.php"><div class="btn btn-warning pull-right btn-md offset-45">Logout</div></a>
    </div>
  </div>
  <hr>
  <div id="vegetables" class="row"> 
    <?php
      if(sizeof($vegetables) > 0) {
        foreach($vegetables as $item) {
          ?>
          <div class="col-md-3">
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image" style="width:250px; height:250px;" 
            class="img-thumbnail img-responsive"><br>
            <span>ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: Rs. <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <?php echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <span><a href="#"><div class="btn btn-success col-md-offset-3 col-md-6 offset-10">
              <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to Basket</div></a></span>
          </div>
        <?php
        }
      } else {
        echo "No vegetables found";
      }
    ?>
  </div>
  <hr>
  <div id="fruits" class="row"> 
    <?php
      if(sizeof($fruits) > 0) {
        foreach($fruits as $item) {
          ?>
          <div class="col-md-3">
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image" style="width:250px; height:250px;" 
            class="img-thumbnail img-responsive"><br>
            <span>ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <?php echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <span><a href="#"><div class="btn btn-success col-md-offset-3 col-md-6 offset-10">
              <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to Basket</div></a></span>  
          </div>
        <?php
        }
      } else {
        echo "No fruits found";
      }  
    ?>
  </div>
  <hr>
  <div id="others" class="row"> 
    <?php
      if(sizeof($others) > 0) {
        foreach($others as $item) {
          ?>
          <div class="col-md-3">
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image" style="width:250px; height:250px;" 
            class="img-thumbnail img-responsive"><br>
            <span>ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <?php echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <span><a href="#"><div class="btn btn-success col-md-offset-3 col-md-6 offset-10">
              <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to Basket</div></a></span>
          </div>
        <?php
        }
      } else {
        echo "Nothing found for this category";
      }  
    ?>
  </div>
</div>
<br><br>
</body>
</html>