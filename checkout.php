<?php
require_once('config.php');

//session 
session_start();

//count items in array
$cartItems = count($_SESSION['tedi']);
$cart = $_SESSION['tedi'];

//redirect if self navigating pages
if($cartItems < 1)
   {
   header("Location: cart.php");
   }

if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
		$_SESSION['email'] = strip_tags($email);
        $name = trimstrip($_POST['name']);
        $address = trimstrip($_POST['address']);
		$address2 = trimstrip($_POST['address2']);
        $city = trimstrip($_POST['city']);
        $state = trimstrip($_POST['state']);
        $zip = trimstrip($_POST['zip']);
		$country = trimstrip($_POST['country']);
		$_SESSION['name'] = mysqli_real_escape_string($conn, $name);
		$_SESSION['address'] = mysqli_real_escape_string($conn, $address);
		$_SESSION['address2'] = mysqli_real_escape_string($conn, $address2);
        $_SESSION['city'] = mysqli_real_escape_string($conn, $city);
        $_SESSION['state'] = mysqli_real_escape_string($conn, $state);
        $_SESSION['zip'] = mysqli_real_escape_string($conn, $zip);
		$_SESSION['country'] = mysqli_real_escape_string($conn, $country);
		
		if(empty($_SESSION['email']) || empty($_SESSION['name']) || empty($_SESSION['address']) || empty($_SESSION['city']) || empty($_SESSION['zip'])){
		$message = "<span class='errMsg'>Form is incomplete!</span>";
		} else {
		header('Location: confirm.php');
		}
}

function trimstrip($inputStr){
	 $trim = trim($inputStr);
	 $outputStr = strip_tags($trim);
	 return $outputStr;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $storeName; ?></h1>

<div id="viewCart">
  <span id="viewTitle">Shipping Information</span><br>
  <form method="post">
  EMAIL<br>
  <input type="email" class="text" name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>"><br>
  NAME<br>
  <input type="text" class="text" name="name" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; }?>"><br>
  ADDRESS<br>
  <input type="text" class="text" name="address" value="<?php if(isset($_SESSION['address'])){ echo $_SESSION['address']; }?>"><br>
  ADDRESS 2<br>
  <input type="text" class="text" name="address2" value="<?php if(isset($_SESSION['address2'])){ echo $_SESSION['address2']; }?>"><br>
  CITY<br>
  <input type="text" class="text" name="city" value="<?php if(isset($_SESSION['city'])){ echo $_SESSION['city']; }?>"><br>
  STATE/PROVINCE/REGION<br>
  <input type="text" class="text" name="state" value="<?php if(isset($_SESSION['state'])){ echo $_SESSION['state']; }?>"><br>
  ZIP/POSTAL CODE<br>
  <input type="text" class="text" name="zip" value="<?php if(isset($_SESSION['zip'])){ echo $_SESSION['zip']; }?>"><br>
  COUNTRY<br>
  <input type="text" class="text" name="country" value="<?php if(isset($_SESSION['country'])){ echo $_SESSION['country']; }?>"><br><br>
  <div id="checkCont"><input type="submit" class="button" value="SUBMIT" name="submit"></form></div>
  <a href="cart.php">Go Back</a><br>
  <?php if(isset($message)){ echo $message; } ?>
</div>
<br>
</body>
</html>