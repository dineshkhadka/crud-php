<?php 

	require_once 'includes/database.php';




 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Add products</title>
 		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" href="main.css">


		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 </head>
 <body>
 	


<div class="col-md-8 col-md-offset-2">
	<?php

	// include 'database.php';


 	function hasQuery() {
 		return isset($_POST["p-brand"]);
 	}

 	function isEmpty() {
 		if (hasQuery()) {
 			$check = array('p-brand', 'p-color');
			$_isEmpty = false;

			foreach ($check as $field) {
				if (empty($_POST[$field])) {
					$_isEmpty = true;
				}
			}

			return $_isEmpty;
	 	}
 	}




 	if (hasQuery() && !isEmpty()) {
		$brand = $_POST["p-brand"];
		$color = $_POST["p-color"];
		$warranty = isset($_POST["p-warranty"]) &&  $_POST["p-warranty"] == 'true'? 1 : 0;
		$sql = "INSERT INTO `product` (product_brand, product_color, product_warranty) VALUES ('$brand', '$color', '$warranty')";
		if (mysqli_query($connection, $sql)) {
			echo '<div class="alert alert-success alert-dismissible" role="alert">The item has been succesfully added</div>';
		}
		else {
			echo '<div class="alert alert-success alert-dismissible" role="alert">mysqli_error($connection)</div>';
		}

 	}
 	elseif (isEmpty()) {
 		echo '<div class="alert alert-danger" role="alert">Please Insert a value</div>';
 	}
 	else {
 		// var_dump()
 	}
 	echo isEmpty();

?>

	<form action="index.php" method="post">
	  <div class="form-group">
	    <label for="exampleInputEmail2">Product Brand</label>
	    <input type="text" class="form-control" name="p-brand" id="exampleInputEmail2" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail3">Product Color</label>
	    <input type="text" class="form-control" name="p-color" id="exampleInputEmail3" placeholder="">
	  </div>
	  <div class="checkbox">
    <label>
      <input type="checkbox" name="p-warranty" value="true"> Has Warranty?
    </label>
  </div>


	  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>





 </body>
 </html>