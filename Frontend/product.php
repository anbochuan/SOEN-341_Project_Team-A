<!-- reference: w3c school online store theme -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Product To Sell
    </title>
    <?php include('include/dbConnector.php'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link your own css here -->
    <link rel="stylesheet" type="text/css" href="StyleSheet/index.css">
    <!-- <script src="myScript/postAd.js"></script> -->
    <!-- <script src="myScript/category_ajax.js"></script> -->
    <script src="myScript/jquery_json.js"></script>
  </head>
  <body>
    <?php include('include/header.php'); ?>

    <div class="container">
      <form action="include/addItemToDB.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="productName">Product Name :</label>
          <input type="text" class="form-control" placeholder="Please enter the item name..." name="productName" required/>
        </div>
        <hr>
        <div class="form-group">
          <label for="productDetail">Product Detail :</label>
          <textarea name="text" class="form-control" placeholder="Please make a brief description of the item..." required></textarea>
        </div>
        <hr>
        <div class="form-group">
          <label for="price">Product Price :</label>
          <input type="text" class="form-control" placeholder="Please enter the item price..." name="price" required/>
        </div>
        <hr>
        <div class="form-group" id="level1">
          <label>Product Category Level 1 :</label>
		      <select data-style="btn-info" name="productCategory" id="productCategory" required>
          	<option value="">Please choose one category</option>
            <!-- <option value="Vehicle">Vehicle</option>
            <option value="Pet">Pet</option>
            <option value="Book">Book</option>
            <option value="Phone">Phone</option>
            <option value="Computer">Computer</option>
            <option value="Instrument">Instrument</option>
            <option value="Bike">Bike</option>
            <option value="TV">TV</option> -->
        	</select>
        </div>
        <div class="form-group" id="level2">
          <label>Product Category Level 2 :</label>
          <select data-style="btn-info" name="productCategory2" id="productCategory2">
           
              <option value="">Please choose one subCategory</option>
           
           <!--  <optgroup label="Vehicle" id="Vehicle">
              <option value="Sedan">Sedan</option>
              <option value="SUV">SUV</option>
              <option value="Pickup Truck">Pickup Truck</option>
              <option value="Van">Van</option>
            </optgroup>
            <optgroup label="Pet" id="Pet">
              <option value="Dog">Dog</option>
              <option value="Bird">Bird</option>
              <option value="Cat">Cat</option>
            </optgroup>
            <optgroup label="Book" id="Book">
              <option value="Textbook">Textbook</option>
              <option value="Cookbook">Cookbook</option>
              <option value="Fiction">Fiction</option>
              <option value="Dictionary">Dictionary</option>
            </optgroup>
            <optgroup label="Phone" id="Phone">
              <option value="Telephone">Telephone</option>
              <option value="Smart phone">Smart phone</option>
            </optgroup>
            <optgroup label="Computer" id="Computer">
              <option value="Desk Computer">Desk Computer</option>
              <option value="Laptop">Laptop</option>
            </optgroup>
            <optgroup label="Instrument" id="Instrument">
              <option value="Guitars">Guitars</option>
              <option value="Piano">Piano</option>
              <option value="Drum">Drum</option>
            </optgroup>
            <optgroup label="Bike" id="Bike">
              <option value="Bike in road">Bike in road</option>
              <option value="Bike in mountain">Bike in mountain</option>
            </optgroup>
            <optgroup label="TV" id="TV">
              <option value="LED">LED</option>
              <option value="4K UHD">4K UHD</option>
            </optgroup> -->
          </select>
        </div>
        <div class="form-group" id="level3">
          <label>Product Category Level 3 :</label>
          <select data-style="btn-info" name="productCategory3" id="productCategory3">
            
            <option value="">Please choose one Sub-subCategory</option>
           
           <!--  <optgroup label="Sedan" id="Sedan">
              <option value="BMW">BMW</option>
              <option value="Adui">Adui</option>
              <option value="Volvo">Volvo</option>
              <option value="Toyota">Toyota</option>
              <option value="Honda">Honda</option>
              <option value="Ford">Ford</option>
              <option value="Nissan">Nissan</option>
            </optgroup>
            <optgroup label="SUV" id="SUV">
              <option value="Porsche">Porsche</option>
              <option value="LandRover">LandRover</option>
              <option value="Audi">Audi</option>
              <option value="BMW">BMW</option>
              <option value="Volvo">Volvo</option>
              <option value="Ford">Ford</option>
            </optgroup>
            <optgroup label="Pickup Truck" id="Pickup Truck">
              <option value="Dodge RAM">Dodge RAM</option>
              <option value="Ford">Ford</option>
              <option value="Toyota Titan">Toyota Titan</option>
            </optgroup>
            <optgroup label="Van" id="Van">
              <option value="Dodge Caravan">Dodge Caravan</option>
              <option value="Nissan Sentra">Nissan Sentra</option>
              <option value="Honda Odyssey">Honda Odyssey</option>
            </optgroup>
            <optgroup label="Dog" id="Dog">
              <option value="pug">pug</option>
              <option value="chihuahua">chihuahua</option>
              <option value="yorkshire">yorkshire</option>
            </optgroup>
            <optgroup label="Bird" id="Bird">
              <option value="perroquet">perroquet</option>
              <option value="canari">canari</option>
              <option value="cockatiel">cockatiel</option>
            </optgroup>
            <optgroup label="Cat" id="Cat">
              <option value="bengal">bengal</option>
              <option value="persian">persian</option>
            </optgroup>
            <optgroup label="Textbook" id="Textbook">
              <option value="Accounting">Accounting</option>
              <option value="Computer">Computer</option>
              <option value="History">History</option>
              <option value="Nursing">Nursing</option>
            </optgroup>
            <optgroup label="Cookbook" id="Cookbook">
              <option value="Baking">Baking</option>
              <option value="Meals">Meals</option>
              <option value="Quik and Easy">Quik and Easy</option>
            </optgroup>
            <optgroup label="Fiction" id="Fiction">
              <option value="Fantasy">Fantasy</option>
              <option value="Science Fiction">Science Fiction</option>
              <option value="Gaming">Gaming</option>
            </optgroup>
            <optgroup label="Dictionary" id="Dictionary">
              <option value="English-English">English-English</option>
              <option value="English-Chinese">English-Chinese</option>
              <option value="French-Chinese">French-Chinese</option>
            </optgroup>
            <optgroup label="Telephone" id="Telephone">
              <option value="Samsung">Samsung</option>
              <option value="LG">LG</option>
            </optgroup>
            <optgroup label="Smart phone" id="Smart phone">
              <option value="Iphone">Iphone</option>
              <option value="Samsung">Samsung</option>
              <option value="Nokia">Nokia</option>
              <option value="Black Berry">Black Berry</option>
            </optgroup>
            <optgroup label="Desk Computer" id="Desk Computer">
              <option value="Dell">Dell</option>
              <option value="HP">HP</option>
              <option value="Lenovo">Lenovo</option>
            </optgroup>
            <optgroup label="Laptop" id="Laptop">
              <option value="Macbook Pro">Macbook Pro</option>
              <option value="Macbook Air">Macbook Air</option>
              <option value="Thinkpad">Thinkpad</option>
            </optgroup>
            <optgroup label="Guitars" id="Guitars">
              <option value="Electric Guitar">Electric Guitar</option>
              <option value="Acoustic Guitar">Acoustic Guitar</option>
              <option value="Base Guitar">Base Guitar</option>
            </optgroup>
            <optgroup label="Piano" id="Piano">
              <option value="Classic Piano">Classic Piano</option>
              <option value="Electric Piano">Electric Piano</option>
              <option value="Mute Piano">Mute Piano</option>
            </optgroup>
            <optgroup label="Drum" id="Drum">
              <option value="Jazz Drum">Jazz Drum</option>
              <option value="Electric Drum">Electric Drum</option>
              <option value="Classic Drum">Classic Drum</option>
            </optgroup>
            <optgroup label="Bike in road" id="Bike in road">
              <option value="Felt VR30">Felt VR30</option>
              <option value="Felt Z6 Disc">Felt Z6 Disc</option>
              <option value="Devinci Leo SL">Devinci Leo SL</option>
            </optgroup>
            <optgroup label="Bike in mountain" id="Bike in mountain">
              <option value="Devinci Troy">Devinci Troy</option>
              <option value="Rock Mountain Pipeline">Rock Mountain Pipeline</option>
              <option value="Giant Iguana">Giant Iguana</option>
            </optgroup>
            <optgroup label="LED" id="LED">
              <option value="SONY">SONY</option>
              <option value="SHARP">SHARP</option>
              <option value="SAMSUNG">SAMSUNG</option>
            </optgroup>
            <optgroup label="4K UHD" id="4K UHD">
              <option value="SONY">SONY</option>
              <option value="SHARP">SHARP</option>
              <option value="SAMSUNG">SAMSUNG</option>
            </optgroup> -->
          </select>
        </div>
        <hr>
        <div class="form-group">
          <label for="image1">Image 1:
          </label>
          <input type="file" name="Image1" id="fileToUpload1">
        </div>
        <div class="form-group">
          <label for="image1">Image 2:
          </label>
          <input type="file" name="Image2" id="fileToUpload2">
        </div>
        <div class="form-group">
          <label for="image1">Image 3:
          </label>
          <input type="file" name="Image3" id="fileToUpload3">
        </div>
        <div class="form-group">
          <label for="image1">Image 4:
          </label>
          <input type="file" name="Image4" id="fileToUpload4">
        </div>
        <div class="form-group">
          <label for="image1">Image 5:
          </label>
          <input type="file" name="Image5" id="fileToUpload5">
        </div>
        <div class="form-group">
          <label for="image1">Image 6:
          </label>
          <input type="file" name="Image6" id="fileToUpload6">
        </div>
        <div class="form-group">
          <label for="image1">Image 7:
          </label>
          <input type="file" name="Image7" id="fileToUpload7">
        </div>
        <div class="form-group">
          <label for="image1">Image 8:
          </label>
          <input type="file" name="Image8" id="fileToUpload8">
        </div>
        <hr>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </div>
  <!-- //edit file end -->
  </div>
<!-- //tab content end -->
</div>
<!-- //body end -->
<br>
<br>
<?php include('include/footer.php') ;?>
</body>
</html>
