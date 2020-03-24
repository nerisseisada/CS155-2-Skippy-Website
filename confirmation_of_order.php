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
		color: #ffffcc;
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
		width: 200px;
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

</header>
<! –– =======================================BODY=========================================================== ––>
<body>
	<iframe src="display_confirmation.php" align="middle" onload="this.style.height=(this.contentDocument.body.scrollHeight+45) +'px';" scrolling="no" style="width:100%; border:none;" style="position: absolute; height:100%; border-style: none; "></iframe>
<br>



		
		  <button type="submit" class="confirm_button" onclick="check_confirm(this.form)" name="button" value="confirm">Confirm</button> 
		  <br><br>
		  <form action="button_cancel_order.php" method="post">
			<input type="submit" class="cancel_button" name="deleteAll"  onclick="check_cancel(this.form)" value="Cancel">
			</form>
		 <br><br><br>
		 
<script language="javascript">
            function check_confirm(form) { 
                    window.open('LoginCustomer.php',"_self")
					alert("Successfully Reserved! Purchase your product in the store within three days!")
            }
			function check_cancel(form) { 
                    window.open('LoginCustomer.php',"_self")
					alert("Successfully Cancelled! Your order was not recorded")
            }

	</script>	

<! –– ========================================FOOTER========================================================== ––>

	<footer style="font-size:20px;" align="center">
		<div class="f_section">
			<br />
			<a href="https://www.google.com/"><img src="glogo.png" alt="google logo" width="50" height="50" style="border-radius: 10px;" hspace="5"></a>
			<a href="https://www.facebook.com/"><img src="fblogo.png" alt="fb logo" width="50" height="50" hspace="5"></a>
			<br /><br />
			<small> 
				<p style="font-family: Tahoma;">Jo Simon Ambata <br> Hartford Ang <br> Ethan Moncayo<br></p>
				&copy Copyright Information 2019 
			</small>
		</div>
	</footer>
</body>
</html>