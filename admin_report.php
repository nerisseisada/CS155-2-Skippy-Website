<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Skippy - Admin Report</title>
	<link href="skippylogo.png" rel="icon" type="image">
	<link rel="stylesheet" type="text/css" href="AdminReports.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="http://use.edgefonts.net/bebas-neue:n4:default;montserrat:n4:default.js" type="text/javascript"></script>
</head>

<br /> 
<br /> 
	<center><img src="skippylogo.png" width="12%" style="border-radius: 50%; border: 4px solid #ddd; padding: 2px;" ></center>
<br>
<header>
<br>
	<div class="tab">
		<button onclick="window.location.href = 'login_customer.php';">Back to LOGIN</button>
		<button class="active" onclick="window.location.href = 'admin_report.php';">Reserved Orders</button>
		<button onclick="window.location.href = 'admin_storage.php';">Storage Monitoring</button>
	</div>
	<h2 id="contact_text">RESERVED ORDERS</h2>
	<br>
</header>
<body>

	<iframe src="display_table_reservation.php" align="middle" onload="this.style.height=(this.contentDocument.body.scrollHeight+45) +'px';" scrolling="no" style="width:100%; border:none;" style="position: absolute; height:100%; border-style: none; "></iframe>

<br>
<center>
	
	<form action="button_update_bought.php" method="post" >
	<input type="submit" class="update_button" name="update" value="Update to Bought" onclick="check_update(this.form)"><br>	
	<input type="text" name="update_bought" placeholder="Input ID" size="4" minlength="1" maxlength="15">
	</form>
	<br>
	
	<form action="button_update_cancelled.php" method="post">
	<input type="submit" class="update_button" name="update" value="Update to Cancelled" onclick="check_update(this.form)"><br>
	<input type="text" name="update_cancelled" placeholder="Input ID" size="4" minlength="1" maxlength="15">
	</form>
	<br>
	
	<form action="button_delete_order.php" method="post">
	<input type="submit" class="delete_button" name="update" value="Delete an Order" onclick="check_delete(this.form)"><br>
	<input type="text" name="delete_order" placeholder="Input ID" size="4" minlength="1" maxlength="15">
	</form>
	<br>
	
	<form action="button_deleteAll.php" method="post">
	<input type="submit" class="delete_button" name="deleteAll"  onclick="check_delete(this.form)" value="Delete All">
	</form>
	
</center>

<script language="javascript">
            function check_update(form) { 
                    window.open('admin_report.php',"_self")
            }
			function check_delete(form) {
                    window.open('admin_report.php',"_self")
                    alert("Successfully Deleted!")
            }
	</script>	
	
<br><br><br>
<footer style="font-size:20px;" align="center">
<div class="f_section">
<br />
	<a href="https://www.google.com/"><img src="glogo.png" alt="google logo" width="50" height="50" style="border-radius: 10px;" hspace="5"></a>
	<a href="https://www.facebook.com/"><img src="fblogo.png" alt="fb logo" width="50" height="50" hspace="5"></a>
<br /><br />
<small> 
<p style="font-family: Tahoma;">Adriano<br>Ambata<br>Isada<br>Jacinto<br>Moncayo<br>San Luis<br</p>
&copy Copyright Information 2019 
</small>
</div>
</footer>
</body>
</html>