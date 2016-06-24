<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<?php
	 session_start();
	 if(!empty($_GET["idpro"]))
	 {
		 $idpro = $_GET["idpro"];
		 if(isset($_SESSION['cart'][$idpro]))
			  $qty = $_SESSION['cart'][$idpro] + 1;
		 else
		      $qty = 1;
     }
	 else
	 {
		 header("location:product.php");
	 }
	 
	 $_SESSION['cart'][$idpro] = $qty; 
	 header("location:cart.php");
	 //session_destroy();
?>
 
<body>
</body>
</html>
