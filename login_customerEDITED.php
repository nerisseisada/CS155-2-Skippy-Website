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
	<button class="active" onclick="window.location.href = 'login_customer.php';">Register as Customer</button>
	<button onclick="window.location.href = 'login_admin.php';">Login as Admin</button>
	<button onclick="window.location.href = 'lookup_order.php';">Look Up Order</button>
</div>
<br><br>
<form action="new_transaction.php" method="post" class="form-horizontal" onsubmit="return Validate()" name="vform">
	<section style="margin-left: 20%; margin-right: 20%;">
        <fieldset class="border p-2">
            <h4>
                <div class="title-part">
                    Register Information
                </div>
            </h4>

            <div class="form-group">
                Name: <input type="text" name="customer_name" class="form-control" placeholder="Juan Dela Cruz" size="25" maxlength="30">
				<div id="name_error"></div>
			</div>

            <div class="form-group">
                Contact Number: <input type="tel" name="contact_number" class="form-control" placeholder="09XXXXXXXXX" size="25" minlength="9" maxlength="11">
				<div id="num_error"></div>
			</div>
		</fieldset>
	</section>
	<div class="form-group">
		<input type="submit" name="register"></input>
	</div>
</form>		
	<script type="text/javascript">
		//GET ALL INPUT TEXT OBJECTS
		var customer_name = document.forms["vform"]["customer_name"];
		var contact_number = document.forms["vform"]["contact_number"];
		var num = /^[0-9]+$/;
		
		//GET ALL ERROR DISPLAY OBJECTS
		var name_error = document.getElementById("name_error");
		var num_error = document.getElementById("num_error");
		
		// SETTING ALL EVENT LISTENERS
		customer_name.addEventListener('blur', nameVerify, true);
		contact_number.addEventListener('blur', numVerify, true);
		
		// function validation
		function Validate() {
		  if (customer_name.value == "") {
			customer_name.style.border = "1px solid red";
			document.getElementById('name_error').style.color = "red";
			name_error.textContent = "*Name is required";
			customer_name.focus();
			return false;
		  }
		  if (contact_number.value == "") {
			contact_number.style.border = "1px solid red";
			document.getElementById('num_error').style.color = "red";
			num_error.textContent = "*Contact number is required";
			contact_number.focus();
			return false;
		  }
		  if(contact_number.value.match(num)){
			  window.open('branding.php',"_self")
              alert("Successfully Registered!")
		  }
		  else{
			  contact_number.style.border = "1px solid red";
			  document.getElementById('num_error').style.color = "red";
			  num_error.textContent = "*All inputs should be in numbers";
			  contact_number.focus();
			  return false;
		  }
		}
		
		//EVENT HANDLER FUNCTIONS
		function nameVerify(){
			if (customer_name.value != ""){
				customer_name.style.border = "1px solid #5E6E66";
				name_error.innerHTML = "";
				return true;
			}
		}
		function numVerify(){
			if (contact_number.value != ""){
				contact_number.style.border = "1px solid #5E6E66";
				num_error.innerHTML = "";
				return true;
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
<p style="font-family: Tahoma;">Adriano<br>Ambata<br>Isada<br>Jacinto<br>Moncayo<br>San Luis<br></p>
&copy Copyright Information 2019 
</small>
</div>
</footer>
</body>
</html>
