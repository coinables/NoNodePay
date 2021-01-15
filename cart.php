<?php
error_reporting(0);
require_once('config.php');

//session 
session_start();

if(isset($_POST['empty'])){
	session_destroy();
	$cartItems = count($_SESSION['tedi']);
	$cart = $_SESSION['tedi'];
	header('Location: cart.php');
	}

//count items in array
$cartItems = count($_SESSION['tedi']);
$cart = $_SESSION['tedi'];

if(isset($_POST['checkout'])){
   if($cartItems < 1)
   {
   $message = "<p><span class='errMsg'>You can not checkout with an empty cart</span></p>";
   }
   else
   {
   header('Location: checkout.php');
   }
}

if(isset($_POST['remove'])){
   	
   if($cartItems < 1)
   {
   $message = "<p><span class='errMsg'>Something went wrong</span></p>";
   }
   else
   {
   $arrayplace = (int)$_POST["place"];   
   unset($cart[$arrayplace]);
   $cart = array_values($cart);
   $message = "<p><span class='errMsg'>Item removed from cart.</span></p>";
   //refresh cart
   $_SESSION["tedi"] = $cart;
   $cartItems = count($_SESSION['tedi']);
   $cart = $_SESSION['tedi'];
   }
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $storeName; ?></h1>

<div id="viewCart">
  <span id="viewTitle">Your Cart</span>
  <div id="viewTable">
     <table width="100%">
	   <?php
 $usdOwed = 0;
	for($i=0; $i<$cartItems; $i++)
	{
	$queryLoopCart = "SELECT * FROM products WHERE id = '$cart[$i]'";
	$doLoopCart = mysqli_query($conn, $queryLoopCart);
	$rowLoopCart = mysqli_fetch_assoc($doLoopCart);
	$loopName = $rowLoopCart['name'];
	$loopPrice = $rowLoopCart['price'];
	$usdOwed += $loopPrice;
	$btcOwed = $usdOwed / $_SESSION['exr'];
	echo '<tr><td width="80%">'.$loopName.'<form method="post"><input type="hidden" name="place" value="'.$i.'"><input type="submit" value="Remove" id="remove" name="remove"></form></td>';
	echo "<td width='20%'>$".$loopPrice."</td>";
	echo "</tr>";
	}
	echo "<tr>";
	echo "<td class='blank' width='80%'>TOTAL USD</td>";
	echo "<td width='20%'>$".$usdOwed."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td class='blank' width='80%'>TOTAL BTC</td>";
	echo "<td width='20%'>&#x0E3F;".round($btcOwed, 6)."</td>";
	echo "</tr>";
	?>
	 </table>
	 <br>
	 <form method="post"><input type="submit" value="Checkout" class="cartBtn" name="checkout"> <input type="submit" value="Empty Cart" name="empty" class="cartBtn"></form>
	 <br>
  </div>
  <a href="index.php">Go Back</a>
  <?php if(isset($message)){ echo $message; }?>
</div>

</body>
</html>