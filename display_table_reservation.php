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
	
	$result_all = mysqli_query($connection, "SELECT reservation.reservation_id, customer.name, customer.contact_number, reservation.product_code,
reservation.size, reservation.quantity, reservation.total_price, reservation.status	FROM reservation JOIN customer ON reservation.customer_id = customer.customer_id");

	echo "<table border='1' align='center' style='font-size:24px' >
	<tr>
	<th bgcolor='#80dfff' width='200px' height='80px'>Reservation ID</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Customer Name</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Contact Number</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Product Code</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Shirt Size</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Quantity</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Price</th>
	<th bgcolor='#80dfff' width='200px' height='80px'>Status</th>
	</tr>";

	while($row = mysqli_fetch_array($result_all))
	{
	echo "<tr>";
	echo "<td align='center' height='45px'>" . $row['reservation_id'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['name'] . "</td>";
	echo "<td align='center' height='45px'>" ."0". $row['contact_number'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['product_code'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['size'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['quantity'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['total_price'] . "</td>";
	echo "<td align='center' height='45px'>" . $row['status'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";

	mysqli_close($connection);
	?>