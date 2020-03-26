<?php
		$updatecancel = $_POST["update_cancelled"];

		if(!empty($updatecancel))
		{
			$host = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbname = "skippy";
			
			$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname);
			
			//Set Status to Cancel
			if(mysqli_connect_error())
			{
				die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
			}
			else
			{
				$INSERT = "UPDATE reservation SET status = 'Cancelled' WHERE reservation.customer_id = $updatecancel"; 
			}
			
			//getting the values
			$result_all = mysqli_query($connection, 
			"SELECT reservation.reservation_id, customer.name, reservation.size, reservation.product_code, product.product_name, reservation.status, reservation.quantity FROM reservation 
			JOIN customer ON reservation.customer_id = $updatecancel
			JOIN product ON reservation.product_code = product.product_code
			WHERE customer.customer_id = $updatecancel");
					
			//saving variables
			$data = mysqli_fetch_array($result_all);
			$quantity = $data['quantity'];
			$product_code = $data['product_code'];
			$shirt_size = $data['size'];
			$status = $data['status'];
			
			//applying the variables to storage stock
			//s_query is for storage query
			$s_query = $connection->prepare("SELECT storage_code FROM product WHERE product_code = '$product_code' "); 
			$s_query->execute(); 
			$result = $s_query->get_result();
			$r3 = $result->fetch_array(MYSQLI_ASSOC);
			$storage_code = $r3['storage_code'];
			
			if($status == 'Reserved')
			{
				$stmt = $connection->prepare($INSERT);
				$stmt->execute();
				$stmt->close();
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
				$message = "Successfully Updated!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				$myfile = fopen("admin_report.php", "r+") or die("Unable to open file!");
				echo fread($myfile,filesize("admin_report.php"));
				fclose($myfile);
				$connection->close();
			}
			else
			{
				$message = "Invalid Update!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				$myfile = fopen("admin_report.php", "r") or die("Unable to open file!");
				echo fread($myfile,filesize("admin_report.php"));
				fclose($myfile);
			}	
		}
		else
		{
			echo "All fields are required";
			$myfile = fopen("admin_report.php", "r+") or die("Unable to open file!");
			echo fread($myfile,filesize("admin_report.php"));
			fclose($myfile);
			$connection->close();
		}
	?>