<?php

	function itexmo($number,$message,$apicode,$passwd)
	{
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
	}
	if(isset ($_POST['confirm']))
	{
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "skippy";
	
	
		//connect > prepare > perform > retrieve > bind
		$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
		$query = $connection->prepare("SELECT MAX(customer_id) FROM customer"); 
		$query->execute(); 
		$result = $query->get_result();
		$r = $result->fetch_array(MYSQLI_ASSOC);

		//declaration
		$highest_id = $r['MAX(customer_id)'];	
		
		//set code	
		$result_all = mysqli_query($connection, "SELECT customer.customer_id, customer.name, customer.contact_number FROM customer WHERE customer.customer_id = $highest_id");
		$data = mysqli_fetch_array($result_all);
		
		//execution
		/*$stmt = $db->prepare($UPDATE_code);
		$stmt->execute();
		$stmt->close();*/
		
		$id = $data['customer_id'];
		$trial_number = $data['contact_number'];
		$name = $data['name'];
		$number = '0'.$trial_number;
		
		$msg = "Hi $name! this is Skippy, your Reservation ID is $id. You may look up your order online. \n \n";
		$api = "TR-COMPA075847_6LNYN";
		$apipass= "8cn%&a}d}x";
		
			$result = itexmo($number,$msg,$api,$apipass);
			
			if ($result == ""){
			echo "iTexMo: No response from server!!!
			Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
			Please CONTACT US for help. ";	
			}
			else if ($result == 0){
				$message = "Message Sent!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else{	
				echo "Error Num ". $result . " was encountered!";
			}
		$myfile = fopen("login_customer.php", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("login_customer.php"));
		fclose($myfile);
	}

?>