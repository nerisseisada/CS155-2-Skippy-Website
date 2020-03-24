<?php
			$host = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbname = "skippy";
			
			//connect
			$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
			
			
			$query = $connection->prepare("SELECT MAX(customer_id) FROM reservation"); 
			$query->execute(); 
			$result = $query->get_result();
			$r = $result->fetch_array(MYSQLI_ASSOC); 
			$highest_id = $r['MAX(customer_id)'];	
			$save_highest_id = $highest_id;
			//recover storage deduction
			$query = $connection->prepare("SELECT reservation.quantity, reservation.product_code, reservation.size FROM reservation WHERE reservation.reservation_id = '$highest_id' "); 
			$query->execute(); 
			$result = $query->get_result();
			$r = $result->fetch_array(MYSQLI_ASSOC); 
			$save_quantity = $r['quantity'];	
			$save_size = $r['size'];
			$save_product_code = $r['product_code'];
			$quantity = $save_quantity;
			$shirt_size = $save_size;
			$product_code = $save_product_code;
			
			//s_query is for storage query
			$s_query = $connection->prepare("SELECT storage_code FROM product WHERE product_code = '$product_code' "); 
			$s_query->execute(); 
			$result = $s_query->get_result();
			$r3 = $result->fetch_array(MYSQLI_ASSOC);
			$storage_code = $r3['storage_code'];
			if ($shirt_size == 'Small')
			{
				$s_query = $connection->prepare("SELECT available_small FROM storage WHERE storage_code = '$storage_code' "); 
				$s_query->execute(); 
				$result = $s_query->get_result();
				$r4 = $result->fetch_array(MYSQLI_ASSOC);
				$available_small = $r4['available_small'];
				$stock_available = $available_small + $quantity;
				
				$s_query = $connection->prepare("SELECT reserved_small FROM storage WHERE storage_code = '$storage_code' "); 
				$s_query->execute(); 
				$result = $s_query->get_result();
				$r5 = $result->fetch_array(MYSQLI_ASSOC);
				$reserved_small = $r5['reserved_small'];
				$stock_reserve = $reserved_small - $quantity;
				
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
				$s_query = $connection->prepare("SELECT available_medium FROM storage WHERE storage_code = '$storage_code' "); 
				$s_query->execute(); 
				$result = $s_query->get_result();
				$r4 = $result->fetch_array(MYSQLI_ASSOC);
				$available_medium = $r4['available_medium'];
				$stock_available = $available_medium + $quantity;
				
				$s_query = $connection->prepare("SELECT reserved_medium FROM storage WHERE storage_code = '$storage_code' "); 
				$s_query->execute(); 
				$result = $s_query->get_result();
				$r5 = $result->fetch_array(MYSQLI_ASSOC);
				$reserved_medium = $r5['reserved_medium'];
				$stock_reserve = $reserved_medium - $quantity;
				
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
				$s_query = $connection->prepare("SELECT available_large FROM storage WHERE storage_code = '$storage_code' "); 
				$s_query->execute(); 
				$result = $s_query->get_result();
				$r4 = $result->fetch_array(MYSQLI_ASSOC);
				$available_large = $r4['available_large'];
				$stock_available = $available_large + $quantity;
				
				$s_query = $connection->prepare("SELECT reserved_large  FROM storage WHERE storage_code = '$storage_code' "); 
				$s_query->execute(); 
				$result = $s_query->get_result();
				$r5 = $result->fetch_array(MYSQLI_ASSOC);
				$reserved_large  = $r5['reserved_large'];
				$stock_reserve = $reserved_large  - $quantity;
				
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

				}
			}
			
			//delete last reservation
			$DELETE = "DELETE FROM reservation WHERE reservation.customer_id = '$save_highest_id' ";
			$stmt = $connection->prepare($DELETE);
			$stmt->execute();
			$stmt->close();
			
			//delete last customer
			/*$query = $connection->prepare("SELECT MAX(customer_id) FROM customer"); 
			$query->execute(); 
			$result = $query->get_result();
			$r = $result->fetch_array(MYSQLI_ASSOC); 
			$highest_id = $r['MAX(customer_id)'];*/	
			/*$DELETE = "DELETE FROM customer WHERE customer.customer_id = '$save_highest_id' ";
			$stmt = $connection->prepare($DELETE);
			$stmt->execute();
			$stmt->close();*/
			
			$myfile = fopen("branding.php", "r") or die("Unable to open file!");
			echo fread($myfile,filesize("branding.php"));
			fclose($myfile);
		
?>