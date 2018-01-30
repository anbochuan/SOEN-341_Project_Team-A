<!-- reference: w3c school online store theme -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Listings</title>
  <?php include('include/dbConnector2.php'); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- link your own css here -->
  <link rel="stylesheet" type="text/css" href="StyleSheet/index.css">
  <link rel="stylesheet" type="text/css" href="StyleSheet/listings.css">
  <script src="myScript/myScript.js"></script>
</head>
<body>
  <?php include('include/header.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <!-- side bar -->
      <!-- dynamic change side bar -->
      <!-- all item categorys EXAMPLE two level hierarchy -->
      <?php
        $_SESSION['previous_page'] = "listingsphp";
        $category = (isset($_GET['category'])) ? $_GET['category'] : "No" ;  // get the hierarchical categories that user clicked
        $subcategory = (isset($_GET['subcategory'])) ? $_GET['subcategory'] : " ";
        $ssubcategory = (isset($_GET['ssubcategory'])) ? $_GET['ssubcategory'] : " ";
        // may be have more variable for location and price
        // query code...
      ?>
	  <?php 
	 	if(isset($_GET['search'])) // get the searching information
	    {
	    	$item = $_GET['item'];
	    	$Ads = $_GET['Ads'];
	    	$city = $_GET['city'];
	    }
	  ?>
      <?php
          $items = array('Vehicle'=>array(
                                  'Sedan'=>array('BMW','Adui','Volvo','Toyota','Honda','Ford','Nissan'),
                                  'SUV'=>array('Porsche','LandRover','Audi','BMW','Volvo',),
                                  'Pickup Truck'=>array('Dodge RAM','Ford','Toyota Titan'),
                                  'Van'=>array('Dodge Caravan','Nissan Sentra','Honda Odyssey')),
                       'Pet' => array(
                                'Dog' => array('pug','chihuahua','yorkshire'),
                                'Bird' => array('perroquet','canari','cockatiel'),
                                'Cat' => array('bengal','persian')),
                       'Book' => array(
                                'Textbook' => array('Accounting','Computer','History','Nursing'),
                                'Cookbook' => array('Baking','Meals','Quick and Easy'),
                                'Fiction' => array('Fantasy','Science Fiction','Gaming'),
                                'Dictionary' => array('English-English','English-Chinese','French-Chinese')),
                       'Phone' => array(
                                 'Telephone' => array('Samsung','LG'),
                                 'Smart phone' => array('Iphone','Samsung','Nokia','Black Berry')),
                       'Bike'=>array(
                              'Bike in road'=>array('Felt VR30','Felt Z6 Disc','Devinci Leo SL'),
                              'Bike in mountain'=>array('Devinci Troy','Rock Mountain Pipeline','Giant Iguana')),
                       'Instrument'=>array(
                                    'Guitars'=>array('Electric Guitar','Acoustic Guitar','Base Guitar'),
                                    'Piano'=>array('Classic Piano','Electric Piano','Mute Piano'),
                                    'Drum'=>array('Jazz Drum','Electric Drum','Classic Drum')),
                       'Computer'=>array(
                                    'Desk Computer'=>array('Dell','HP','Lenovo'),
                                    'Laptop'=>array('Macbook Pro','Macbook Air','Thinkpad')),
                        'TV'=>array(
                              'LED'=>array('SONY','SHARP','SAMSUNG'),
                              '4K UHD'=>array('SONY','SHARP','SAMSUNG')),
                      );
       ?>
     <div class="col-sm-3 sidenav">
          <!-- dynamic category -->
        <div class="well text-left leftsidebar" >
          <!-- content in sidevar will change base on which category user click in index page-->
          <?php foreach ($items as $multiArr => $sub) { ?>
            <?php if($category==$multiArr){ ?>
            <h4><a href="listings.php?category=<?php echo $multiArr?>"><?php echo $multiArr?></a></h4>
              <?php foreach ($sub as $key => $value) {?>
                <li class="list-group-item">
                  <a href="listings.php?category=<?php echo str_replace (" ", "", $multiArr)?>&subcategory=<?php echo str_replace (" ", "", $key)?>" style="color:black"><?php echo $key?></a>
                  <?php foreach ($value as $k => $v) { ?>
                    <ul style="list-style:none">
                        <li><a href="listings.php?category=<?php echo str_replace (" ", "", $multiArr)?>&subcategory=<?php echo str_replace (" ", "", $key)?>&ssubcategory=<?php echo str_replace (" ", "", $v)?>"><?php echo $v?></a></li>
                    </ul>
                  <?php  }?>
                </li>
              <?php } ?>
            <?php } ?>
          <?php } ?>
          <!-- display all category if user want to see all category -->
          <?php if ($category=='All' || $category=='No') { ?>
                <ul class="list-group">
                  <li class="list-group-item"><h4><a href="listings.php?category=Vehicle">Vehicle</a></h4></li>
                  <li class="list-group-item"><h4><a href="listings.php?category=Pet">Pet</a></h4></li>
                  <li class="list-group-item"><h4><a href="listings.php?category=Book">Book</a></h4></li>
                  <li class="list-group-item"><h4><a href="listings.php?category=Phone">Phone</a></h4></li>
                  <li class="list-group-item"><h4><a href="listings.php?category=Computer">Computer</a></h4></li>
                  <li class="list-group-item"><h4><a href="listings.php?category=Instrument">Instrument</a></h4></li>
                  <li class="list-group-item"><h4><a href="listings.php?category=Bike">Bike</a></h4></li>
                  <li class="list-group-item"><h4><a href="listings.php?category=TV">TV</a></h4></li>
                </ul>
          <?php } ?>
        </div>
        <!-- search base on location  not implement  yet   -->
        <div class="well text-center" > <!-- Distance range slider     -->
          <!-- <form class="" action="listings.php?category=car" method=""> -->
            <div id="slidecontainer" >
              <input class="slider" id="myRange1" name="distance" type="range" value="50" min="0" max="500" oninput="dragMe1()" />
                <p>Distance: <span id="range1">50 km</span></p>
                <!-- <input type="submit"> -->
            </div>
          <!-- </form> -->
        </div>
        <!-- search base on budget not implement yet  -->
        <div class="well text-center" > <!-- Budget range slider     -->
          <div id="slidecontainer" >
            <input class="slider" id="myRange2" type="range" value="100" min="0" max="50000" step="10" oninput="dragMe2()" />
              <p>Budget: <span id="range2">100 CAD</span></p>
          </div>
        </div>
      </div>

 
      <!-- //side bar end -->
      <!-- list part -->

      <?php   //------------------------------------------------------------ multiple pages ---------------------------------------------------------------
        $results_per_page = 3; // display 2 items in each page
        if(isset($_GET['page']))
        {
          $page = $_GET['page']; // get page number
        }
        else
        {
          $page = 1;  // if it is the first time, set the page number equal to 1
        }
        $start_from = ($page - 1) * $results_per_page ; // each time the start point in database
        //--------------------------------------------------------------------------------------------------------------------------------------------
      ?>  
   	<div class="col-sm-9 text-left">
  		<div class="list-group">
          <!-- sorted by -->
          <div class="well text-right topBar"><span> </span>
            <form action="listings.php" name="sortBy" method="get">
              <div class="sort"> <kbd>Sort by</kbd>
                <select class="selectpicker"  name="sortBy"> 
                <option value="dateAsc">Posted: oldest first</option>
                <option value="dateDesc" selected="selected">Posted: newest first</option>
                <option value="priceAsc">Price: from lowest to highest</option>
                <option value="priceDesc">Price: from highest to lowest</option>
                </select>
                <?php  
                	if(isset($_GET['search'])) // protect our data not be wipped out when reloading the page
                	{
                		echo(" <input type='hidden' name='item' value='" .$_GET['item']. "'>
			                   <input type='hidden' name='Ads' value='" .$_GET['Ads']. "'>
			                   <input type='hidden' name='city' value='" .$_GET['city']. "'>  
				               <input type='hidden' name='search' value='" .$_GET['search']. "'> ");
                	}
                	if (isset($_GET['category']))  // protect our data not be wipped out when reloading the page
                	{
                	 	echo(" <input type='hidden' name='category' value='" .$_GET['category']. "'> ");
                	}
                	if (isset($_GET['subcategory']))  // protect our data not be wipped out when reloading the page
                	{
                		echo(" <input type='hidden' name='category' value='" .$_GET['category']. "'>
			                   <input type='hidden' name='subcategory' value='" .$_GET['subcategory']. "'> ");
                	}
                	if (isset($_GET['ssubcategory']))  // protect our data not be wipped out when reloading the page
                	{
                	 	echo(" <input type='hidden' name='category' value='" .$_GET['category']. "'>
			                   <input type='hidden' name='subcategory' value='" .$_GET['subcategory']. "'>
			                   <input type='hidden' name='ssubcategory' value='" .$_GET['ssubcategory']. "'> ");
                	}
                  
        
                ?>
                
	            <button class="btn btn-success btn-xs" type="submit" name="sortBasedOn">
	            	<i class="glyphicon glyphicon-filter"></i>
	            </button>         
              </div>
            </form>
          </div>
        <?php   //------------------------------------------- Search Bar function ------------------------------------------
		    if(isset($_GET['search']))  // if user want to search based on the keywords
		    {
          $startTime = microtime(true); // implement the query processing time display on the web page
          if($_GET['Ads'] == "All")
          {
            if(isset($_GET['sortBasedOn']))
            {
              $sortingRequirement = $_GET['sortBy'];
              if($sortingRequirement == 'dateAsc')
              {
                $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId WHERE (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY timeStamp ASC LIMIT $start_from, $results_per_page ");
              }
              if($sortingRequirement == 'dateDesc')
              {
                $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId WHERE (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY timeStamp DESC LIMIT $start_from, $results_per_page ");
              }
              if($sortingRequirement == 'priceAsc')
              {
                $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId WHERE (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY Price ASC LIMIT $start_from, $results_per_page ");
              }
              if($sortingRequirement == 'priceDesc')
              {
                $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId WHERE (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY Price DESC LIMIT $start_from, $results_per_page ");
              }
            }
            else
            {
              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId WHERE (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY ProductId ASC LIMIT $start_from, $results_per_page ");
            }
            $count = $db->query("SELECT count(*) FROM product INNER JOIN user ON product.UserId = user.UserId WHERE (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') "); // get the number of total items by counting the size of array
          }
          else
          {
            if(isset($_GET['sortBasedOn']))  // if user want to sort based on the searching results
            {
              $sortingRequirement = $_GET['sortBy'];
              if($sortingRequirement == 'dateAsc')
              {
                $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName ='$Ads' AND (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY timeStamp ASC LIMIT $start_from, $results_per_page ");
              }
              if($sortingRequirement == 'dateDesc')
              {
                $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName ='$Ads' AND (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY timeStamp DESC LIMIT $start_from, $results_per_page ");
              }
              if($sortingRequirement == 'priceAsc')
              {
                $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName ='$Ads' AND (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY Price ASC LIMIT $start_from, $results_per_page ");
              }
              if($sortingRequirement == 'priceDesc')
              {
                $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName ='$Ads' AND (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY Price DESC LIMIT $start_from, $results_per_page ");
              }
            }
            else
            {
               $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName ='$Ads' AND (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ORDER BY ProductId ASC LIMIT $start_from, $results_per_page ");
            }

            $count = $db->query("SELECT count(*) FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName ='$Ads' AND (CityName = '$city' OR Province = '$city') AND (ProductDetail LIKE '%{$item}%' OR ProductName LIKE '%{$item}%') ");  // get the number of total items by counting the size of array

          }
          $endTime = microtime(true);  // implement the query processing time display on the web page
          if($startTime != null && $endTime != null) 
          {
            echo ("return results in ".(number_format((($endTime-$startTime)),4)." seconds")); 
          }
          //--------------------------------------------------------------------- mutiple pages -------------------------------------------------------------------- 
          $row = $resultArray->fetchAll(\PDO::FETCH_ASSOC);
          $counter = $count->fetch(\PDO::FETCH_ASSOC);
          $total = $counter['count(*)']; // get the number of total items by counting the size of array
          $total_pages = ceil($total/$results_per_page); //total pages

           
          //---------------------------------------------------------------------------------------------------------------------------------------------------------
		  
		      foreach($row as $eachRow)
		      {
		        echo "<a href=\"item.php?ad=".$eachRow['ProductId']." class=\"list-group-item\">
		              <div class=\"row\">
		                <div class=\"col-sm-3\">
		                  <img src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"200\" height=\"200\">
		                </div>
		                <div class=\"col-sm-9\">
		                  <div>
		                    <h3 style=\"font-weight: bold;\">".$eachRow['ProductName']."</h3>
		                  </div>
		                  <div class=\"pull-right\" style=\"color: #27a34a\" >
		                    <h4><span class=\"glyphicon glyphicon-usd\">".$eachRow['Price']."</span></h4>
		                  </div>
		                  <div class=\"\">
		                    ".$eachRow['CityName']." <span class=\"glyphicon glyphicon-time\"></span>"
		                    .$eachRow['timeStamp']."
		                  </div><br>
		                  <div>
		                    <p style=\"color:#1f0935;font-weight:bold;\">
		                      ".$eachRow['ProductDetail']."
		                    </p>
		                  </div>
		                </div>
		              </div><hr>
		            </a>";  
		      }
		    }
		  ?>

			<?php
		      
		      if(isset($_GET['category']) && isset($_GET['subcategory']) && isset($_GET['ssubcategory'])) // if three layers of the categories have been clicked
		      {
		        if(isset($_GET['sortBasedOn'])) // if user want to sort
		        {
		          $sortingRequirement = $_GET['sortBy']; 
		          if($sortingRequirement == 'dateAsc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId INNER JOIN productCategory3 ON product.ProductCategory3 = productCategory3.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' AND subSubCategoryName= '{$_GET['ssubcategory']}' ORDER BY timeStamp ASC LIMIT $start_from, $results_per_page");
		          }
		          if($sortingRequirement == 'dateDesc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId INNER JOIN productCategory3 ON product.ProductCategory3 = productCategory3.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' AND subSubCategoryName= '{$_GET['ssubcategory']}' ORDER BY timeStamp DESC LIMIT $start_from, $results_per_page");
		          }
		          if($sortingRequirement == 'priceDesc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId INNER JOIN productCategory3 ON product.ProductCategory3 = productCategory3.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' AND subSubCategoryName= '{$_GET['ssubcategory']}' ORDER BY Price DESC LIMIT $start_from, $results_per_page");
		          }
		          if($sortingRequirement == 'priceAsc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId INNER JOIN productCategory3 ON product.ProductCategory3 = productCategory3.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' AND subSubCategoryName= '{$_GET['ssubcategory']}' ORDER BY Price ASC LIMIT $start_from, $results_per_page");
		          }
		        }
		        else // if user do not want to sort, just randomly display everyting order by ProductId
		        {
		          $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId INNER JOIN productCategory3 ON product.ProductCategory3 = productCategory3.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' AND subSubCategoryName= '{$_GET['ssubcategory']}' ORDER BY ProductId ASC LIMIT $start_from, $results_per_page");
		        }

            $count = $db->query("SELECT count(*) FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId INNER JOIN productCategory3 ON product.ProductCategory3 = productCategory3.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' AND subSubCategoryName= '{$_GET['ssubcategory']}' "); // get the number of total items by counting the size of array
            //--------------------------------------------------------------------- mutiple pages -------------------------------------------------------------------- 
            
            $row = $resultArray->fetchAll(\PDO::FETCH_ASSOC);
            $counter = $count->fetch(\PDO::FETCH_ASSOC);
            $total = $counter['count(*)']; // get the number of total items by counting the size of array
            $total_pages = ceil($total/$results_per_page); //total pages

            //---------------------------------------------------------------------------------------------------------------------------------------------------------
		        foreach($row as $eachRow)
		        {
		            echo "<a href=\"item.php?ad=".$eachRow['ProductId']." class=\"list-group-item\">
		              <div class=\"row\">
		                <div class=\"col-sm-3\">
		                  <img src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"200\" height=\"200\">
		                </div>
		                <div class=\"col-sm-9\">
		                  <div>
		                    <h3 style=\"font-weight: bold;\">".$eachRow['ProductName']."</h3>
		                  </div>
		                  <div class=\"pull-right\" style=\"color: #27a34a\" >
		                    <h4><span class=\"glyphicon glyphicon-usd\">".$eachRow['Price']."</span></h4>
		                  </div>
		                  <div class=\"\">
		                    ".$eachRow['CityName']." <span class=\"glyphicon glyphicon-time\"></span>"
		                    .$eachRow['timeStamp']."
		                  </div><br>
		                  <div>
		                    <p style=\"color:#1f0935;font-weight:bold;\">
		                      ".$eachRow['ProductDetail']."
		                    </p>
		                  </div>
		                </div>
		              </div><hr>
		            </a>";
	       
		        }
		      }
		    
		      if(isset($_GET['category']) && isset($_GET['subcategory']) && !isset($_GET['ssubcategory'])) // if two layers of the categories have been clicked
		      {
		        if(isset($_GET['sortBasedOn'])) // if user want to sort
		        {
		          $sortingRequirement = $_GET['sortBy']; 
		          if($sortingRequirement == 'dateAsc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' ORDER BY timeStamp ASC LIMIT $start_from, $results_per_page");
		          }
		          if($sortingRequirement == 'dateDesc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' ORDER BY timeStamp DESC LIMIT $start_from, $results_per_page");
		          }
		          if($sortingRequirement == 'priceDesc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' ORDER BY Price DESC LIMIT $start_from, $results_per_page");
		          }
		          if($sortingRequirement == 'priceAsc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' ORDER BY Price ASC LIMIT $start_from, $results_per_page");
		          }
		        }
		        else  // if user do not want to sort, just randomly display everyting order by ProductId
		        {
		          $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' ORDER BY ProductId ASC LIMIT $start_from, $results_per_page");
		        }

		        $count = $db->query("SELECT count(*) FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId INNER JOIN productCategory2 ON product.ProductCategory2 = productCategory2.productCatId WHERE categoryName = '{$_GET['category']}' AND subCategoryName= '{$_GET['subcategory']}' "); // get the number of total items by counting the size of array
            //--------------------------------------------------------------------- mutiple pages -------------------------------------------------------------------- 
            
            $row = $resultArray->fetchAll(\PDO::FETCH_ASSOC);
            $counter = $count->fetch(\PDO::FETCH_ASSOC);
            $total = $counter['count(*)']; // get the number of total items by counting the size of array
            $total_pages = ceil($total/$results_per_page); //total pages

             
            //---------------------------------------------------------------------------------------------------------------------------------------------------------
		        foreach($row as $eachRow)
		        {
		          echo "<a href=\"item.php?ad=".$eachRow['ProductId']." class=\"list-group-item\">
		            <div class=\"row\">
		              <div class=\"col-sm-3\">
		                <img src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"200\" height=\"200\">
		              </div>
		              <div class=\"col-sm-9\">
		                <div>
		                  <h3 style=\"font-weight: bold;\">".$eachRow['ProductName']."</h3>
		                </div>
		                <div class=\"pull-right\" style=\"color: #27a34a\" >
		                  <h4><span class=\"glyphicon glyphicon-usd\">".$eachRow['Price']."</span></h4>
		                </div>
		                <div class=\"\">
		                  ".$eachRow['CityName']." <span class=\"glyphicon glyphicon-time\"></span>"
		                  .$eachRow['timeStamp']."
		                </div><br>
		                <div>
		                  <p style=\"color:#1f0935;font-weight:bold;\">
		                    ".$eachRow['ProductDetail']."
		                  </p>
		                </div>
		              </div>
		            </div><hr>
		          </a>";

		       
		        }
		      }
		      
		      if(isset($_GET['category']) && !isset($_GET['subcategory']) && !isset($_GET['ssubcategory']))  // if user only click the outer most category, either "All categories" or any one of the outer most category
		      {
		        if($_GET['category'] == "All") // By clicking "All categories" button
		        {
		          if(isset($_GET['sortBasedOn']))  // if user want to sort
		          {
		            $sortingRequirement = $_GET['sortBy'];
		            if($sortingRequirement == 'dateAsc')
		            {
		              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY timeStamp ASC LIMIT $start_from, $results_per_page");
		            }
		            if($sortingRequirement == 'dateDesc')
		            {
		              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY timeStamp DESC LIMIT $start_from, $results_per_page");
		            }
		            if($sortingRequirement == 'priceDesc')
		            {
		              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY Price DESC LIMIT $start_from, $results_per_page");
		            }
		            if($sortingRequirement == 'priceAsc')
		            {
		              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY Price ASC LIMIT $start_from, $results_per_page");
		            }
		          }
		          else // if user do not want to sort, just randomly display everyting order by ProductId
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY ProductId ASC LIMIT $start_from, $results_per_page");
		          }

              	  $count = $db->query("SELECT count(*) FROM product INNER JOIN user ON product.UserId = user.UserId "); // get the number of total items by counting the size of array
		        }

		        else// if user only click the outer most category
		        {
		          if(isset($_GET['sortBasedOn']))  // if user want to sort
		          {
		            $sortingRequirement = $_GET['sortBy'];
		            if($sortingRequirement == 'dateAsc')
		            {
		              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName = '{$_GET['category']}' AND ORDER BY timeStamp ASC LIMIT $start_from, $results_per_page");
		            }
		            if($sortingRequirement == 'dateDesc')
		            {
		              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName = '{$_GET['category']}' ORDER BY timeStamp DESC LIMIT $start_from, $results_per_page");
		            }
		            if($sortingRequirement == 'priceDesc')
		            {
		              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName = '{$_GET['category']}' ORDER BY Price DESC LIMIT $start_from, $results_per_page");
		            }
		            if($sortingRequirement == 'priceAsc')
		            {
		              $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName = '{$_GET['category']}' ORDER BY Price ASC LIMIT $start_from, $results_per_page");
		            }
		          }
		          else  // if user do not want to sort, just randomly display everyting order by ProductId
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName = '{$_GET['category']}' ORDER BY ProductId ASC LIMIT $start_from, $results_per_page");
		          }
		         
		          $count = $db->query("SELECT count(*) FROM product INNER JOIN user ON product.UserId = user.UserId INNER JOIN productCategory ON product.ProductCategory = productCategory.productCatId WHERE categoryName = '{$_GET['category']}' "); // get the number of total items by counting the size of array
		        }
            	
	            //--------------------------------------------------------------------- mutiple pages -------------------------------------------------------------------- 
	            
	            $row = $resultArray->fetchAll(\PDO::FETCH_ASSOC);
	            $counter = $count->fetch(\PDO::FETCH_ASSOC);
	            $total = $counter['count(*)']; // get the number of total items by counting the size of array
	            $total_pages = ceil($total/$results_per_page); //total pages

	             
	            //---------------------------------------------------------------------------------------------------------------------------------------------------------
		        foreach($row as $eachRow)
		        {
		           echo "<a href=\"item.php?ad=".$eachRow['ProductId']." class=\"list-group-item\">
		                <div class=\"row\">
		                  <div class=\"col-sm-3\">
		                    <img src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"200\" height=\"200\">
		                  </div>
		                  <div class=\"col-sm-9\">
		                    <div>
		                      <h3 style=\"font-weight: bold;\">".$eachRow['ProductName']."</h3>
		                    </div>
		                    <div class=\"pull-right\" style=\"color: #27a34a\" >
		                      <h4><span class=\"glyphicon glyphicon-usd\">".$eachRow['Price']."</span></h4>
		                    </div>
		                    <div class=\"\">
		                      ".$eachRow['CityName']." <span class=\"glyphicon glyphicon-time\"></span>"
		                      .$eachRow['timeStamp']."
		                    </div><br>
		                    <div>
		                      <p style=\"color:#1f0935;font-weight:bold;\">
		                        ".$eachRow['ProductDetail']."
		                      </p>
		                    </div>
		                  </div>
		                </div><hr>
		              </a>";
		        }


		      }

		      if(!isset($_GET['search']) && !isset($_GET['category']))// directly open listings.php page
		      {     
		                                                    
		        if(isset($_GET['sortBasedOn'])) // if user want to sort
		        {
		          $sortingRequirement = $_GET['sortBy']; 
		          //echo $sortingRequirement ; 
		         
		          if($sortingRequirement == 'dateAsc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY timeStamp ASC LIMIT $start_from, $results_per_page"); // each time select 3 items based on the ProductId from db
		          }
		          if($sortingRequirement == 'dateDesc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY timeStamp DESC LIMIT $start_from, $results_per_page"); // each time select 3 items based on the ProductId from db
		          }
		          if($sortingRequirement == 'priceDesc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY Price DESC LIMIT $start_from, $results_per_page"); // each time select 3 items based on the ProductId from db
		          }
		          if($sortingRequirement == 'priceAsc')
		          {
		            $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY Price ASC LIMIT $start_from, $results_per_page"); // each time select 3 items based on the ProductId from db
		          }
		            $count = $db->query("SELECT count(*) FROM product"); // get the number of total items by counting the size of array 
		        }
		      
		        else  // if not,  just randomly display everyting order by ProductId
		        {
		          $resultArray = $db->query("SELECT * FROM product INNER JOIN user ON product.UserId = user.UserId ORDER BY ProductId ASC LIMIT $start_from, $results_per_page"); // each time select 3 items based on the ProductId from db
              	  $count = $db->query("SELECT count(*) FROM product"); // get the number of total items by counting the size of array
		        }
	            //--------------------------------------------------------------------- mutiple pages -------------------------------------------------------------------- 
	            
	            $row = $resultArray->fetchAll(\PDO::FETCH_ASSOC);
	            $counter = $count->fetch(\PDO::FETCH_ASSOC);
	            $total = $counter['count(*)']; // get the number of total items by counting the size of array
	            $total_pages = ceil($total/$results_per_page); //total pages

	             
	            //---------------------------------------------------------------------------------------------------------------------------------------------------------
		        foreach($row as $eachRow)
		        {
		 
		            echo "<a href=\"item.php?ad=".$eachRow['ProductId']." class=\"list-group-item\">
		                <div class=\"row\">
		                  <div class=\"col-sm-3\">
		                    <img src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"200\" height=\"200\">
		                  </div>
		                  <div class=\"col-sm-9\">
		                    <div>
		                      <h3 style=\"font-weight: bold;\">".$eachRow['ProductName']."</h3>
		                    </div>
		                    <div class=\"pull-right\" style=\"color: #27a34a\" >
		                      <h4><span class=\"glyphicon glyphicon-usd\">".$eachRow['Price']."</span></h4>
		                    </div>
		                    <div class=\"\">
		                      ".$eachRow['CityName']." <span class=\"glyphicon glyphicon-time\"></span>"
		                      .$eachRow['timeStamp']."
		                    </div><br>
		                    <div>
		                      <p style=\"color:#1f0935;font-weight:bold;\">
		                        ".$eachRow['ProductDetail']."
		                      </p>
		                    </div>
		                  </div>
		                </div><hr>
		              </a>";
		        }
		      }  
		    ?>
          <!-- //end item  -->

  		  </div>
	   </div>
    </div>
 </div>
  <br><br>
  <!--multiple pages -->
  <div>
    <ul class="pager">
    <li></li>
      <ul class="pagination pagination-sm">
        <?php 
          for($i=1; $i<=$total_pages; $i++)
          {
            if(isset($_GET['sortBasedOn']) && !isset($_GET['search']) && !isset($_GET['category']))
            {
              echo "<li><a href='listings.php?page=".$i."&sortBy=".$_GET['sortBy']."&sortBasedOn=".$_GET['sortBasedOn']."'";
              
            }
            else if(isset($_GET['search']) && !isset($_GET['sortBasedOn']))
            {
              echo "<li><a href='listings.php?page=".$i."&item=".$_GET['item']."&Ads=".$_GET['Ads']."&city=".$_GET['city']."&search=".$_GET['search']."'";
            }
            else if(isset($_GET['search']) && isset($_GET['sortBasedOn']))
            {
              echo "<li><a href='listings.php?page=".$i."&sortBy=".$_GET['sortBy']."&sortBasedOn=".$_GET['sortBasedOn']."&item=".$_GET['item']."&Ads=".$_GET['Ads']."&city=".$_GET['city']."&search=".$_GET['search']."'";
            }
            else if (!isset($_GET['search']) && isset($_GET['category']) && !isset($_GET['subcategory']) && !isset($_GET['ssubcategory']) && !isset($_GET['sortBasedOn']))
            {
              echo "<li><a href='listings.php?page=".$i."&category=".$_GET['category']."'";
            }
            else if (!isset($_GET['search']) && isset($_GET['category']) && !isset($_GET['subcategory']) && !isset($_GET['ssubcategory']) && isset($_GET['sortBasedOn']))
            {
              echo "<li><a href='listings.php?page=".$i."&category=".$_GET['category']."&sortBy=".$_GET['sortBy']."&sortBasedOn=".$_GET['sortBasedOn']."'";
            }
            else if (!isset($_GET['search']) && isset($_GET['subcategory']) && !isset($_GET['ssubcategory']) && !isset($_GET['sortBasedOn']))
            {
              echo "<li><a href='listings.php?page=".$i."&category=".$_GET['category']."&subcategory=".$_GET['subcategory']."'";
            }
            else if (!isset($_GET['search']) && isset($_GET['subcategory']) && !isset($_GET['ssubcategory']) && isset($_GET['sortBasedOn']))
            {
              echo "<li><a href='listings.php?page=".$i."&category=".$_GET['category']."&subcategory=".$_GET['subcategory']."&sortBy=".$_GET['sortBy']."&sortBasedOn=".$_GET['sortBasedOn']."'";
            }
            else if (!isset($_GET['search']) && isset($_GET['ssubcategory']) && !isset($_GET['sortBasedOn']))
            {
              echo "<li><a href='listings.php?page=".$i."&category=".$_GET['category']."&subcategory=".$_GET['subcategory']."&ssubcategory=".$_GET['ssubcategory']."'";
            }
            else if (!isset($_GET['search']) && isset($_GET['ssubcategory']) && isset($_GET['sortBasedOn']))
            {
              echo "<li><a href='listings.php?page=".$i."&category=".$_GET['category']."&subcategory=".$_GET['subcategory']."&ssubcategory=".$_GET['ssubcategory']."&sortBy=".$_GET['sortBy']."&sortBasedOn=".$_GET['sortBasedOn']."'";
            }

            else
            {
              echo"<li><a href='listings.php?page=".$i."'";
            }
           

            echo ">".$i."</a></li>";
          }
        ?>
      
        
    
      </ul>
    <li></li>
  </ul>
  </div>
  <?php include('include/footer.php') ;?>
</body>
</html>