
<?php
    if(empty($_POST["number1"])||empty($_POST["number2"]))
	{ 
	   die("Vui lòng nhập đủ thông tin");
	}
	
	$num1 = $_POST["number1"];
	$num2 = $_POST["number2"];

	
	$kq = $num1 + $num2;
	echo $kq;
?>
