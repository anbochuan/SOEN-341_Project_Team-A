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
  
  <script src="myScript/global.js"></script>
  <!-- link your own css here -->
  <link rel="stylesheet" type="text/css" href="StyleSheet/index.css">
  <link rel="stylesheet" type="text/css" href="StyleSheet/listings.css">
  <link rel="stylesheet" type="text/css" href="StyleSheet/item.css">
  <link rel="stylesheet" type="text/css" href="StyleSheet/style.css">
  <link rel="stylesheet" type="text/css" href="StyleSheet/vote.css">
  <!-- <script src="myScript/myScript.js"></script> -->
  
</head>
<body>
  <?php include('include/header.php'); ?>
  <div class="container-fluid">
    <div class="row">
    <?php	
  	  if(strcmp($_SESSION['previous_page'],"addItemToDBphp")==0){
  	  $id = $_SESSION['ad'];
  	  }
      else if(strcmp($_SESSION['previous_page'],"wishListphp")==0)
      {
        $id = $_GET['ad'];
      }

  	  else{
        $id = $_GET['ad'];
  	  }
      if($_SESSION['is_login'] == true)
      {
        $result = $db->query("SELECT UserId FROM user WHERE Email = '{$_SESSION['email']}'");
        $dbResult = $result->fetch(\PDO::FETCH_ASSOC);  
        $wishListUserId = $dbResult['UserId'];
      }
      else
        $wishListUserId = 0;

      $result = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId WHERE ProductId='$id'");
      foreach ($result as $eachRow)
      {
        echo("<div class=\"container\"> 
        <h2> ".$eachRow['ProductName']."</h2><hr/><p class=\"lead\">Product owner: <button type=\"button\" class=\"btn btn-info btn-sm\"> <span class=\"glyphicon glyphicon-user\"></span> ".$eachRow['UserName']." </button> <img src=\"data:image/png;base64,".base64_encode($eachRow['image'])."\" width=\"30\" height=\"30\"></p> 
        <p class=\"lead\">Product price: $ ".$eachRow['Price']." </p>          
        <div class=\"row\">
        <div id=\"dynamic_slide_show\" class=\"carousel slide col-9\" data-ride=\"carousel\">
          <!--  wrapper for slides  -->
          <div class=\"carousel-inner\" role=\"listbox\">
            <div class=\"item active\">
              <div class=\"col-md-3\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">
                  <img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"300\" height=\"300\">
                  </div>
                </div>
              </div>
              <div class=\"col-md-3\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">
                  <img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image2'])."\" alt=\"\" width=\"300\" height=\"300\">
                  </div>
                </div>
              </div>
              <div class=\"col-md-3\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">
                  <img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image3'])."\" alt=\"\" width=\"300\" height=\"300\">
                  </div>
                </div>
              </div>
              <div class=\"col-md-3\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">
                  <img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image4'])."\" alt=\"\" width=\"300\" height=\"300\">
                  </div>
                </div>
              </div>
            </div>
            <div class=\"item\">
              <div class=\"col-md-3\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">
                  <img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image5'])."\" alt=\"\" width=\"300\" height=\"300\">
                  </div>
                </div>
              </div>
              <div class=\"col-md-3\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">
                  <img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image6'])."\" alt=\"\" width=\"300\" height=\"300\">
                  </div>
                </div>
              </div>
              <div class=\"col-md-3\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">
                  <img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image7'])."\" alt=\"\" width=\"300\" height=\"300\">
                  </div>
                </div>
              </div>
              <div class=\"col-md-3\">
                <div class=\"panel panel-default\">
                  <div class=\"panel-body\">
                  <img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image8'])."\" alt=\"\" width=\"300\" height=\"300\">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  controls or next and pre buttons  -->
          <a class=\"left carousel-control\" href=\"#dynamic_slide_show\" role=\"button\" data-slide=\"prev\">
            <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Previous</span>
          </a>
          <a class=\"right carousel-control\" href=\"#dynamic_slide_show\" role=\"button\" data-slide=\"next\">
            <span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Next</span>
          </a>
        </div>      
      </div>
       
        <p class=\"text-muted\">".$eachRow['ProductDetail']."</p> 
        <p><span class=\"glyphicon glyphicon-map-marker\"></span> ".$eachRow['CityName'].", ".$eachRow['Province']."</p>
        <div class=\"col-md-2\"></div>
        <div class=\"col-md-1\"> 
          <form action=\"addToWishlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"wishListProductId\" value=\"".$eachRow['ProductId']."\">
            <input type=\"hidden\" name=\"wishListOwnerId\" value=\"".$eachRow['UserId']."\">
            <input type=\"hidden\" name=\"wishListUserId\" value=\"".$wishListUserId."\">
            <button id=\"addWishList\" type=\"submit\" class=\"btn btn-primary btn-md\" name=\"submitAddWishList\"> <span class=\"glyphicon glyphicon-star\"></span> Add to my wish list
            </button>
          </form>
        </div><div class=\"col-md-2\"></div>
        <!-- voting markup -->
        <div class=\"voting_wrapper col-md-2\" id=\"XXXXXXX\">
          <div class=\"voting_btn\">
            <div class=\"up_button\">&nbsp;</div><span class=\"up_votes\">0</span>
          </div>
          <div class=\"voting_btn\">
            <div class=\"down_button\">&nbsp;</div><span class=\"down_votes\">0</span>
          </div>
        </div>
        <!-- voting markup end -->
      </div>");
      }

      ?>
    </div>
    <hr>
    
    
  </div></br></br>
  <div class="page-container">
  <?php include('functions.php'); 
    get_total(); 
    echo("</br>");
    // -------------- check comments ------------
    if(strcmp($_SESSION['previous_page'],"addItemToDBphp")==0){
    $id = $_SESSION['ad'];
    }
    else{
      $id = $_GET['ad'];
    }
      // new comment
    if(isset($_POST['new_comment']))
    {
      $new_com_name = $_SESSION['username'];
      $new_com_text = $_POST['comment'];
      $new_com_date = date('Y-m-d H:i:s');
      $new_com_code = generateRandomString();

      if (isset($new_com_text)) 
      {
        mysqli_query($conn, "INSERT INTO `parents` (`ProductId`, `user`, `text`, `date`, `code`) VALUES ('$id', '$new_com_name', '$new_com_text', '$new_com_date', '$new_com_code')");
      }
      // header("Location:");
    }

      // new reply
    if(isset($_POST['replyButton'])) // if the REPLY button is pressed
    {
      $new_reply_name = $_SESSION['username'];
      $new_reply_text = $_POST['new-reply']; // get the textarea value
      $new_reply_date = date('Y-m-d H:i:s');
      $new_reply_code = $_POST['code'];

      if (isset($new_reply_text)) 
      {
        mysqli_query($conn, "INSERT INTO `children` (`ProductId`, `user`, `text`, `date`, `par_code`) VALUES ('$id', '$new_reply_name', '$new_reply_text', '$new_reply_date', '$new_reply_code')");
      }
      // header("Location:");
    } // -------------- end check comments ------------
  ?>   

    <form action="" method="post" class="main">
      <label>enter a brief comment</label>
      <textarea class="form-text" name="comment" id="comment"></textarea>
      <br />
      <input type="submit" class="form-submit " name="new_comment" value="post">  
    </form>
    <?php get_comments(); ?>
  </div>

  <?php include('include/footer.php') ;?>

</body>
</html>
