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

<header>
<br /> 
<br /> 
	<center><img src="skippylogo.png" width="12%" style="border-radius: 50%; border: 4px solid #ddd; padding: 2px;" ></center>
<br>
	<div class="tab">
			<div class="dropdown">
		<button  class="active" class="dropbtn">PRODUCTS</button>
			<div class="dropdown-content">
			<a href="Branding.php"><p class="subMenu">Branding</p></a>
			<a href="FastMoving.php"><p class="subMenu">Fast Moving</p></a>
			<a href="Specials.php"><p class="subMenu">Specials</p></a>
			</div>
			</div>
		
		<button onclick="window.location.href = 'ContactUs.php';">CONTACT US</button>
	</div>
</header>

<body>
<br>

<! –– =======================================BODY=========================================================== ––>

  <table align="center" cellspacing="10">
	  	<tr>
			<td colspan="2"><h2 class="menuYourChoice">Choose your Product</h2></td>
	  </tr>
	  	    <tr>
	      <td><img src="B9003.png" width="400px" height="400px" class="menuIMGdesign"></td>
		  <td><img src="B9022.png" width="400px" height="400px" class="menuIMGdesign"></td>

        </tr>
	    <tr align="center" style ="background-color: white;">
		
		  <td><h3 class="menuFont">Poppy Red <br> Php 549.75</h3>
		  <form action="reserve_product.php" method="post">
		  <input type="radio" class="invisible" name="product_price" value="549.75" checked="checked">
			<select name="shirt_size">
				<option value="" disabled selected>Select Size</option>
				<option value="Small">Small</option>
				<option value="Medium">Medium</option>
				<option value="Large">Large</option>
			</select><br><br>
			<select name="quantity">
				<option value="" disabled selected>Input Quantity</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select><br><br>
		  <button type="submit" onclick="check(this.form)" name="product_code"  value="B9003">Reserve</button>
		  </form>
		  </td>
		  
		  <td><h3 class="menuFont">Dusty Pink <br> Php 549.75</h3>
		  <form action="reserve_product.php" method="post">
		  <input type="radio" class="invisible" name="product_price" value="559.75" checked="checked">
			<select name="shirt_size">
				<option value="" disabled selected>Select Size</option>
				<option value="Small">Small</option>
				<option value="Medium">Medium</option>
				<option value="Large">Large</option>
			</select><br><br>
			<select name="quantity">
				<option value="" disabled selected>Input Quantity</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select><br><br>
		  <button type="submit" onclick="check(this.form)" name="product_code" value="B9022">Reserve</button>
		  </form>
		  </td>

        </tr>
  </table>

<br/>
<br/>
	
  <table align="center" cellspacing="10">
	    <tr>
	      <td><img src="B9060.png" width="400px" height="400px" class="menuIMGdesign"></td>
	      <td><img src="B9069.png" width="400px" height="400px" class="menuIMGdesign"></td>
        </tr>
	    <tr align="center" style ="background-color: white;">
		  <td><h3 class="menuFont">Paradise Black <br>Php 549.75</h3>
		  <form action="reserve_product.php" method="post">
		  <input type="radio" class="invisible" name="product_price" value="Php 549.75" checked="checked">
			<select name="shirt_size">
				<option value="" disabled selected>Select Size</option>
				<option value="Small">Small</option>
				<option value="Medium">Medium</option>
				<option value="Large">Large</option>
			</select><br><br>
		  <button type="submit" onclick="check(this.form)" name="button" value="B9060">Reserve</button>
		  </form>
		  </td>
		  
		  <td><h3 class="menuFont">Blue Dawn <br> Php 549.75</h3>
		  <form action="reserve_product.php" method="post">
		  <input type="radio" class="invisible" name="product_price" value="Php 549.75" checked="checked">
			<select name="shirt_size">
				<option value="" disabled selected>Select Size</option>
				<option value="Small">Small</option>
				<option value="Medium">Medium</option>
				<option value="Large">Large</option>
			</select><br><br>
		  <button type="submit" onclick="check(this.form)" name="button" value="B9069">Reserve</button>
		  </form>
		  </td>
        </tr>
  </table>
	
<br/>
<br/>
	
  <table align="center" cellspacing="10">
	    <tr>
	      <td><img src="B9097.png" width="400px" height="400px" class="menuIMGdesign"></td>
		  <td><img src="B9133.png" width="400px" height="400px" class="menuIMGdesign"></td>
        </tr>
	    <tr align="center" style ="background-color: white;">
	      <td><h3 class="menuFont">Bitter Sweet <br> Php 549.75</h3>
		  <form action="reserve_product.php" method="post">
		  <input type="radio" class="invisible" name="product_price" value="Php 549.75" checked="checked">
			<select name="shirt_size">
				<option value="" disabled selected>Select Size</option>
				<option value="Small">Small</option>
				<option value="Medium">Medium</option>
				<option value="Large">Large</option>
			</select><br><br>
		  <button type="submit" onclick="check(this.form)" name="button" value="B9097">Reserve</button>
		  </form>
		  </td>
		  
		  <td><h3 class="menuFont">Dye Gray <br> Php 549.75</h3>
		  <form action="reserve_product.php" method="post">
		  <input type="radio" class="invisible" name="product_price" value="Php 549.75" checked="checked">
			<select name="shirt_size">
				<option value="" disabled selected>Select Size</option>
				<option value="Small">Small</option>
				<option value="Medium">Medium</option>
				<option value="Large">Large</option>
			</select><br><br>
		  <button type="submit" onclick="check(this.form)" name="button" value="B9133">Reserve</button>
		  </form>
		  </td>
        </tr>

  </table>
<br>
<br>	
<br>
<br>
<script language="javascript">
            function check(form) { 
                    window.open('confirmation_of_order.php',"_self")
            }

	</script>	

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>	

<! –– ========================================FOOTER========================================================== ––>

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