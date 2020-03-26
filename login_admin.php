<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Skippy - Login as Admin</title>
	<link href="skippylogo.png" rel="icon" type="image">
	<link rel="stylesheet" type="text/css" href="Login - CSS.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="http://use.edgefonts.net/bebas-neue:n4:default;montserrat:n4:default.js" type="text/javascript"></script>
</head>

<style>
	.login_button {
	  width: 10%;
	  padding: 12px;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	  margin-top: 6px;
	  margin-bottom: 16px;
	  background-color: #4CAF50;
	  color: white;
	}
</style>
<br> 
<br>
	<center><img src="skippylogo.png" width="12%" style="border-radius: 50%; border: 4px solid #ddd; padding: 2px;" ></center>
<br>
<body>
	<div class="tab">
	<button onclick="window.location.href = 'login_customer.php';">Register as Customer</button>
	<button class="active" onclick="window.location.href = 'login_admin.php';">Login as Admin</button>
	<button onclick="window.location.href = 'lookup_order.php';">Look Up Order</button>
</div>
<br><br>

<form method="post" class="form-horizontal" name="form">
	<section style="margin-left: 20%; margin-right: 20%;">
        <fieldset class="border p-2">
            <h4>
                <div class="title-part">
                    Administrator Login
                </div>
            </h4>

            <div>
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username">
			</div>

			<div>
				<label for="pass">Password:</label>
				<input type="password" class="form-control" id="pass" name="pass" minlength="8" required>
			</div>

		</fieldset>
	</section>
	<center>
		<input type="button" class="login_button" onclick="check(this.form)" value="Login">
	</center>
	
</form>	

<script language="javascript">
            function check(form) { 
				/*function to check userid & password*/
                /*the following code checkes whether the entered userid and password are matching*/
                if(form.username.value == "admin" && form.pass.value == "skippy123") {
                    window.open('admin_report.php',"_self") /*opens the target page while Id & password matches*/
                }
                else {
                    alert("Error Password or Username")/*displays error message*/
                }
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
<p style="font-family: Tahoma;">Adriano<br>Ambata<br>Isada<br>Jacinto<br>Moncayo<br>San Luis<br</p>
&copy Copyright Information 2019 
</small>
</div>
</footer>
</body>
</html>