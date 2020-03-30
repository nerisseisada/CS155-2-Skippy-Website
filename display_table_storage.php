<?php
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
	$highest_id = $r['MAX(customer_id)'];	
	
	$result_all = mysqli_query($connection, "SELECT storage.storage_code, product.product_code, product.storage_code, 
	storage.available_small, storage.available_medium, storage.available_large,	
	storage.reserved_small, storage.reserved_medium, storage.reserved_large
	FROM storage JOIN product ON storage.storage_code = product.storage_code");

	echo "<table border='1' align='center' style='font-size:24px' >
	<tr>
		<th bgcolor='#80dfff' width='200px' height='80px'>Product Code</th>
		<th bgcolor='#80dfff' width='200px' height='80px'>Reserved Small</th>
		<th bgcolor='#80dfff' width='200px' height='80px'>Available Small</th>
		<th bgcolor='#80dfff' width='200px' height='80px'>Reserved Medium</th>
		<th bgcolor='#80dfff' width='200px' height='80px'>Available Medium</th>
		<th bgcolor='#80dfff' width='200px' height='80px'>Reserved Large</th>
		<th bgcolor='#80dfff' width='200px' height='80px'>Available Large</th>
	</tr>";

	while($row = mysqli_fetch_array($result_all))
	{
	echo "<tr>";
		echo "<td align='center' height='45px'>" . $row['product_code'] . "</td>";
		echo "<td align='center' height='45px'>" . $row['reserved_small'] . "</td>";
		echo "<td align='center' height='45px'>" . $row['available_small'] . "</td>";
		echo "<td align='center' height='45px'>" . $row['reserved_medium'] . "</td>";
		echo "<td align='center' height='45px'>" . $row['available_medium'] . "</td>";
		echo "<td align='center' height='45px'>" . $row['reserved_large'] . "</td>";
		echo "<td align='center' height='45px'>" . $row['available_large'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";

	mysqli_close($connection);
	?>