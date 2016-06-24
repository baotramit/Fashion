<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php session_start();
   $user =  $_SESSION["suser"];
   $name =  $_SESSION["sname"];
   echo "Welcome ".$user. " - Full Name :".$name;
?>
<br/>
<a href="updatecustomer.php">Chỉnh sửa thông tin cá nhân</a> <br/>

<a href="cart.php">Xem giỏ hàng</a> <br/>

<a href="viewbill.php">Xem tất cả đơn hàng</a> <br/>


</body>
</html>
