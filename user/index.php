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
    <link rel="stylesheet" type="text/css" href="../resource/css/bootstrap-theme.min.css">
    <script src="../resource/js/jquery.min.js"></script>
    <script type="text/javascript" src="../resource/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h1>This will be user's landing page</h1>
  <form action="./browse.php"></form>
  <hr>
  <div id="vegetables"> 
    <?php
      if(sizeof($vegetables) > 0) {
        foreach($vegetables as $item) {
          ?>
          <div>
            <span>ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <? echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image">
          </div>
        <?php
        }
      } else {
        echo "No vegetables found";
      }
    ?>
  </div>
  <hr>
  <div id="fruits"> 
    <?php
      if(sizeof($fruits) > 0) {
        foreach($fruits as $item) {
          ?>
          <div>
            <span>ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <? echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image">
          </div>
        <?php
        }
      } else {
        echo "No fruits found";
      }  
    ?>
  </div>
  <hr>
  <div id="others"> 
    <?php
      if(sizeof($others) > 0) {
        foreach($others as $item) {
          ?>
          <div>
            <span>ID: <?=$item["id"]?></span><br>
            <span>Name: <?=$item["name"]?></span><br>
            <span>OwnerId: <?=$item["ownerId"]?></span><br>
            <span>Price: <?=$item["price"]?> per <?=$item["per"]?> <?=$item["unitOfQuantity"]?></span><br>
            <span>Quantity Available: <? echo ($item["quantityAdded"] - $item["quantitySold"]); ?></span><br>
            <img src="../resource/image/<?=$item['photo']?>" alt="Item's image">
          </div>
        <?php
        }
      } else {
        echo "Nothing found for this category";
      }  
    ?>
  </div>
</div>
</body>
</html>