<?php
		$save_deleteAnOrder = $_POST["delete_order"];
		$deleteAnOrder = $save_deleteAnOrder;
		if(!empty($deleteAnOrder))
		{
			$host = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbname = "skippy";
			
			$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname);
			
			if(mysqli_connect_error())
			{
				die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
			}
			else
			{
				$DELETE_reservation = "DELETE FROM reservation WHERE reservation.reservation_id = $deleteAnOrder";
				$DELETE_customer = "DELETE FROM customer WHERE customer.customer_id = $deleteAnOrder"; 				
			}
			
			
			$stmt = $connection->prepare($DELETE_reservation);
			$stmt->execute();
			$stmt->close();
			
			$stmt = $connection->prepare($DELETE_customer);
			$stmt->execute();
			$stmt->close();
		}
		else
		{
			echo "All fields are required";
		}
		$myfile = fopen("admin_report.php", "r+") or die("Unable to open file!");
		echo fread($myfile,filesize("admin_report.php"));
		fclose($myfile);
		
			$connection->close();
	?>