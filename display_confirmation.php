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
	
	$result_all = mysqli_query($connection, "SELECT reservation.reservation_id, customer.name, customer.contact_number, product.product_name,
	reservation.size, reservation.quantity, reservation.total_price, reservation.status	FROM reservation 
	JOIN customer ON reservation.customer_id = customer.customer_id 
	JOIN product ON reservation.product_code = product.product_code
	WHERE customer.customer_id = $highest_id");

	echo "<table border='1' align='center' style='font-size:24px' >
	<tr>
	<td align='center' bgcolor='#80dfff' width='200px' height='80px'><b>Reservation ID</b></td>
	<td align='center' bgcolor='#80dfff' width='200px' height='80px'><b>Customer Name</b></td>
	<td align='center' bgcolor='#80dfff' width='200px' height='80px'><b>Contact Number</b></td>
	<td align='center' bgcolor='#80dfff' width='200px' height='80px'><b>Product Name</b></td>
	<td align='center' bgcolor='#80dfff' width='200px' height='80px'><b>Shirt Size</b></td>
	<td align='center' bgcolor='#80dfff' width='200px' height='80px'><b>Quantity</b></td>
	<td align='center' bgcolor='#80dfff' width='200px' height='80px'><b>Price</b></td>
	<td align='center' bgcolor='#80dfff' width='200px' height='80px'><b>Status</b></td>
	</tr>";

	while($row = mysqli_fetch_array($result_all))
	{
	echo "<tr>";
	echo "<td align='center' height='45px'>" . $row['reservation_id'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['name'] . "</td>";
	echo "<td align='center' height='45px'>" ."0". $row['contact_number'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['product_name'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['size'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['quantity'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['total_price'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['status'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";

	mysqli_close($connection);
	?>