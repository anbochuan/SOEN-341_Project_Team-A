<?php
session_start();
include 'dbConnector.php';

$productName=mysqli_real_escape_string($conn,$_POST['productName']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
$productCategory1Id=mysqli_real_escape_string($conn,$_POST['productCategory']);
$productCategory2Id=mysqli_real_escape_string($conn,$_POST['productCategory2']);
$productCategory3Id=mysqli_real_escape_string($conn,$_POST['productCategory3']);
$image1=mysqli_real_escape_string($conn,$_FILES['Image1']['tmp_name']);
$imgContent1 = addslashes(file_get_contents($image1));
$image2=mysqli_real_escape_string($conn,$_FILES['Image2']['tmp_name']);
$imgContent2 = addslashes(file_get_contents($image2));
$image3=mysqli_real_escape_string($conn,$_FILES['Image3']['tmp_name']);
$imgContent3 = addslashes(file_get_contents($image3));
$image4=mysqli_real_escape_string($conn,$_FILES['Image4']['tmp_name']);
$imgContent4 = addslashes(file_get_contents($image4));
$image5=mysqli_real_escape_string($conn,$_FILES['Image5']['tmp_name']);
$imgContent5 = addslashes(file_get_contents($image5));
$image6=mysqli_real_escape_string($conn,$_FILES['Image6']['tmp_name']);
$imgContent6 = addslashes(file_get_contents($image6));
$image7=mysqli_real_escape_string($conn,$_FILES['Image7']['tmp_name']);
$imgContent7 = addslashes(file_get_contents($image7));
$image8=mysqli_real_escape_string($conn,$_FILES['Image8']['tmp_name']);
$imgContent8 = addslashes(file_get_contents($image8));
$productDetail=mysqli_real_escape_string($conn,$_POST['text']);	  

$email=$_SESSION['email'];

$searchQuery="SELECT UserId FROM user WHERE Email = '$email'"; 
$userNum = mysqli_query($conn,$searchQuery);
$userID = $userNum->fetch_assoc();

$sql="INSERT INTO `product`(productName,productDetail,price,Image1,Image2,Image3,Image4,Image5,Image6,Image7,Image8,UserID,productCategory,productCategory2,productCategory3) VALUES ('$productName','$productDetail','$price','$imgContent1','$imgContent2','$imgContent3','$imgContent4','$imgContent5','$imgContent6','$imgContent7','$imgContent8','$userID[UserId]','$productCategory1Id','$productCategory2Id','$productCategory3Id')";
mysqli_query($conn,$sql);

$queryLast="SELECT * FROM product WHERE UserId = $userID[UserId] ORDER BY ProductId DESC LIMIT 1";
$productNum = mysqli_query($conn,$queryLast);
$productIDnum = $productNum->fetch_assoc();

$_SESSION['ad'] = $productIDnum['ProductId'];
$_SESSION['previous_page'] = "addItemToDB.php";

//echo "UserID: ".$userID['UserId']." ProductIdnumber: ".$productIDnum['ProductId'];

header("Location:../item.php"); // redirect form to item's page

exit();
?>
