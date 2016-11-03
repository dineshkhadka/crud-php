<?php

	include 'database.php';
	$brand = $_POST["p-brand"];
	$color = $_POST["p-color"];
	$warranty = isset($_POST["p-warranty"]) &&  $_POST["p-warranty"] == 'true'? 1 : 0;
	// $hasWarranty = $_POST["p-warranty"];

	$sql = "INSERT INTO `product` (product_brand, product_color, product_warranty) VALUES ('$brand', '$color', '$warranty')";
	if (mysqli_query($connection, $sql)) {
		echo "It is done";
	}
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	}

?>

