<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "sample1";
	
	//connect > prepare > perform > retrieve > bind
	$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
	$query = $connection->prepare("SELECT MAX(customer_id) FROM customer"); 
	$query->execute(); 
	$result = $query->get_result();
	$r = $result->fetch_array(MYSQLI_ASSOC); 
	$highest_id = $r['MAX(customer_id)'];	
	
	$result_all = mysqli_query($connection,"SELECT * FROM customer WHERE customer_id = '$highest_id' ");
	
	echo "<table border='1' align='center' style='font-size:24px' >
	<tr>
	<th bgcolor='#80dfff' width='200px' height='80px'>Customer ID</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Customer Name</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Contact Number</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Product Code</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Size</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Price</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Status</th>
	</tr>";

	while($row = mysqli_fetch_array($result_all))
	{
	echo "<tr>";
	echo "<td align='center' height='45px'>" . $row['customer_id'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['name'] . "</td>";
	echo "<td align='center' height='45px'>" ."0". $row['contact_number'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['product_code'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['size'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['price'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['status'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";

	mysqli_close($connection);
	?>