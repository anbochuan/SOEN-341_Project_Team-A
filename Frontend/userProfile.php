
<!-- reference: w3c school online store theme -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Profile</title>

  <?php include('include/dbConnector.php'); ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- link your own css here -->
  <link rel="stylesheet" type="text/css" href="StyleSheet/index.css">
  <script src="myScript/userProfile.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="StyleSheet/login.css"> -->
</head>
<body>
  <?php include('include/header.php'); ?>
  <?php
    if(isset($_POST["submitForPrice"]))
    {
      $newPrice = $_POST['newPrice'];
      $id = $_POST['idForChangePrice'];
      $db->query("UPDATE product SET Price = '$newPrice' WHERE ProductId = '$id'");
    }
    if(isset($_POST["submitForDelete"]))
    {
      $id = $_POST['idForDelete'];
      $db->query("DELETE FROM product WHERE ProductId = '$id'");
    }
    if(isset($_POST["submitProfile"]))
    {
      $newUserName = $_POST['userName'];
      $newPhoneNumber = $_POST['phone'];
      $newAddress = $_POST['address'];
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false)
      {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
      }

      $_SESSION['username'] = $_POST['userName'];
    }
  ?>
  <!-- user profile -->
  <div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#summary">Account Details</a></li>
      <li><a data-toggle="tab" href="#ads">My Ads</a></li>
      <li><a data-toggle="tab" href="#edit">Edit Profile</a></li>
    </ul>

    <div class="tab-content">
      <!-- view user information -->
      <!-- NEED RETRIEVE INFO FROM DATA BASE, NEED HELP FROM BACK END -->
      <div id="summary" class="tab-pane fade in active">
        <h1>Account Details</h1>
        <table class="table">
          <tbody>
          <?php
          if(isset($_POST["submitProfile"])) 
          {
            $db->query("UPDATE user SET UserName='$newUserName', Address='$newAddress', PhoneNumber='$newPhoneNumber', image='$imgContent' WHERE Email='{$_SESSION["email"]}'");
            $resultArray = $db->query("SELECT * FROM user WHERE Email = '{$_SESSION["email"]}'");
            foreach($resultArray as $eachRow)
            {
              echo("
              <tr>
                <td><strong>User Name: </strong></td>
                <td>".$eachRow['UserName']."</td>
              </tr>
              <tr>
              <td><strong>Email: </strong></td>
              <td>".$eachRow["Email"]."</td>
              </tr>
              <tr>
                <td><strong>Phone Number: </strong></td>
                <td>".$eachRow["PhoneNumber"]."
                </td> 
              </tr>
              <tr>
                <td><strong>Address: </strong></td>
                <td>".$eachRow["Address"]."
                </td>
              </tr>
              <tr>
                <td><strong>Profile Pics: </strong></td>
                <td><img src=\"data:image/png;base64,".base64_encode($eachRow['image'])."\" alt=\"\" width=\"200\" height=\"200\">
                </td>
              </tr>");         
            }
          }
          else
          {
            echo("
            <tr>
              <td><strong>User Name: </strong></td>
              <td>".$_SESSION['username']."</td>
            </tr>  
            <tr>
            <td><strong>Email: </strong></td>
            <td>".$_SESSION["email"]."</td>
            </tr>
            <tr>
              <td><strong>Phone Number: </strong></td>
              <td>".$_SESSION["phone"]."</td>
            </tr>
            <tr>
              <td><strong>Address: </strong></td>
              <td>".$_SESSION["address"]."</td>
            </tr>
            <tr>
              <td><strong>Profile Pics: </strong></td>
              <td>");
            $resultArray = $db->query("SELECT * FROM user WHERE Email = '{$_SESSION['email']}'");
            foreach($resultArray as $eachRow)
            {
              echo("<img src=\"data:image/png;base64,".base64_encode($eachRow['image'])."\" alt=\"\" width=\"200\" height=\"200\">
              </td>
            </tr>");
            }         
          }
          ?>
  
          </tbody>
        </table>
      </div>
      <!-- view all lists(Ads) the user has posted -->
      <div id="ads" class="tab-pane fade">
        <table>
          <tbody>
        <?php
         $result = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId WHERE Email = '{$_SESSION['email']}'");
      foreach ($result as $eachRow) 
      {
        echo ("<div class=\"container-fluid\">
                  <form onsubmit=\"return deleteConfirm();\" name=\"update\" method=\"post\" id=\"update\" action=\"userProfile.php\">
                    <h4>".$eachRow['ProductName']."  
                      <img src=\"data:image/png;base64,".base64_encode($eachRow['image'])."\" width=\"30\" height=\"30\">
                      <input type=\"hidden\" value=\"".$eachRow['ProductId']."\" name=\"idForDelete\"/> 
                      <button class=\"btn btn-danger btn-sm\" type=\"submit\" name=\"submitForDelete\" value=\"deleteItem\" > <span class=\"glyphicon glyphicon-trash\"></span> Delete this item</button>
                    </h4>
                  </form>
                  <form name=\"update\" method=\"post\" id=\"update\" action=\"userProfile.php\">
                    <div class=\"input-group input-group-sm col-md-3\">
                      <input type=\"hidden\" value=\"".$eachRow['ProductId']."\" name=\"idForChangePrice\"/>
                      <input type=\"text\" class=\"form-control\" name=\"newPrice\" maxlength=\"9\" size=\"15\" placeholder=\"new price...\"/>
                      <div class=\"input-group-btn\">
                        <button class=\"btn btn-info btn-sm\" type=\"submit\" name=\"submitForPrice\" value=\"changePrice\" > <span class=\"glyphicon glyphicon-stats\"></span> Adjust the price</button>
                      </div>
                    </div>
                  </form>         
                <p class=\"lead\"> $ ".$eachRow['Price']." </p> 
                <a href=\"item.php?ad=".$eachRow['ProductId']."\"> 
                  <img src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" width=\"200\" height=\"200\"> 
                </a>
                <p class=\"text-muted\">".$eachRow['ProductDetail']."</p> 
                <p><span class=\"glyphicon glyphicon-map-marker\"></span> ".$eachRow['CityName'].", ".$eachRow['Province']."</p><hr></div>");
      }
        ?>
          </tbody>
        </table>
        <?php

        ?>
      </div>
      <!-- user can edit profile here -->
      <div id="edit" class="tab-pane fade">
        <div class="container">
          <form action="userProfile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="userName">User Name:</label>
              <input type="text" class="form-control" placeholder="Please enter your new user name:" name="userName" required>
            </div>
            <div class="form-group">
              <label for="adress">Address:</label>
              <input type="text" class="form-control" placeholder="Your current living address:" name="address" required>
            </div>
            <!-- not add validation yet -->
            <div class="form-group">
              <label for="phone">Phone Number:</label>
              <input type="text" class="form-control" placeholder="Your phone number:" name="phone" required>
            </div>
            <!-- <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div> -->
       <div class="form-group">
          <label for="profilePics">Profile Pics:
          </label>
          <input type="file" name="image" id="fileToUpload" required>
        </div>
  
            <button type="submit" class="btn btn-success" name="submitProfile">Save Changes</button>
          </form>
        </div>
      </div>
      <!-- //edit file end -->
    </div>
    <!-- //tab content end -->
  </div>
  <!-- //body end -->
  <br><br>
  <?php include('include/footer.php') ;?>

</body>
</html>