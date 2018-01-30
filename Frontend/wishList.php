<!-- reference: w3c school online store theme -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Item Name</title>
  <?php include('include/dbConnector2.php'); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="myScript/jquery-3.2.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="myScript/wishList.js"></script>
  <!-- link your own css here -->
  <link rel="stylesheet" type="text/css" href="StyleSheet/index.css">
  <link rel="stylesheet" type="text/css" href="StyleSheet/listings.css">
  <link rel="stylesheet" type="text/css" href="StyleSheet/item.css">  
</head>
<body>
  <?php include('include/header.php'); ?>
  <div class="container-fluid">
    <div class="row">
    <?php	
      $_SESSION['previous_page'] = "wishList.php";
      $result = $db->query("SELECT UserId FROM user WHERE Email = '{$_SESSION['email']}'");
      $dbResult = $result->fetch(\PDO::FETCH_ASSOC);  
      $wishListUserId = $dbResult['UserId'];
      if(isset($_POST["submitForRemove"]))
      {
        $id = $_POST['idForRemove'];
        $db->query("DELETE FROM wishList WHERE wishListProductId = '$id' AND wishList.wishListUserId = '$wishListUserId' ");
      }

      $result = $db->query("SELECT * FROM wishList INNER JOIN product ON wishList.wishListOwnerId = product.UserId INNER JOIN user ON user.UserId = wishList.wishListUserId WHERE user.UserId = '$wishListUserId' AND product.ProductId = wishList.wishListProductId");
      echo("<div class=\"container\"><h2>".$_SESSION['username']. "'s wish list:</h2></div>");
      foreach ($result as $eachRow)
      {
        echo("<div class=\"container\"> 
        <h3> ".$eachRow['ProductName']." <button type=\"button\" class=\"btn btn-info btn-sm\"> <span class=\"glyphicon glyphicon-user\"></span> ".$eachRow['UserName']." </button> <img src=\"data:image/png;base64,".base64_encode($eachRow['image'])."\" width=\"30\" height=\"30\"></h3>   
        <p class=\"lead\"> $ ".$eachRow['Price']." 
          <form onsubmit=\"return deleteConfirm();\" name=\"update\" method=\"post\" id=\"update\" action=\"wishList.php\">
            <input type=\"hidden\" value=\"".$eachRow['ProductId']."\" name=\"idForRemove\"/> 
            <button class=\"btn btn-danger btn-sm\" type=\"submit\" name=\"submitForRemove\" value=\"deleteItem\" > <span class=\"glyphicon glyphicon-trash\"></span> Remove this item</button>
          </form>
        </p> 
          <a href=\"item.php?ad=".$eachRow['ProductId']."\">
            <img src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"300\" height=\"300\">
          </a>
          <a href=\"item.php?ad=".$eachRow['ProductId']."\">
            <img src=\"data:image/png;base64,".base64_encode($eachRow['Image2'])."\" alt=\"\" width=\"300\" height=\"300\">
          </a>      
        <p class=\"text-muted\">".$eachRow['ProductDetail']."</p> 
        <p><span class=\"glyphicon glyphicon-map-marker\"></span> ".$eachRow['CityName'].", ".$eachRow['Province']."</p><hr></div>");
      }

      ?>
    </div>
  </div></br></br>

  <br><br>

  <?php include('include/footer.php') ;?>

</body>
</html>
