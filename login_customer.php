<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Skippy - Login</title>
	<link href="skippylogo.png" rel="icon" type="image">
	<link rel="stylesheet" type="text/css" href="Login - CSS.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="http://use.edgefonts.net/bebas-neue:n4:default;montserrat:n4:default.js" type="text/javascript"></script>
</head>

<header>
</header>
<br> 
<br>
	<center><img src="skippylogo.png" width="12%" style="border-radius: 50%; border: 4px solid #ddd; padding: 2px;" ></center>
<br>
<body>	
	<div class="tab">
	<button class="active" onclick="window.location.href = 'LoginCustomer.php';">Register as Customer</button>
	<button onclick="window.location.href = 'LoginAdmin.php';">Login as Admin</button>
	<button onclick="window.location.href = 'lookup_order.php';">Look Up Order</button>
</div>
<br><br>
<form action="new_transaction.php" method="post" class="form-horizontal">
	<section style="margin-left: 20%; margin-right: 20%;">
        <fieldset class="border p-2">
            <h4>
                <div class="title-part">
                    Register Information
                </div>
            </h4>

            <div class="form-group">
                Name: <input type="text" name="customer_name" class="form-control" placeholder="Juan Dela Cruz" size="25" maxlength="30" required>
            </div>

            <div class="form-group">
                Contact Number: <input type="tel" name="contact_number" class="form-control" placeholder="09XXXXXXXXX" size="25" minlength="11" maxlength="11" required>
            </div>
		</fieldset>
	</section>
	<div class="form-group">
		<input type="submit" onclick="check(this.form)"></input>
	</div>
</form>		
	<script language="javascript">
            function check(form) { 
                    window.open('branding.php',"_self")
                    alert("Successfully Registered!")
                
            }
	</script>	
	
<br>
<br>	
<br>
<br>
	
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