<?php
		$customername = $_POST["customer_name"];
		$cnumber = $_POST["contact_number"];
		
		if(!empty($customername) || !empty($cnumber))
		{
			$host = "localhost";
			$dbUsername = "root";
			$dbPassword = "";
			$dbname = "skippy";
			
			$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname);
			
			/*$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
			$query = $connection->prepare("SELECT MAX(customer_id) FROM customer"); 
			$query->execute(); 
			$result = $query->get_result();
			$r = $result->fetch_array(MYSQLI_ASSOC);
	
			$highest_id = $r['MAX(customer_id)'];*/
			if(mysqli_connect_error())
			
			{
				die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
			}
			else
			{
				$SELECT = "SELECT contact_number From customer where contact_number = ? Limit 1";
				$INSERT = "INSERT Into customer (name, contact_number) values (?,?)"; 
				//$product_code_NULL = "UPDATE  customer SET product_code = 'NULL'  WHERE customer_id = '$highest_id' ";
			}
			
			$stmt = $connection->prepare($SELECT);
			$stmt->bind_param("i", $cnumber);
			$stmt->execute();
			
			$stmt->bind_result($cnumber);
			$stmt->store_result();
			$stmt->close();

			/*$stmt = $connection->prepare($product_code_NULL);
			$stmt->execute();
			$stmt->close();
			*/
			
			$stmt = $connection->prepare($INSERT);
			$stmt->bind_param("si", $customername, $cnumber);
			$stmt->execute();
				
			
			$stmt->close();
			$connection->close();
		}
		else
		{
			echo "All fields are required";
		}
		
		$myfile = fopen("branding.php", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("branding.php"));
		fclose($myfile);
	?>