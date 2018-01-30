<!-- reference: w3c school online store theme -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Item Name</title>
  <?php include('include/dbConnector2.php'); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
  	  if(isset($_POST['submitAddWishList']))
      {
        $wishListOwnerId = $_POST['wishListOwnerId'];
        $wishListProductId = $_POST['wishListProductId'];
        $wishListUserId = $_POST['wishListUserId'];
  	  }

      $sql = $db->query("INSERT INTO wishList (wishListUserId,wishListProductId,wishListOwnerId) VALUES ('$wishListUserId','$wishListProductId','$wishListOwnerId')");
      // mysqli_query($conn,$sql);
      header("Location: wishList.php");
    ?>

</body>
</html>
