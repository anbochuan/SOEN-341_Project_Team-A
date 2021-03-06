<!-- reference: w3c school online store theme -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>

  <?php include('include/dbConnector.php'); ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="StyleSheet/index.css">
  <script src="myScript/myScript.js"></script>
  <!-- link your own css here -->
</head>
<body>
<?php include ('include/header.php');?>
<?php include ('include/dynamicCarouselFunctions.php');?> 
  <!-- content here -->
  <div class="container-fluid">
		
		<!-- category nav bar add link with query string-->
    <!-- add a link named All category -->
	  <ul class="nav nav-tabs">
      <li><a href="listings.php?category=All"><span class="glyphicon glyphicon-hand-right"></span> All category</a></li>
      <li><a href="listings.php?category=Vehicle"><span class="glyphicon glyphicon-hand-right"></span> Vehicle</a></li>
      <li><a href="listings.php?category=Pet"><span class="glyphicon glyphicon-hand-right"></span> Pet</a></li>
      <li><a href="listings.php?category=Book"><span class="glyphicon glyphicon-hand-right"></span> Book</a></li>
      <li><a href="listings.php?category=Phone"><span class="glyphicon glyphicon-hand-right"></span> Phone</a></li>
      <li><a href="listings.php?category=Computer"><span class="glyphicon glyphicon-hand-right"></span> Computer</a></li>
      <li><a href="listings.php?category=Instrument"><span class="glyphicon glyphicon-hand-right"></span> Instrument</a></li>
      <li><a href="listings.php?category=Bike"><span class="glyphicon glyphicon-hand-right"></span> Bike</a></li>
      <li><a href="listings.php?category=TV"><span class="glyphicon glyphicon-hand-right"></span> TV</a></li>
    </ul>
   <!--  //menu list end -->
    </br></br></br>
   <!-- Images gallery  -->
	<h1>Popular items</h1>
    <div class="row">
        <div id="dynamic_slide_show" class="carousel slide col-9" data-ride="carousel">
          <!--  indicator dot nov  -->
          <ol class="carousel-indicators">
            <?php echo make_slide_indicators(); ?>
          </ol>
          <!--  wrapper for slides  -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <?php echo make_slides(); ?>
            </div>
            <div class="item">
              <?php echo make_slides2(); ?>
            </div>
          </div>
          <!--  controls or next and pre buttons  -->
          <a class="left carousel-control" href="#dynamic_slide_show" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#dynamic_slide_show" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>      
      </div>

	<!-- categories with icon -->
  <!-- CHANG ALL LINK , then the link along with category -->
    <!-- first row -->
    <div class="container">
      <div class="row">
        <!-- car icon -->
        <div class="col-sm-3" style="text-align: center;">
          <a href="listings.php?category=Vehicle">
            <li class="fa fa-car"></li>
            <p class="item-category">Vehicle</p>
          </a>
        </div>
        <!-- pets -->
       <div class="col-sm-3" style="text-align: center;">
        <a href="listings.php?category=Pet">
          <li class="fa fa-paw"></li>
          <p class="item-category">Pet</p>
        </a>
      </div>
      <!-- book -->
       <div class="col-sm-3" style="text-align: center;">
        <a href="listings.php?category=Book">
          <li class="fa fa-book"></li>
          <p class="item-category">Book</p>
        </a>
      </div>
      <!-- phone -->
       <div class="col-sm-3" style="text-align: center;">
        <a href="listings.php?category=Phone">
          <li class="fa fa-mobile"></li>
          <p class="item-category">Phone</p>
        </a>
      </div>

      </div>
    </div><br><br>
    <!--// first row -->

    <!-- second row -->
    <div class="container">

      <div class="row">
        <!-- computer icon -->
        <div class="col-sm-3" style="text-align: center;">
          <a href="listings.php?category=computer">
            <li class="fa fa-desktop"></li>
            <p class="item-category">computer</p>
          </a>
        </div>
        <!-- clothe icon -->
        <div class="col-sm-3" style="text-align: center;">
         <a href="listings.php?category=instrument">
           <li class="fa fa-music"></li>
           <p class="item-category">instrument</p>
         </a>
       </div>
       <!-- bike icon 20171002 yang-->
        <div class="col-sm-3" style="text-align: center;">
         <a href="listings.php?category=bike">
           <li class="fa fa-bicycle"></li>
           <p class="item-category">bike</p>
         </a>
       </div>
      <!-- TV 20171002 YANG -->
       <div class="col-sm-3" style="text-align: center;">
        <a href="listings.php?category=TV">
          <li class="fa fa-television"></li>
          <p class="item-category">TV</p>
        </a>
       </div>

      </div>
    </div><br>
    <!-- second row -->








  </br></br></br></br>

  </div>


<?php include ('include/footer.php');?>

</body>
</html>
