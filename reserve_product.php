<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "skippy";
	
	
	//connect 
	$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
	
	//prepare > perform > retrieve > bind [For MAX id]
	$query = $connection->prepare("SELECT MAX(customer_id) FROM customer"); 
	$query->execute(); 
	$result = $query->get_result();
	$r = $result->fetch_array(MYSQLI_ASSOC);

	//declaration
	$highest_id = $r['MAX(customer_id)'];	
	$product_code = $_POST['product_code'];
	$shirt_size = $_POST['shirt_size'];
	$quantity = $_POST['quantity'];
	$reservation_id = $highest_id; 
	
	//prepare > perform > retrieve > bind [For total_price]
	$query = $connection->prepare("SELECT price FROM product WHERE product_code = '$product_code' "); 
	$query->execute(); 
	$result = $query->get_result();
	$r2 = $result->fetch_array(MYSQLI_ASSOC);
	$solo_price = $r2['price'];
	$product_price = $solo_price * $quantity;
	
	//set code	
	$INSERT_new = "INSERT INTO `reservation`(`reservation_id`, `quantity`, `total_price`, `status`, `customer_id`, `product_code`) 
	VALUES ($reservation_id, 0, 0, 'Undefined', $highest_id, 'B9003')";
	$UPDATE_id = "UPDATE  reservation SET customer_id = '$highest_id'  WHERE reservation_id = '$highest_id' ";
	$UPDATE_code = "UPDATE  reservation SET product_code = '$product_code'  WHERE reservation_id = '$highest_id' ";
	$UPDATE_status = "UPDATE  reservation SET status = 'Ordered'  WHERE reservation_id = '$highest_id' ";
	$UPDATE_price = "UPDATE  reservation SET total_price = '$product_price'  WHERE reservation_id = '$highest_id' ";
	$UPDATE_size = "UPDATE  reservation SET size = '$shirt_size'  WHERE reservation_id = '$highest_id' ";
	$UPDATE_quantity = "UPDATE  reservation SET quantity = '$quantity'  WHERE reservation_id = '$highest_id' ";
	
	//execution
	$stmt = $connection->prepare($INSERT_new);
	$stmt->execute();
	$stmt->close();
	
	$stmt = $connection->prepare($UPDATE_code);
	$stmt->execute();
	$stmt->close();
	$stmt = $connection->prepare($UPDATE_status);
	$stmt->execute();
	$stmt->close();
	$stmt = $connection->prepare($UPDATE_price); 
	$stmt->execute();
	$stmt->close();
	$stmt = $connection->prepare($UPDATE_size);
	$stmt->execute();
	$stmt->close();
	$stmt = $connection->prepare($UPDATE_quantity);
	$stmt->execute();
	$stmt->close();
	
	$query = $connection->prepare("SELECT storage_code FROM product WHERE product_code = '$product_code' "); 
	$query->execute(); 
	$result = $query->get_result();
	$r3 = $result->fetch_array(MYSQLI_ASSOC);
	$storage_code = $r3['storage_code'];
		
	if ($shirt_size == 'Small')
	{
		$query = $connection->prepare("SELECT available_small FROM storage WHERE storage_code = '$storage_code' "); 
		$query->execute(); 
		$result = $query->get_result();
		$r4 = $result->fetch_array(MYSQLI_ASSOC);
		$available_small = $r4['available_small'];
		$stock_available = $available_small - $quantity;
		
		$query = $connection->prepare("SELECT reserved_small FROM storage WHERE storage_code = '$storage_code' "); 
		$query->execute(); 
		$result = $query->get_result();
		$r5 = $result->fetch_array(MYSQLI_ASSOC);
		$reserved_small = $r5['reserved_small'];
		$stock_reserve = $reserved_small + $quantity;
		
		if($stock_available < 0)
		{
			$message = "Unable to reserve that quantity!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$myfile = fopen("branding.php", "r") or die("Unable to open file!");
			echo fread($myfile,filesize("branding.php"));
			fclose($myfile);
		}
		else
		{
			$UPDATE_stock_available = "UPDATE storage SET available_small = '$stock_available'  WHERE storage_code = '$storage_code' ";
			$stmt = $connection->prepare($UPDATE_stock_available);
			$stmt->execute();
			$stmt->close();
			
			$UPDATE_stock_reserve = "UPDATE storage SET reserved_small = '$stock_reserve'  WHERE storage_code = '$storage_code' ";
			$stmt = $connection->prepare($UPDATE_stock_reserve);
			$stmt->execute();
			$stmt->close();
		}
	}
	
	if ($shirt_size == 'Medium')
	{
		$query = $connection->prepare("SELECT available_medium FROM storage WHERE storage_code = '$storage_code' "); 
		$query->execute(); 
		$result = $query->get_result();
		$r4 = $result->fetch_array(MYSQLI_ASSOC);
		$available_medium = $r4['available_medium'];
		$stock_available = $available_medium - $quantity;
		
		$query = $connection->prepare("SELECT reserved_medium FROM storage WHERE storage_code = '$storage_code' "); 
		$query->execute(); 
		$result = $query->get_result();
		$r5 = $result->fetch_array(MYSQLI_ASSOC);
		$reserved_medium = $r5['reserved_medium'];
		$stock_reserve = $reserved_medium + $quantity;
		
		if($stock_available < 0)
		{
			$message = "Unable to reserve that quantity!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$myfile = fopen("branding.php", "r") or die("Unable to open file!");
			echo fread($myfile,filesize("branding.php"));
			fclose($myfile);
		}
		else
		{
			$UPDATE_stock_available = "UPDATE storage SET available_medium = '$stock_available'  WHERE storage_code = '$storage_code' ";
			$stmt = $connection->prepare($UPDATE_stock_available);
			$stmt->execute();
			$stmt->close();
			
			$UPDATE_stock_reserve = "UPDATE storage SET reserved_medium = '$stock_reserve'  WHERE storage_code = '$storage_code' ";
			$stmt = $connection->prepare($UPDATE_stock_reserve);
			$stmt->execute();
			$stmt->close();
		}
	}

	if ($shirt_size == 'Large')
	{
		$query = $connection->prepare("SELECT available_large FROM storage WHERE storage_code = '$storage_code' "); 
		$query->execute(); 
		$result = $query->get_result();
		$r4 = $result->fetch_array(MYSQLI_ASSOC);
		$available_large = $r4['available_large'];
		$stock_available = $available_large - $quantity;
		
		$query = $connection->prepare("SELECT reserved_large  FROM storage WHERE storage_code = '$storage_code' "); 
		$query->execute(); 
		$result = $query->get_result();
		$r5 = $result->fetch_array(MYSQLI_ASSOC);
		$reserved_large  = $r5['reserved_large'];
		$stock_reserve = $reserved_large  + $quantity;
		
		if($stock_available < 0)
		{
			$message = "Unable to reserve that quantity!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$myfile = fopen("branding.php", "r") or die("Unable to open file!");
			echo fread($myfile,filesize("branding.php"));
			fclose($myfile);
		}
		else
		{
			$UPDATE_stock_available = "UPDATE storage SET available_large  = '$stock_available'  WHERE storage_code = '$storage_code' ";
			$stmt = $connection->prepare($UPDATE_stock_available);
			$stmt->execute();
			$stmt->close();
			
			$UPDATE_stock_reserve = "UPDATE storage SET reserved_large  = '$stock_reserve'  WHERE storage_code = '$storage_code' ";
			$stmt = $connection->prepare($UPDATE_stock_reserve);
			$stmt->execute();
			$stmt->close();
			
			//alert validation!
			$message = "Successfully Reserved!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			
			//open next file
			$myfile = fopen("confirmation_of_order.php", "r") or die("Unable to open file!");
			echo fread($myfile,filesize("confirmation_of_order.php"));
			fclose($myfile);
			$connection->close();
		}
	}
	/*
	($storage_quantity - $quantity ('reserve_quantity') < 0) 
	{
		array_push($errors, "Unable to reserve that quantity")
		}

		else 
		{
		$UPDATE_sQuantity = "UPDATE storage SET storage_quantity = 'storage_quantity' - $quantity WHERE reservation_id = 'highest_id' ";
		}*/
	
	
	
	
	
?>