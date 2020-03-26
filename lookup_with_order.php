<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Skippy - Branding Products</title>
	<link href="skippylogo.png" rel="icon" type="image">
	<link rel="stylesheet" type="text/css" href="Products - CSS.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="http://use.edgefonts.net/bebas-neue:n4:default;montserrat:n4:default.js" type="text/javascript"></script>
</head>
<style>
	.confirm_button
	{
		color: #4542f5;
		background-color: #2cdb60;
		font-family: Tahoma;
		float: center;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 24px 16px;
		transition: 0.3s;
		font-size: 24px;
		border-radius: 9px;
		margin-left: 45%;
		width: 150px;
	}
	.cancel_button
	{
		color: #fcff96;
		background-color: #d61111;
		font-family: Tahoma;
		float: center;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 24px 16px;
		transition: 0.3s;
		font-size: 24px;
		border-radius: 9px;
		margin-left: 45%;
		width: 200px;
	}
</style>

<header>
<br /> 
<br /> 
	<center><img src="skippylogo.png" width="12%" style="border-radius: 50%; border: 4px solid #ddd; padding: 2px;" ></center>
<br>
<div class="tab">
		<button onclick="window.location.href = 'login_customer.php';">LOGIN</button>
	</div>
</header>
<! –– =======================================BODY=========================================================== ––>
<body>
<br>
	<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "skippy";
	
	//connect > prepare > perform > retrieve > bind
	$connection = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
	$lookup_number = $_POST['lookup_number'];
	
	$query = $connection->prepare("SELECT * FROM customer WHERE customer_id = '$lookup_number' "); 
	$query->execute(); 
	$result = $query->get_result();
	$r = $result->fetch_array(MYSQLI_ASSOC); 
	
	$result_all = mysqli_query($connection, "SELECT reservation.reservation_id, customer.name, customer.contact_number, product.product_name,
	reservation.size, reservation.quantity, reservation.total_price, reservation.status	FROM reservation 
	JOIN customer ON reservation.customer_id = customer.customer_id 
	JOIN product ON reservation.product_code = product.product_code
	WHERE customer.customer_id = '$lookup_number' ");
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
	<br>
	
	
<script language="javascript">
            function check_confirm(form) { 
                    window.open('login_customer.php',"_self")
					alert("Successfully Reserved! Wait for two days to claim the product and then the reservation will expire three days after")
            }
			function check_cancel(form) { 
                    window.open('login_customer.php',"_self")
					alert("Successfully Cancelled! Your order was not recorded")
            }

	</script>	

<! –– ========================================FOOTER========================================================== ––>
<br><br><br><br><br>
	<footer style="font-size:20px;" align="center">
		<div class="f_section">
			<br />
			<a href="https://www.google.com/"><img src="glogo.png" alt="google logo" width="50" height="50" style="border-radius: 10px;" hspace="5"></a>
			<a href="https://www.facebook.com/"><img src="fblogo.png" alt="fb logo" width="50" height="50" hspace="5"></a>
			<br /><br />
			<small> 
				<p style="font-family: Tahoma;">Adriano<br>Ambata<br>Isada<br>Jacinto<br>Moncayo<br>San Luis<br></p>
				&copy Copyright Information 2019 
			</small>
		</div>
	</footer>
</body>
</html>