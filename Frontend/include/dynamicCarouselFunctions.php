<?php include('dbConnector.php'); ?>
<?php	
	function make_slide_indicators()
	{
		require 'dbConnector.php';
		$output = ''; 
		$count = 0;
		$result = mysqli_query($conn, "SELECT * FROM product ORDER BY ProductId ASC");
		// $row_cnt = mysqli_num_rows($result);
		foreach ($result as $eachRow)
		{
			if($count == 0)
			{
				echo("<li data-target=\"#dynamic_slide_show\" data-slide-to=\"".$count."\" class=\"active\"></li>");
			}
			else
			{
				echo("<li data-target=\"#dynamic_slide_show\" data-slide-to=\"".$count."\"></li>");
			}
			$count = $count + 1;
		}
		return $output;
	}

	function make_slides()
	{
		require 'dbConnector.php';
		$output = '';
		// $count = 0;
		$result = mysqli_query($conn, "SELECT * FROM product ORDER BY ProductId ASC LIMIT 6");
		foreach ($result as $eachRow)
	 	{
	  		// if($count == 0)
	  		// {
	   			echo("<div class=\"col-md-2\">
   						<div class=\"panel panel-default\">
   							<div class=\"panel-body\">");
	  		// }
	  		// else
	  		// {
	   	// 		echo("<div class=\"item \">
	   	// 				<div class=\"col-md-2\">
	   	// 					<div class=\"panel panel-default\">
	   	// 						<div class=\"panel-body\">");
	  		// }
	  		echo("
			<img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"300\" height=\"300\">
			</div>
			<div class=\"panel-footer \">".$eachRow["ProductName"]."<div>price: ".$eachRow["Price"]."</div></div>
			</div>
			</div>
			");
  			// $count = $count + 1;
	 	}
	 	return $output;
	}
	function make_slides2()
	{
		require 'dbConnector.php';
		$output = '';
		// $count = 0;
		$result = mysqli_query($conn, "SELECT * FROM product ORDER BY ProductId ASC LIMIT 6,6");
		foreach ($result as $eachRow)
	 	{
	  		// if($count == 0)
	  		// {
	   			echo("<div class=\"col-md-2\">
   						<div class=\"panel panel-default\">
   							<div class=\"panel-body\">");
	  		// }
	  		// else
	  		// {
	   	// 		echo("<div class=\"item \">
	   	// 				<div class=\"col-md-2\">
	   	// 					<div class=\"panel panel-default\">
	   	// 						<div class=\"panel-body\">");
	  		// }
	  		echo("
			<img class=\"img-responsive\" src=\"data:image/png;base64,".base64_encode($eachRow['Image1'])."\" alt=\"\" width=\"300\" height=\"300\">
			</div>
			<div class=\"panel-footer \">".$eachRow["ProductName"]."<div>price: ".$eachRow["Price"]."</div></div>
			</div>
			</div>
			");
  			// $count = $count + 1;
	 	}
	 	return $output;
	}
	?>