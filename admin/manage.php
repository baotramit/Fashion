<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<H1>Trang Quản Lý</H1>
<body>

<?php session_start();
   $user =  $_SESSION["sadmin"];
   $role =  $_SESSION["srole"];
   
   echo "Welcome ".$user. " - Role :".$role;
?>


<H3>Manage</H3>
<?php
  $error = "";
  if(!empty($_SESSION["error"]))
	  $error = $_SESSION["error"];

  echo "<div style='color:red'>{$error}</div>";
  $_SESSION["error"]="";
 
?>

<OL>
<li><a href="admin.php">Admin</a></li> 
<li><a href="customer.php">Customer</a></li>
<li><a href="product.php">Product</a></li>
<li><a href="cart.php">Shopping Cart</a></li>
</OL>

</body>
</html>

