<?php
			$host = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbname = "skippy";
		
			$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname);
			$DELETE_reservation = "DELETE FROM reservation WHERE reservation.customer_id = customer_id; ";
			$DELETE_customer = "DELETE FROM customer WHERE customer.customer_id = customer_id; ";
			
			$stmt = $connection->prepare($DELETE_reservation);
			$stmt->execute();
			$stmt->close();
			
			$stmt = $connection->prepare($DELETE_customer);
			$stmt->execute();
			$stmt->close();
			
			$connection->close();

			$myfile = fopen("admin_report.php", "r") or die("Unable to open file!");
			echo fread($myfile,filesize("admin_report.php"));
			fclose($myfile);
		
?>